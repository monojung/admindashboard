<input type="hidden" name="page" value="overview">

<?php

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
    $conn = new PDO("mysql:host=192.168.2.21;dbname=RCMDB", "chang", "chang11143");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

?>


<div class="container-fluid">
    <!-- Date Filter Form -->
    <div class="row">
        <div class="col-12">


<form method="GET" action="index.php" class="date-form card card-primary card-outline mb-4">
    <div class="card-body d-flex align-items-center p-3">
        <p class="mb-0 text-bold text-lg mr-4">📅 เลือกช่วงเวลา:</p>

        <label for="year_select" class="mr-2 mb-0 text-bold">ปีงบประมาณ:</label>
        <select id="year_select" name="year" class="form-control form-control-sm mr-4" style="width: 100px;" required>
            <?php foreach ($years as $y): ?>
                <option value="<?= $y ?>" <?= ($year_select == $y) ? 'selected' : '' ?>><?= $y ?></option>
            <?php endforeach; ?>
        </select>

        <label for="month_start_select" class="mr-2 mb-0 text-bold">เริ่มต้นเดือน:</label>
        <select id="month_start_select" name="month_start" class="form-control form-control-sm mr-2" style="width: 120px;" required>
            <?php foreach ($months as $val => $name): ?>
                <option value="<?= $val ?>" <?= ($month_start == $val) ? 'selected' : '' ?>><?= $name ?></option>
            <?php endforeach; ?>
        </select>

        <label for="month_end_select" class="mr-2 mb-0 text-bold">ถึงเดือน:</label>
        <select id="month_end_select" name="month_end" class="form-control form-control-sm mr-4" style="width: 120px;" required>
            <?php foreach ($months as $val => $name): ?>
                <option value="<?= $val ?>" <?= ($month_end == $val) ? 'selected' : '' ?>><?= $name ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-search mr-1"></i> ค้นหา
        </button>

        <div class="ml-auto text-right">
            <small class="text-muted ml-auto text-right">
                ช่วงเวลาที่ถูกกรอง YYMM IN : <code class="text-primary"><?= htmlspecialchars($filter_display) ?></code>
            </small>
        </div>
    </div>
