<input type="hidden" name="page" value="income">
<?php include 'includes/config.php'; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form method="GET" action="index.php" id="searchForm" class="date-form card card-primary card-outline" style="margin-bottom: 20px;">
    <div class="card-body d-flex align-items-center p-3">
        <input type="hidden" name="page" value="income">
        <input type="hidden" name="from_dropdown" id="from_dropdown" value="N">

        <label class="mr-2">ปีงบประมาณ:</label>
        <select name="budget_year" class="form-control form-control-sm mr-3" style="width: 120px;" 
                onchange="document.getElementById('from_dropdown').value='Y'; this.form.submit();">
            <option value="2570">2570</option>
            <option value="2569">2569</option>
            <option value="2568">2568</option>
            <option value="2567">2567</option>
            <option value="2566">2566</option>
            <option value="2565">2565</option>
        </select>

        <label for="start_date_input" class="mr-2">วันที่เริ่มต้น:</label>
<input type="date" name="start_date" id="start_date" class="form-control form-control-sm mr-2" style="width: 150px;" value="2025-10-01">

<label for="end_date_input" class="mr-2">ถึงวันที่:</label>
<input type="date" name="end_date" id="end_date" class="form-control form-control-sm mr-2" style="width: 150px;" value="2026-09-30">

        <button type="submit" onclick="document.getElementById('from_dropdown').value='N';" class="btn btn-sm btn-primary">
            <i class="fas fa-search mr-1"></i> ค้นหา
        </button>
    </div>
