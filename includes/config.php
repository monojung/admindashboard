<?php
include_once 'api/db.php';
#########################################################

// เตรียมข้อมูล Array เดือน เพื่อลดการเขียนซ้ำซ้อน
$months = [
    '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม',
    '01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม',
    '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน',
    '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน'
];

// รายการปี (สามารถดึงจาก DB หรือคำนวณแบบ Dynamic ได้)
$years = ['2569', '2568', '2567', '2566'];



$th_months = ['10'=>'ตุลาคม','11'=>'พฤศจิกายน','12'=>'ธันวาคม','01'=>'มกราคม','02'=>'กุมภาพันธ์','03'=>'มีนาคม','04'=>'เมษายน','05'=>'พฤษภาคม','06'=>'มิถุนายน','07'=>'กรกฎาคม','08'=>'สิงหาคม','09'=>'กันยายน'];


// รับค่าปี ถ้าไม่มีให้คำนวณปีงบประมาณปัจจุบัน
$budget_year_now = (date('m') >= 10) ? date('Y') + 544 : date('Y') + 543;
$year_select = $_GET['year'] ?? $budget_year_now;

// รับค่าเดือน ถ้าไม่มี (หน้าแรก) ให้ใช้เดือนปัจจุบัน
$current_month = date('m'); 
$month_start = $_GET['month_start'] ?? '10'; // เริ่มต้นปีงบประมาณคือเดือนตุลาคม
$month_end   = $_GET['month_end']   ?? $current_month; // สิ้นสุดปีงบประมาณคือกันยายน

#######################################################
// สร้าง Array ของช่วงเดือนในรูปแบบ YYMM ตามที่ผู้ใช้เลือก    
// 1. รับค่าจาก Filter
$year_select = $_GET['year'] ?? $budget_year_now;
$month_start = $_GET['month_start'] ?? '10';
$month_end   = $_GET['month_end']   ?? date('m');

// 2. คำนวณปี ค.ศ. สองหลัก
$current_year_short = substr($year_select, 2, 2); 
$prev_year_short    = str_pad((int)$current_year_short - 1, 2, "0", STR_PAD_LEFT);

// 3. สร้างลำดับเดือนตามปีงบประมาณ
$months_order = ['10', '11', '12', '01', '02', '03', '04', '05', '06', '07', '08', '09'];

// 4. ค้นหาตำแหน่ง Index ของเดือนที่เลือกเริ่มต้นและสิ้นสุด
$start_idx = array_search($month_start, $months_order);
$end_idx   = array_search($month_end, $months_order);

// 5. กรณีผู้ใช้เลือกเดือนผิดลำดับ (เช่น เริ่ม ก.ย. จบ ต.ค.) ให้สลับค่าหรือจัดการตามเหมาะสม
if ($start_idx > $end_idx) {
    $temp = $start_idx;
    $start_idx = $end_idx;
    $end_idx = $temp;
}

// 6. สร้าง Array เฉพาะช่วงที่เลือก
$yymm_array = [];
for ($i = $start_idx; $i <= $end_idx; $i++) {
    $m = $months_order[$i];
    // ถ้าเป็นเดือน 10-12 ให้ใช้ปีงบประมาณก่อนหน้า (ปีเก่า)
    $y = (in_array($m, ['10', '11', '12'])) ? $prev_year_short : $current_year_short;
    $yymm_array[] = $y . $m;
}

// 7. รวมเป็นข้อความสำหรับแสดงผล
$filter_display = implode(", ", $yymm_array);
#######################################################

try {
    
    $placeholders = implode(',', array_fill(0, count($yymm_array), '?'));
    
    // ปรับ SQL ให้ดึงทั้ง OP และ IP และ Group By Department ด้วย
    $sql = "SELECT 
                yymm, 
                Department,
                SUM(Collected) as total_collect, 
                SUM(Compensated) as total_comp 
            FROM repeclaim 
            WHERE MainInscl = 'OFC'
            AND Department IN ('OP', 'IP')
            AND yymm IN ($placeholders)
            GROUP BY yymm, Department";

    $stmt = $conn->prepare($sql);
    $stmt->execute($yymm_array);
    
    // จัดโครงสร้าง Array ใหม่เป็น $ofc_db_data['OP']['6710']
    $ofc_db_data = ['OP' => [], 'IP' => []];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dept = $row['Department'];
        $ym = $row['yymm'];
        $ofc_db_data[$dept][$ym] = $row;
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// ปิดการเชื่อมต่อ
// 4. เตรียมข้อมูลสำหรับ Chart.js (หลังจากมี $yymm_array และ $ofc_db_data แล้ว)
$js_labels = [];
$js_op_collect = []; $js_op_comp = [];
$js_ip_collect = []; $js_ip_comp = [];
$js_ofc_total_collect = []; $js_ofc_total_comp = [];

foreach ($yymm_array as $yymm) {
    $m_code = substr($yymm, 2, 2);
    $y_short = substr($yymm, 0, 2);
    $js_labels[] = ($th_months[$m_code] ?? '') . $y_short;

    $op_coll = $ofc_db_data['OP'][$yymm]['total_collect'] ?? 0;
    $op_comp = $ofc_db_data['OP'][$yymm]['total_comp'] ?? 0;
    $ip_coll = $ofc_db_data['IP'][$yymm]['total_collect'] ?? 0;
    $ip_comp = $ofc_db_data['IP'][$yymm]['total_comp'] ?? 0;

    $js_op_collect[] = $op_coll;
    $js_op_comp[] = $op_comp;
    $js_ip_collect[] = $ip_coll;
    $js_ip_comp[] = $ip_comp;
    $js_ofc_total_collect[] = $op_coll + $ip_coll;
    $js_ofc_total_comp[] = $op_comp + $ip_comp;
}

$month_names = [
    "1" => "มกราคม", "2" => "กุมภาพันธ์", "3" => "มีนาคม", "4" => "เมษายน",
    "5" => "พฤษภาคม", "6" => "มิถุนายน", "7" => "กรกฎาคม", "8" => "สิงหาคม",
    "9" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม"
];

// แปลงค่าให้เป็น String (ถ้า $month_start เป็น array ให้หยิบ [0] มาก่อน)
$current_month_val = is_array($month_start) ? $month_start[0] : $month_start;
$month_string = $month_names[$current_month_val] ?? "ไม่ระบุเดือน";
?>