</form>
        </div>
    </div>

    <!-- Summary Statistics -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>0</h3>
                    <p>ยอดรวมทุกกองทุน (ชดเชยตามช่วงเดือนที่เลือก)</p>
                </div>
                <div class="icon"><i class="ion ion-cash"></i></div>
                <a href="#" class="small-box-footer">ช่วง: ตุลาคม - กันยายน ปีงบ <?php echo $year_select; ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0</h3>
                    <p>ยอดสูงสุดต่อเดือน (ชดเชยตามช่วงเดือนที่เลือก)</p>
                </div>
                <div class="icon"><i class="ion ion ion-cash"></i></div>
                <a href="#" class="small-box-footer">ช่วง: ตุลาคม - กันยายน ปีงบ <?php echo $year_select; ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php
                        // คำนวณยอดเรียกเก็บรวมจากฐานข้อมูล
                        $total_collected = 0;
                        foreach ($yymm_array as $yymm) {
                            $total_collected += ($ofc_db_data['OP'][$yymm]['total_collect'] ?? 0);
                            $total_collected += ($ofc_db_data['IP'][$yymm]['total_collect'] ?? 0);
                        }
                        echo number_format($total_collected, 2);
                    ?></h3>
                    <p>ยอดเรียกเก็บ OFC รวม</p>
                </div>
                <div class="icon"><i class="ion ion ion-cash"></i></div>
                <a href="#" class="small-box-footer">ช่วง: ตุลาคม - กันยายน ปีงบ <?php echo $year_select; ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php
                        // คำนวณยอดชดเชยรวมจากฐานข้อมูล
                        $total_compensated = 0;
                        foreach ($yymm_array as $yymm) {
                            $total_compensated += ($ofc_db_data['OP'][$yymm]['total_comp'] ?? 0);
                            $total_compensated += ($ofc_db_data['IP'][$yymm]['total_comp'] ?? 0);
                        }
                        echo number_format($total_compensated, 2);

                    ?>
                    </h3>
                    <p>ยอดชดเชย OFC รวม</p>
                </div>
                <div class="icon"><i class="ion ion ion-cash"></i></div>
                <a href="#" class="small-box-footer">ช่วง: ตุลาคม - กันยายน ปีงบ <?php echo $year_select; ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- OFC Summary Table & Chart -->
    <div class="row">
        <section class="col-lg-6">
            <div>
            <div class="row">
    <section class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">💵 <strong>OFC ผู้ป่วยนอก (OP)</strong></h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>เดือน/ปี</th>
                            <th class="text-right">เรียกเก็บ </th>
                            <th class="text-right">ชดเชย</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                   
                        
                        $sum_op_coll = 0; $sum_op_comp = 0;
                        foreach ($yymm_array as $yymm) {
                            // 1. ดึงค่าจาก Data Array
                            $val_coll = $ofc_db_data['OP'][$yymm]['total_collect'] ?? 0;
                            $val_comp = $ofc_db_data['OP'][$yymm]['total_comp'] ?? 0;
                            // 2. สะสมยอดรวม
                            $sum_op_coll += $val_coll; $sum_op_comp += $val_comp;
                            // 3. แปลงรหัสเดือนเป็นชื่อเดือน
                            $y_code = substr($yymm, 0, 2); // ดึง 2 หลักแรก (เช่น 68)
                            $m_code = substr($yymm, 2, 2); // ดึง 2 หลักหลัง (เช่น 10)
                            // 4. สร้างชื่อเดือน/ปี สำหรับแสดงผล รวมชื่อเดือนกับปี เช่น "ตุลาคม" + "68"
                            $display_name = $th_months[$m_code] . $y_code;

                            echo "<tr>
                                    <td>".$display_name."</td>
                                    <td class='text-right'>".number_format($val_coll, 2)."</td>
                                    <td class='text-right'>".number_format($val_comp, 2)."</td>
                                  </tr>";
                        } ?>
                    </tbody>
                    <tfoot class="bg-light">
                        <tr class="text-bold">
                            <td>รวม OP</td>
                            <td class="text-right text-primary"><?php echo number_format($sum_op_coll, 2); ?></td>
                            <td class="text-right text-success"><?php echo number_format($sum_op_comp, 2); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    <section class="col-lg-6">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">🏥 <strong>OFC ผู้ป่วยใน (IP)</strong></h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>เดือน/ปี</th>
                            <th class="text-right">เรียกเก็บ</th>
                            <th class="text-right">ชดเชย</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sum_ip_coll = 0; $sum_ip_comp = 0;
                        foreach ($yymm_array as $yymm) {
                            // 1. ดึงค่าจาก Data Array
                            $val_coll = $ofc_db_data['IP'][$yymm]['total_collect'] ?? 0;
                            $val_comp = $ofc_db_data['IP'][$yymm]['total_comp'] ?? 0;
                            // 2. สะสมยอดรวม    
                            $sum_ip_coll += $val_coll; $sum_ip_comp += $val_comp;
                            
                            $y_code = substr($yymm, 0, 2); // ดึง 2 หลักแรก (เช่น 68)
                            $m_code = substr($yymm, 2, 2); // ดึง 2 หลักหลัง (เช่น 10)
                            // 4. สร้างชื่อเดือน/ปี สำหรับแสดงผล รวมชื่อเดือนกับปี เช่น "ตุลาคม" + "68"
                            $display_name = $th_months[$m_code] . $y_code;
                            echo "<tr>
                                    <td>".$display_name."</td>
                                    <td class='text-right'>".number_format($val_coll, 2)."</td>
                                    <td class='text-right'>".number_format($val_comp, 2)."</td>
                                  </tr>";
                        } ?>
                    </tbody>
                    <tfoot class="bg-light">
                        <tr class="text-bold">
                            <td>รวม IP</td>
                            <td class="text-right text-primary"><?php echo number_format($sum_ip_coll, 2); ?></td>
                            <td class="text-right text-success"><?php echo number_format($sum_ip_comp, 2); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>
            
        </section>
        
        <!-- OFC Monthly Trend Bar Chart -->
        <section class="col-lg-6">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">📊 แนวโน้มยอด OFC รายเดือน (ช่วง: ตุลาคม - กันยายน ปีงบ <?php echo $year_select; ?>)</h3>
                </div>
                <div class="card-body">
                    <div class="chart-box" style="height: 300px;">
                        
                        <canvas id="ofcBarChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
        <section>
            

        </section>
    </div>

    <!-- Monthly Trend Line Chart -->
    <div class="row">
        <section class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">📈 แนวโน้มยอดชดเชยที่ได้รับจริงรายเดือน (ช่วง: ตุลาคม - กันยายน ปีงบ <?php echo $year_select; ?>)</h3>
                </div>
                <div class="card-body">
                    <div class="chart-box" style="height: 500px;">
                        <canvas id="monthlyCompensatedLineChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Detailed Fund Breakdown Table -->
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">1. ตารางสรุปยอดชดเชยที่ได้รับจริงตามกองทุนรายเดือน (ช่วง: ตุลาคม - กันยายน ปีงบ <?php echo $year_select; ?>)</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle table-custom mb-4">
                        <thead>
                            <tr>
                                <th>เดือน</th>
                                <th class="numeric">ชดเชยสมุนไพร</th>
                                <th class="numeric">ฟลูออไรด์ฯ</th>
                                <th class="numeric">ยาเสริมธาติเหล็กฯ</th>
                                <th class="numeric">ยาคุมกำเนิด</th>
                                <th class="numeric">คัดกรองมะเร็งฯ</th>
                                <th class="numeric">Walkin ต่างจังหวัด</th>
                                <th class="numeric">รวมทุกกองทุน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // ตัวแปลงชื่อเดือน
                                $th_months = ['10'=>'ตุลาคม','11'=>'พฤศจิกายน','12'=>'ธันวาคม','01'=>'มกราคม','02'=>'กุมภาพันธ์','03'=>'มีนาคม','04'=>'เมษายน','05'=>'พฤษภาคม','06'=>'มิถุนายน','07'=>'กรกฎาคม','08'=>'สิงหาคม','09'=>'กันยายน'];

                                foreach ($yymm_array as $yymm) {
                                    $y_short = substr($yymm, 0, 2); // ปี 2 หลัก เช่น 67
                                    $m_code = substr($yymm, 2, 2);  // เดือน 2 หลัก เช่น 10
                                    $display_name = $th_months[$m_code] . $y_short;
                                ?>
                                    <tr>
                                        <td><?php echo $display_name; ?></td>
                                        <td class="numeric"><?php /* ใส่ตัวแปรยอดเรียกเก็บที่นี่ */ ?></td>
                                        <td class="numeric"><?php /* ใส่ตัวแปรยอดชดเชยที่นี่ */ ?></td>
                                        <td class="numeric"><?php /* ใส่ตัวแปรยอดชดเชยที่นี่ */ ?></td>
                                        <td class="numeric"><?php /* ใส่ตัวแปรยอดชดเชยที่นี่ */ ?></td>
                                        <td class="numeric"><?php /* ใส่ตัวแปรยอดชดเชยที่นี่ */ ?></td>
                                        <td class="numeric"><?php /* ใส่ตัวแปรยอดชดเชยที่นี่ */ ?></td>
                                        <td class="numeric"><?php /* ใส่ตัวแปรยอดชดเชยที่นี่ */ ?></td>

                                    </tr>
                            <?php } ?>
                                <td><strong>รวมทั้งหมด</strong></td>
                                <td class="numeric text-bold text-primary"></td>
                                <td class="numeric text-bold text-primary"></td>   
                                <td class="numeric text-bold text-primary"></td>   
                                <td class="numeric text-bold text-primary"></td>
                                <td class="numeric text-bold text-primary"></td>
                                <td class="numeric text-bold text-primary"></td>
                                <td class="numeric text-bold text-success"></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- เตรียมข้อมูลสำหรับ Chart.js -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const labels = <?php echo json_encode($js_labels); ?>;


        // ข้อมูลที่ดึงจาก Database แปลงเป็น Array สำหรับ Chart.js
        const ofcCollectedData = <?php 
            $arr_collect = [];
            foreach($yymm_array as $yymm) { $arr_collect[] = $db_data[$yymm]['sum_collected'] ?? 0; }
            echo json_encode($arr_collect); 
        ?>;

        const ofcCompensatedData = <?php 
            $arr_comp = [];
            foreach($yymm_array as $yymm) { $arr_comp[] = $db_data[$yymm]['sum_compensated'] ?? 0; }
            echo json_encode($arr_comp); 
        ?>;

        // ต่อจากนี้ใช้โค้ด Chart.js เดิมของคุณ...
        const ofcBarCtx = document.getElementById('ofcBarChart').getContext('2d');
        new Chart(ofcBarCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    { label: 'ยอดเรียกเก็บ', data: ofcCollectedData, backgroundColor: 'rgba(245, 83, 24, 0.8)' },
                    { label: 'ยอดชดเชย', data: ofcCompensatedData, backgroundColor: 'rgba(120, 246, 246, 0.8)' }
                ]
            },
            options: { /* options เดิม */ }
        });
    });
