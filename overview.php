<input type="hidden" name="page" value="overview">

<?php 
include 'includes/config.php'; 
include 'includes/scripts.php';
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
                <a href="#" class="small-box-footer">ช่วง: <?= $months[$month_start] ?> - <?= $months[$month_end] ?> ปีงบ <?php echo $year_select; ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0</h3>
                    <p>ยอดสูงสุดต่อเดือน (ชดเชยตามช่วงเดือนที่เลือก)</p>
                </div>
                <div class="icon"><i class="ion ion ion-cash"></i></div>
                <a href="#" class="small-box-footer">ช่วง: <?= $months[$month_start] ?> - <?= $months[$month_end] ?> ปีงบ <?php echo $year_select; ?> <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">ช่วง: <?= $months[$month_start] ?> - <?= $months[$month_end] ?> ปีงบ <?php echo $year_select; ?> <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">ช่วง: <?= $months[$month_start] ?> - <?= $months[$month_end] ?> ปีงบ <?php echo $year_select; ?> <i class="fas fa-arrow-circle-right"></i></a>
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
                            $display_name = $months[$m_code] . $y_code;

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
                            $display_name = $months[$m_code] . $y_code;
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
                   <h3 class="card-title">        📊 แนวโน้มยอด OFC OP (ช่วง: <?= $months[$month_start] ?> - <?= $months[$month_end] ?> ปีงบ <?= $year_select ?>)    </h3>
                </div>
                <div class="card-body">
                    <div class="chart-box" style="height: 300px;">
                        
                        <canvas id="ofcOpBarChart" style="height:300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">📊 แนวโน้มยอด OFC IP (ช่วง: <?= $months[$month_start] ?> - <?= $months[$month_end] ?> ปีงบ <?= $year_select ?>)</h3>
                </div>
                <div class="card-body">
                    <div class="chart-box" style="height: 300px;">
                        
                        <canvas id="ofcIpBarChart" style="height:300px;"></canvas>
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
                                <th class="numeric">ชดเชยสมุนไพร HC22</th>                                
                                <th class="numeric">instument</th>
                                <th class="numeric">healthrider</th>
                                <th class="numeric">telemedicine</th>
                                <th class="numeric">ฝากครรภ์</th>
                                <th class="numeric">ยาคุมกำเนิด</th>
                                <th class="numeric">ทดสอบการตั้งครรภ์</th>
                                <th class="numeric">ตรวจหลังคลอด</th>
                                <th class="numeric">คัดกรองมะเร็งลำไส้</th>
                                <th class="numeric">รวมทุกกองทุน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // ตัวแปลงชื่อเดือน

                                foreach ($yymm_array as $yymm) {
                                    $y_short = substr($yymm, 0, 2); // ปี 2 หลัก เช่น 67
                                    $m_code = substr($yymm, 2, 2);  // เดือน 2 หลัก เช่น 10
                                    $display_name = $months[$m_code] . $y_short;
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
<?php include 'includes/footer.php'; ?>