</form>
        </div>
    </div>



    <!-- Summary Cards -->
    <div class="row">
        <!-- Card 1: Revenue by Type -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner" style="height: 120px;">
                    <h3>0</h3>
                    <div style="font-weight: bold; margin-top: 10px;">รวมประมาณการรายได้ตามสิทธิ (บาท)</div>
                </div>
                <div class="icon">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <a href="revenue_pttype_report.php?start_date=2026-01-01&end_date=2026-01-06" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Card 2: Herb Revenue -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner" style="height: 120px;">
                    <h3>0</h3>
                    <div style="font-weight: bold; margin-top: 10px;">รวมประมาณการรายได้ยาสมุนไพร</div>
                </div>
                <div class="icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <a href="herb_detail_report.php?start_date=2026-01-01&end_date=2026-01-06" class="small-box-footer">ดูรายละเอียดรายคน <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Card 3: Contraceptive Revenue -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner" style="height: 120px;">
                    <h3>0</h3>
                    <div style="color: #8b4513; font-weight: bold; margin-top: 10px;">รวมประมาณการรายได้ยาคุมกำเนิด</div>
                </div>
                <div class="icon">
                    <i class="fas fa-pills"></i>
                </div>
                <a href="fp_services_report.php" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Card 4: ADP Revenue -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner" style="height: 120px;">
                    <h3>0</h3>
                    <div style="color: #ffffff; font-weight: bold; margin-top: 10px;">รวมประมาณการรายได้ส่งเสริม (ADP)</div>
                </div>
                <div class="icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <a href="adp_services_report.php" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Table 1: Revenue by Type -->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">1. ตารางสรุปรายละเอียดรายได้ตามสิทธิ OP</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle table-custom mb-4">
                        <thead>
                            <tr>
                                <th>สิทธิ</th>
                                <th class="numeric">จำนวนคน</th>
                                <th class="numeric">จำนวนครั้ง</th>
                                <th class="numeric">เคลมแล้ว</th>
                                <th class="numeric">ชำระเงินแล้ว</th>
                                <th class="numeric">รวมรายได้ (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ชำระเงินเอง (10)</td>
                                
                            </tr>
                            
                            <tr>
                                <td>บัตรทองใน CUP</td>
                                
                            </tr>
                            <tr>
                                <td>บัตรทองนอก CUP ในจังหวัด</td>
                                
                            </tr>
                            <tr>
                                <td>บัตรทองนอก CUP นอกจังหวัด</td>
                                
                            </tr>
                            <tr>
                                <td>ปกส.นอกจังหวัด (SSS)</td>
                                
                            </tr>
                            <tr>
                                <td>ปกส.ในเครือข่าย (S1-3)</td>
                                
                            </tr>
                            <tr>
                                <td>สิทธิ Walk in (op anywhere)</td>
                                
                            </tr>
                            <tr>
                                <td>สิทธิ อปท.</td>
                                
                            </tr>
                            <tr>
                                <td>สิทธิข้าราชการ</td>
                                
                            </tr>
                            <tr>
                                <td>พรบ</td>
                                
                            </tr>
                            <tr>
                                <td>รัฐวิสหกิจ</td>
                                
                            </tr>
                            <tr>
                                <td>ต่างด้าว</td>
                                
                            </tr>
                            <tr>
                                <td>ผู้มีปัญหาสถานะ และสิทธิ</td>
                                
                            </tr>
                            <tr class="table-info font-weight-bold">
        <td style="color: #17a2b8; font-weight: bold;"> 
                            <strong style="color: #17a2b8;">รวมทั้งหมด</strong>
                    </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Table 2: Herb Revenue -->
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">2. ประมาณการรายได้แผนไทย (สิทธิ WEL/UCS)</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle table-custom">
                        <thead>
                            <tr>
                                <th>รายการยาสมุนไพร</th>
                                <th class="numeric">จำนวนจ่าย (หน่วย)</th>
                                <th class="numeric">ราคาต่อหน่วย</th>
                                <th class="numeric">ส่งเคลมแล้ว (ครั้ง)</th>
                                <th class="numeric">ประมาณการรายได้ (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ขมิ้นชัน</td>
                                
                            </tr>
                            <tr>
                                <td>ฟ้าทะลายโจร</td>
                                
                            </tr>
                            <tr>
                                <td>ยาแก้ไอมะขามป้อม</td>
                                
                            </tr>
                            <tr>
                                <td>ลูกประคบ</td>
                                
                            </tr>
                            <tr>
                                <td>เถาวัลย์เปรียง</td>
                                
                            </tr>
                            <tr>
                                <td>ไพลครีม</td>
                                
                            </tr>
                            <tr>
                                <td>หัตถการแพทย์แผนไทย</td>
                                
                            </tr>
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Table 3: Contraceptive Revenue -->
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline mb-4"> 
                <div class="card-header">
                    <h3 class="card-title">3. ประมาณการรายได้กายภาพบำบัด</h3>
                </div>
                <div class="card-body p-3"> 
                    <table class="table table-striped table-valign-middle table-custom">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th class="numeric">จำนวนครั้ง (หน่วย)</th>
                                <th class="numeric">ส่งเคลมแล้ว (ครั้ง)</th>
                                <th class="numeric">ประมาณการรายได้ (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> ยาเม็ด
                                    </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> ยาฉีด
                                    </a>
                                </td>
                                
                            </tr>
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline mb-4"> 
                <div class="card-header">
                    <h3 class="card-title">4. ประมาณการรายได้ Palliative Care</h3>
                </div>
                <div class="card-body p-3"> 
                    <table class="table table-striped table-valign-middle table-custom">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th class="numeric">จำนวนครั้ง (หน่วย)</th>
                                <th class="numeric">ส่งเคลมแล้ว (ครั้ง)</th>
                                <th class="numeric">ประมาณการรายได้ (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> เยี่ยมบ้าน
                                    </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> ยา
                                    </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> เสียชีวิต
                                    </a>
                                </td>
                                
                            </tr>
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline mb-4"> 
                <div class="card-header">
                    <h3 class="card-title">5. ประมาณการรายได้ Home Ward</h3>
                </div>
                <div class="card-body p-3"> 
                    <table class="table table-striped table-valign-middle table-custom">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th class="numeric">จำนวนครั้ง (หน่วย)</th>
                                <th class="numeric">ส่งเคลมแล้ว (ครั้ง)</th>
                                <th class="numeric">ประมาณการรายได้ (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> เยี่ยมบ้าน
                                    </a>
                                </td>
                                
                            </tr>
                            
                                
                            </tr>
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline mb-4"> 
                <div class="card-header">
                    <h3 class="card-title">6. ประมาณการรายได้ Telemedicine</h3>
                </div>
                <div class="card-body p-3"> 
                    <table class="table table-striped table-valign-middle table-custom">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th class="numeric">จำนวนครั้ง (หน่วย)</th>
                                <th class="numeric">ส่งเคลมแล้ว (ครั้ง)</th>
                                <th class="numeric">ประมาณการรายได้ (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> เยี่ยมบ้าน
                                    </a>
                                </td>
                                
                            </tr>
                         
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline mb-4"> 
                <div class="card-header">
                    <h3 class="card-title">7. ประมาณการรายได้ Health Rider</h3>
                </div>
                <div class="card-body p-3"> 
                    <table class="table table-striped table-valign-middle table-custom">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th class="numeric">จำนวนครั้ง (หน่วย)</th>
                                <th class="numeric">ส่งเคลมแล้ว (ครั้ง)</th>
                                <th class="numeric">ประมาณการรายได้ (บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> เยี่ยมบ้าน
                                    </a>
                                </td>
                                
                            </tr>
                         
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Table 4: ADP Services -->
    <div class="row">
        <div class="col-12">
            <div class="card card-warning card-outline mb-4"> 
                <div class="card-header">
                    <h3 class="card-title">8. ประมาณการรายได้จากบริการส่งเสริมสุขภาพ (ADP)</h3>
                </div>
                <div class="card-body p-3">
                    <table class="table table-striped table-valign-middle table-custom">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th class="numeric">จำนวนคน</th>
                                <th class="numeric">จำนวนครั้ง</th>
                                <th class="numeric">ประมาณการรายได้ (บาท)</th>
                                <th class="numeric">ส่งเคลมแล้ว (ครั้ง)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>บริการฝากครรภ์</td>
                            </tr>
                            <tr>
                                <td>บริการตรวจหลังคลอด</td>
                            </tr>
                            <tr>
                                <td>บริการทดสอบการตั้งครรภ์</td>
                            </tr>
                            <tr>
                                <td>บริการวางแผนครอบครัวและการป้องกัน</td>
                            </tr>
                            <tr>
                                <td>บริการคัดกรองมะเร็งปากมดลูก</td>
                            </tr>
                            <tr>
                                <td>บริการคัดกรองวัณโรค</td>
                            </tr>
                            <tr>
                                <td>บริการคัดกรองเบาหวานและไขมันในเลือด</td>
                            </tr>
                            <tr>
                                <td>บริการคัดกรองโลหิตจาง</td>
                            </tr>
                            <tr>
                                <td>บริการยาเย็ดเสริมธาตุเหล็ก</td>
                            </tr>
                            <tr>
                                <td>บริการเคลือบฟลูออไรด์</td>
                            </tr>
                            <tr>
                                <td>บริการคัดกรองมะเร็งลำไส้ใหญ่</td>
                            </tr>
                            <tr>
                                <td>บริการคัดกรองไวรัสตับอักเสบ B</td>
                            </tr>
                            <tr>
                                <td>บริการคัดกรองไวรัสตับอักเสบ C</td>
                            </tr>
                            <tr>
                                <td>บริการวัคซีนป้องกันโรค</td>
                            </tr>
                            <tr>
                                <td>บริการตรวจแลปโรคเบาหวาน HbA1c</td>
                            </tr>
                            <tr>
                                <!--
                                serum creatinine
                                serum potassium
                                 -->
                                <td>บริการคัดแลปโรคความดันโลหิตสูง</td>
                            </tr>
                            <tr>
                                <td>บริการเจาะเลือด หลัง NPO หาระดับน้ำตาล (FPG)</td>
                            </tr>
                            <tr>
                                <td>บริการเจาะเลือด หลัง NPO หา Total Choles.HDL</td>
                            </tr>

                            <tr>
                                <td>ตรวจไทรอยด์ ในเด็กแรกเกิด(TSH)</td>
                            </tr>
                            <tr class="total-row">
                                <td>รวมคัดกรอง (ADP)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