</script>




<!-- เตรียมข้อมูลสำหรับ Chart.js แบบ Dynamic จาก PHP  -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // --- ส่วนที่แก้ไขให้เป็น Dynamic ---
        const dynamicLabels = <?php 
            $js_labels = [];
            foreach ($yymm_array as $yymm) {
                $m_code = substr($yymm, 2, 2);
                $y_short = substr($yymm, 0, 2);
                $js_labels[] = $th_months[$m_code] . $y_short;
            }
            echo json_encode($js_labels); 
        ?>;

        // Data from PHP
        const labels = dynamicLabels;
        const dataHerb = [3341.18,1427.42,2084.74,3845.7,7487.48,3313.02,4341.51,7499.5,18081.5,10533.69,10347.91,13155.11];
        const dataFluoride = [400,0,300,0,0,900,0,0,0,900,0,300.01];
        const dataIron = [0,0,160,0,1280,8720,0,0,0,0,0,0];
        const dataContraceptive = [1260,600,1080,460,840,960,420,1080,840,600,900.01,320.01];
        const dataColorectal = [2100,470,0,2100,1680,0,440,0,350,0,490,210];
        const dataWalkin = [70,70,0,210,0,0,560,0,350,70,490,70];
        const dataTotal = <?php echo json_encode(array_fill(0, count($yymm_array), 0)); ?>;
        for (let i = 0; i < labels.length; i++) {
            dataTotal[i] = dataHerb[i] + dataFluoride[i] + dataIron[i] + dataContraceptive[i] + dataColorectal[i] + dataWalkin[i];
        }

        // OFC Data
        const ofcMonthsLabels = dynamicLabels;
        const ofcCollectedData = [11697,10957,8118.5,6735,10964,8990,14217,11538,8542,8605,15365,92544];
        const ofcCompensatedData = [11697,10017,8060,6735,8137,8910,11117,10793,8392,8605,16331.47,104277.55];

        // Line Chart - Monthly Compensation
        const monthlyCompensatedCtx = document.getElementById('monthlyCompensatedLineChart').getContext('2d');
        new Chart(monthlyCompensatedCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    { label: 'รวมทุกกองทุน (ยอดรวม)', data: dataTotal, borderColor: 'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235, 0.1)', borderWidth: 3, tension: 0.3, fill: true, pointRadius: 5 },
                    { label: 'ชดเชยสมุนไพร', data: dataHerb, borderColor: 'rgba(75, 192, 192, 1)', borderWidth: 2, tension: 0.3, pointRadius: 3 },
                    { label: 'ฟลูออไรด์ฯ', data: dataFluoride, borderColor: 'rgba(255, 99, 132, 1)', borderWidth: 2, tension: 0.3, pointRadius: 3 },
                    { label: 'ยาเสริมธาติเหล็กฯ', data: dataIron, borderColor: 'rgba(255, 159, 64, 1)', borderWidth: 2, tension: 0.3, pointRadius: 3 },
                    { label: 'ยาคุมกำเนิด', data: dataContraceptive, borderColor: 'rgba(153, 102, 255, 1)', borderWidth: 2, tension: 0.3, pointRadius: 3 },
                    { label: 'คัดกรองมะเร็งฯ', data: dataColorectal, borderColor: 'rgba(255, 206, 86, 1)', borderWidth: 2, tension: 0.3, pointRadius: 3 },
                    { label: 'Walkinต่างจังหวัด', data: dataWalkin, borderColor: 'rgba(100, 100, 100, 1)', borderWidth: 2, tension: 0.3, pointRadius: 3 }
                ]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true, ticks: { callback: v => v.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') } }
                },
                plugins: {
                    tooltip: { callbacks: { label: ctx => `${ctx.dataset.label}: ${new Intl.NumberFormat('th-TH', { style: 'currency', currency: 'THB' }).format(ctx.parsed.y)}` } }
                },
                animation: { duration: 1500 }
            }
        });

        // Bar Chart - OFC Comparison
        const ofcBarCtx = document.getElementById('ofcBarChart').getContext('2d');
        new Chart(ofcBarCtx, {
            type: 'bar',
            data: {
                labels: ofcMonthsLabels,
                datasets: [
                    { label: 'ยอดเรียกเก็บ', data: ofcCollectedData, backgroundColor: 'rgba(255, 159, 64, 0.8)', borderColor: 'rgba(255, 159, 64, 1)', borderWidth: 1 },
                    { label: 'ยอดชดเชย', data: ofcCompensatedData, backgroundColor: 'rgba(75, 192, 192, 0.8)', borderColor: 'rgba(75, 192, 192, 1)', borderWidth: 1 }
                ]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                scales: {
                    x: { autoSkip: false },
                    y: { beginAtZero: true, ticks: { callback: v => v.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') } }
                },
                plugins: {
                    tooltip: { callbacks: { label: ctx => `${ctx.dataset.label}: ${new Intl.NumberFormat('th-TH', { style: 'currency', currency: 'THB' }).format(ctx.parsed.y)}` } }
                },
                animation: { duration: 1000 }
            }
        });
    });
</script>

<?php include 'includes/footer.php'; ?>