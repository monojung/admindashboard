
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Haisok Report | รายงานลูกหนี้ OPD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <style>
        body { font-family: 'Sarabun', sans-serif; }
        .nav-sidebar .nav-link.active { background-color: #28a745 !important; }
        .nav-treeview > .nav-item > .nav-link.active { background-color: rgba(255,255,255,0.1) !important; color: #fff !important; }
    </style>
</head>
<body class="sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li>
            <li class="nav-item d-none d-sm-inline-block"><span class="nav-link text-dark font-weight-bold">รายงานลูกหนี้ OPD</span></li>
        </ul>
        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle mr-1 text-primary"></i>
                    <span class="font-weight-bold">นายฤทธิภูมิ อริยะจ้อน</span>
                    <i class="fas fa-caret-down ml-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow border-0">
                    <div class="dropdown-header text-center">
                        <strong>สิทธิ์: USER</strong>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php" class="dropdown-item text-danger text-center" onclick="return confirm('ยืนยันการออกจากระบบ?')">
                        <i class="fas fa-sign-out-alt mr-2"></i> <strong>ออกจากระบบ</strong>
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index.php" class="brand-link text-center">
            <span class="brand-text font-weight-bold">Haisok Report</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="index.php?page=overview" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i><p>หน้าหลัก Dashboard</p>
                        </a>
                    </li>
                    
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>HosxpXE_pcu_Report<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="index.php?page=population_age" class="nav-link "><i class="fas fa-users nav-icon ml-2 text-info"></i><p>ประชากรแยกตามอายุ</p></a></li>
                            <li class="nav-item"><a href="index.php?page=service_dashboard" class="nav-link "><i class="far fa-file-alt nav-icon ml-2"></i><p>10 อันดับโรค</p></a></li>
                            
                            <li class="nav-item">
                                <a href="index.php?page=dental_income" class="nav-link ">
                                    <i class="fas fa-wallet nav-icon ml-2 text-warning"></i><p>สรุปรายได้ทันตกรรม</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=dental" class="nav-link ">
                                    <i class="fas fa-tooth nav-icon ml-2 text-white"></i><p>รายละเอียดทันตกรรม</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-wallet"></i>
                            <p>จัดเก็บรายได้ รพ.สต.<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="?page=income" class="nav-link "><i class="fas fa-chart-pie nav-icon text-info"></i><p>ประมาณการรายได้</p></a></li>
                            <li class="nav-item"><a href="?page=ar" class="nav-link active"><i class="fas fa-file-invoice-dollar nav-icon text-warning"></i><p>รายงานลูกหนี้</p></a></li>
                            <li class="nav-item"><a href="?page=eclaim_ofc" class="nav-link "><i class="fas fa-file-export nav-icon text-primary"></i><p>เคลมสิทธิกรมบัญชีกลาง</p></a></li>
                            <li class="nav-item"><a href="?page=eclaim_lgo" class="nav-link "><i class="fas fa-file-export nav-icon text-info"></i><p>เคลมสิทธิ LGO</p></a></li>
                            <li class="nav-item"><a href="?page=eclaim_bkk" class="nav-link "><i class="fas fa-file-export nav-icon text-info"></i><p>เคลมสิทธิ กทม. (BKK)</p></a></li>
                            <li class="nav-item"><a href="?page=fsfund" class="nav-link "><i class="fas fa-coins nav-icon text-warning"></i><p>ชดเชย FS</p></a></li>
                            <li class="nav-item"><a href="?page=moph_claim_report" class="nav-link "><i class="fas fa-hospital-user nav-icon text-primary"></i><p>ชดเชย MOPH Claim</p></a></li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link ">
                                    <i class="fas fa-leaf nav-icon text-success"></i>
                                    <p>ชดเชยแพทย์แผนไทย <i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item"><a href="?page=thai_fm_annual" class="nav-link "><i class="far fa-circle nav-icon ml-3 text-success"></i><p>ชดเชยรายปี ภาพCUP</p></a></li>
                                    <li class="nav-item"><a href="?page=thai_med_ofc" class="nav-link "><i class="far fa-circle nav-icon ml-3 text-success"></i><p>สรุปผลงานแยกสิทธิ</p></a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="?page=sss_report_02991" class="nav-link "><i class="fas fa-user-shield nav-icon text-indigo"></i><p>ชดเชย ปกส.ในจังหวัด</p></a></li>
                            <li class="nav-item"><a href="?page=car_act_report" class="nav-link "><i class="fas fa-car-crash nav-icon text-danger"></i><p>ชดเชย พรบ.รถ</p></a></li>
							<li class="nav-item">
                            <a href="?page=rcpt_debt_report" class="nav-link "><i class="fas fa-balance-scale nav-icon text-warning"></i><p>กระทบยอดลูกหนี้รายสิทธิ</p></a></li>
                        </ul>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-hospital"></i>
                            <p>จัดเก็บรายได้ รพ.แม่ข่าย<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="index.php?page=main_hospital_income" class="nav-link "><i class="far fa-circle nav-icon text-success"></i><p>จัดการรายได้แม่ข่าย</p></a></li>
                            <li class="nav-item"><a href="index.php?page=eclaim_ofc_hosp" class="nav-link "><i class="far fa-circle nav-icon text-info"></i><p>สิทธิเบิกตรงแม่ข่าย</p></a></li>
                        </ul>
                    </li>
                    
                                    </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content" style="padding-top: 20px;">
            <div class="container-fluid">
                
<style>
    /* สไตล์สำหรับลิงก์คลิกเลียนแบบหน้า OFC */
    .rep-link { cursor: pointer; color: #4e73df; font-weight: bold; border-bottom: 1px dashed #4e73df; }
    .rep-link:hover { background-color: #f8f9fa; text-decoration: none; color: #224abe; }
</style>

<div class="row">
    <div class="col-12">
        <form method="GET" action="index.php" class="ar-filter-form card card-primary card-outline" style="margin-bottom: 20px;">
            <div class="card-body d-flex align-items-center p-3 flex-wrap">
                <input type="hidden" name="page" value="ar"> 
                
                <label for="fy_select" class="mr-2 mb-0">ปีงบ:</label>
                <select id="fy_select" name="fy" class="form-control form-control-sm mr-4" style="width: 100px;" onchange="updateDateRange(this.value)">
                                            <option value="2570" >
                            2570                        </option>
                                            <option value="2569" selected>
                            2569                        </option>
                                            <option value="2568" >
                            2568                        </option>
                                            <option value="2567" >
                            2567                        </option>
                                    </select>
                
                <label for="start_date_select" class="mr-2 mb-0">ตั้งแต่:</label>
                <input type="date" id="start_date_select" name="start_date" 
                       value="2025-10-01" 
                       class="form-control form-control-sm mr-2" style="width: 150px;">
                
                <label for="end_date_select" class="mr-2 mb-0">ถึง:</label>
                <input type="date" id="end_date_select" name="end_date" 
                       value="2026-09-30" 
                       class="form-control form-control-sm mr-4" style="width: 150px;">
                
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-search mr-1"></i> แสดงรายงาน
                </button>
                
                <small class="text-muted ml-auto">
                    **ปีงบ 2569** (Vstdate: 01/10/2025 - 30/09/2026)
                </small>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info"><div class="inner"><h3>1,317,730.00</h3><p>ค่ารักษาทั้งหมด (บาท)</p></div><div class="icon"><i class="ion ion-cash"></i></div></div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning"><div class="inner"><h3>1,550.00</h3><p>ชำระเงินแล้ว (บาท)</p></div><div class="icon"><i class="ion ion-pricetag"></i></div></div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="small-box bg-danger"><div class="inner"><h3>1,316,180.00</h3><p>ลูกหนี้สุทธิ (บาท)</p></div><div class="icon"><i class="ion ion-pie-graph"></i></div></div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header"><h3 class="card-title"><i class="fas fa-chart-bar mr-1"></i> 📊 สรุปยอดลูกหนี้ (Account Receivable) ปีงบประมาณ 2569</h3></div>
            <div class="card-body"><div class="chart-box"><canvas id="arChart" style="min-height: 400px; max-height: 800px;"></canvas></div></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title"><i class="fas fa-table mr-1"></i> รายละเอียดลูกหนี้ (OPD)</h3></div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10%;">รหัส</th>
                            <th style="width: 30%;">สิทธิการเงิน</th>
                            <th class="text-center">คน</th>
                            <th class="text-center">ครั้ง</th>
                            <th class="text-center">ค่ารักษาทั้งหมด</th>
                            <th class="text-center">ชำระแล้ว</th>
                            <th class="text-right">ลูกหนี้สุทธิ (บาท)</th>
                        </tr>
                    </thead>
                    <tbody>
                                                <tr>
                            <td>1102050101.201</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.201', 'ลูกหนี้ค่ารักษาพยาบาลUC ใน cup')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาพยาบาลUC ใน cup                                </span>
                            </td>
                            <td class="text-center">1,173</td>
                            <td class="text-center">3,050</td>
                            <td class="text-right">1,103,853.00</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">1,103,853.00</td>
                        </tr>
                                                <tr>
                            <td>1102050101.209</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.209', 'ลูกหนี้ค่ารักษาUC-PP Expressed demand สร้างเสริมสุขภาพและป้องกันโรค')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาUC-PP Expressed demand สร้างเสริมสุขภาพและป้องกันโรค                                </span>
                            </td>
                            <td class="text-center">902</td>
                            <td class="text-center">1,140</td>
                            <td class="text-right">89,975.00</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">89,975.00</td>
                        </tr>
                                                <tr>
                            <td>1102050101.401</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.401', 'ลูกหนี้ค่ารักษาเบิกจ่ายตรงกรมบัญชีกลาง')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาเบิกจ่ายตรงกรมบัญชีกลาง                                </span>
                            </td>
                            <td class="text-center">113</td>
                            <td class="text-center">213</td>
                            <td class="text-right">47,722.00</td>
                            <td class="text-right">100.00</td>
                            <td class="text-right text-danger font-weight-bold">47,622.00</td>
                        </tr>
                                                <tr>
                            <td>1102050101.301</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.301', 'ลูกหนี้ค่ารักษาประกันสังคม ในเครือข่าย')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาประกันสังคม ในเครือข่าย                                </span>
                            </td>
                            <td class="text-center">64</td>
                            <td class="text-center">127</td>
                            <td class="text-right">23,899.00</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">23,899.00</td>
                        </tr>
                                                <tr>
                            <td>1102050102.801</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050102.801', 'ลูกหนี้ค่ารักษาจ่ายตรง อปท.')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาจ่ายตรง อปท.                                </span>
                            </td>
                            <td class="text-center">43</td>
                            <td class="text-center">95</td>
                            <td class="text-right">19,799.00</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">19,799.00</td>
                        </tr>
                                                <tr>
                            <td>1102050102.602</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050102.602', 'ลูกหนี้ค่ารักษาพรบ.รถ')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาพรบ.รถ                                </span>
                            </td>
                            <td class="text-center">10</td>
                            <td class="text-center">100</td>
                            <td class="text-right">13,555.00</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">13,555.00</td>
                        </tr>
                                                <tr>
                            <td>1102050101.204</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.204', 'ลูกหนี้ค่ารักษาพยาบาลUC นอก cup ต่างจังหวัด')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาพยาบาลUC นอก cup ต่างจังหวัด                                </span>
                            </td>
                            <td class="text-center">26</td>
                            <td class="text-center">41</td>
                            <td class="text-right">6,426.00</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">6,426.00</td>
                        </tr>
                                                <tr>
                            <td>1102050101.203</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.203', 'ลูกหนี้ค่ารักษาพยาบาลUC นอก cup ในจังหวัด')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาพยาบาลUC นอก cup ในจังหวัด                                </span>
                            </td>
                            <td class="text-center">20</td>
                            <td class="text-center">23</td>
                            <td class="text-right">5,035.00</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">5,035.00</td>
                        </tr>
                                                <tr>
                            <td>1102050101.307</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.307', 'ลูกหนี้ค่าประกันสังคม กองทุนทดแทน')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่าประกันสังคม กองทุนทดแทน                                </span>
                            </td>
                            <td class="text-center">6</td>
                            <td class="text-center">9</td>
                            <td class="text-right">4,350.00</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">4,350.00</td>
                        </tr>
                                                <tr>
                            <td>1102050101.216</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.216', 'ลูกหนี้ค่ารักษาบริการเฉพาะ CR')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาบริการเฉพาะ CR                                </span>
                            </td>
                            <td class="text-center">5</td>
                            <td class="text-center">5</td>
                            <td class="text-right">945.50</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">945.50</td>
                        </tr>
                                                <tr>
                            <td>1102050102.106</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050102.106', 'ลูกหนี้ค่ารักษาชำระเงินแล้ว')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาชำระเงินแล้ว                                </span>
                            </td>
                            <td class="text-center">13</td>
                            <td class="text-center">22</td>
                            <td class="text-right">2,005.00</td>
                            <td class="text-right">1,450.00</td>
                            <td class="text-right text-danger font-weight-bold">555.00</td>
                        </tr>
                                                <tr>
                            <td>1102050102.201</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050102.201', 'ลูกหนี้ค่ารักษาUC ต่างสังกัด สป.')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาUC ต่างสังกัด สป.                                </span>
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-right">165.50</td>
                            <td class="text-right">0.00</td>
                            <td class="text-right text-danger font-weight-bold">165.50</td>
                        </tr>
                                            </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="repModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-user-circle mr-2"></i> <span id="modalRepTitle"></span></h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="modalContent"></div>
        </div>
    </div>
</div>

<script>
// ฟังก์ชันเปลี่ยนวันที่อัตโนมัติ
function updateDateRange(fy) {
    const yearCE = parseInt(fy) - 543;
    document.getElementById('start_date_select').value = (yearCE - 1) + '-10-01';
    document.getElementById('end_date_select').value = yearCE + '-09-30';
    document.querySelector('.ar-filter-form').submit();
}

// ฟังก์ชันแสดงกราฟ (ซ่อมเครื่องหมายปิดปีกกา)
document.addEventListener('DOMContentLoaded', function() {
    var chartData = {"labels":["\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e1e\u0e22\u0e32\u0e1a\u0e32\u0e25UC \u0e43\u0e19 cup","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32UC-PP Expressed demand \u0e2a\u0e23\u0e49\u0e32\u0e07\u0e40\u0e2a\u0e23\u0e34\u0e21\u0e2a\u0e38\u0e02\u0e20\u0e32\u0e1e\u0e41\u0e25\u0e30\u0e1b\u0e49\u0e2d\u0e07\u0e01\u0e31\u0e19\u0e42\u0e23\u0e04","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e40\u0e1a\u0e34\u0e01\u0e08\u0e48\u0e32\u0e22\u0e15\u0e23\u0e07\u0e01\u0e23\u0e21\u0e1a\u0e31\u0e0d\u0e0a\u0e35\u0e01\u0e25\u0e32\u0e07","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e1b\u0e23\u0e30\u0e01\u0e31\u0e19\u0e2a\u0e31\u0e07\u0e04\u0e21 \u0e43\u0e19\u0e40\u0e04\u0e23\u0e37\u0e2d\u0e02\u0e48\u0e32\u0e22","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e08\u0e48\u0e32\u0e22\u0e15\u0e23\u0e07 \u0e2d\u0e1b\u0e17.","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e1e\u0e23\u0e1a.\u0e23\u0e16","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e1e\u0e22\u0e32\u0e1a\u0e32\u0e25UC \u0e19\u0e2d\u0e01 cup \u0e15\u0e48\u0e32\u0e07\u0e08\u0e31\u0e07\u0e2b\u0e27\u0e31\u0e14","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e1e\u0e22\u0e32\u0e1a\u0e32\u0e25UC \u0e19\u0e2d\u0e01 cup \u0e43\u0e19\u0e08\u0e31\u0e07\u0e2b\u0e27\u0e31\u0e14","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e1b\u0e23\u0e30\u0e01\u0e31\u0e19\u0e2a\u0e31\u0e07\u0e04\u0e21 \u0e01\u0e2d\u0e07\u0e17\u0e38\u0e19\u0e17\u0e14\u0e41\u0e17\u0e19","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e1a\u0e23\u0e34\u0e01\u0e32\u0e23\u0e40\u0e09\u0e1e\u0e32\u0e30 CR","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32\u0e0a\u0e33\u0e23\u0e30\u0e40\u0e07\u0e34\u0e19\u0e41\u0e25\u0e49\u0e27","\u0e25\u0e39\u0e01\u0e2b\u0e19\u0e35\u0e49\u0e04\u0e48\u0e32\u0e23\u0e31\u0e01\u0e29\u0e32UC \u0e15\u0e48\u0e32\u0e07\u0e2a\u0e31\u0e07\u0e01\u0e31\u0e14 \u0e2a\u0e1b."],"ar":[1103853,89975,47622,23899,19799,13555,6426,5035,4350,945.5,555,165.5]};
    var ctx = document.getElementById('arChart').getContext('2d');
    const chartBox = document.querySelector('.chart-box');
    chartBox.style.height = Math.max(400, chartData.labels.length * 35) + 'px'; 

    new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'ยอดลูกหนี้ (บาท)',
                data: chartData.ar,
                backgroundColor: 'rgba(220, 53, 69, 0.8)', 
                borderColor: 'rgba(220, 53, 69, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y', 
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });
});

// ฟังก์ชันคลิกเด้ง Modal (อิงตาม ID หน้า OFC ของคุณหมอ)
function showPatientList(arCode, groupName) {
    $('#modalRepTitle').text('รายละเอียด: ' + groupName);
    $('#repModal').modal('show'); 

    // --- ตรวจสอบสิทธิผู้ใช้งาน ---
            // กรณีเป็น User ทั่วไป: แสดงหน้าจอ Access Denied
        $('#modalContent').html(`
            <div class="d-flex justify-content-center align-items-center" style="min-height:300px;">
                <div class="alert alert-danger shadow-sm text-center p-4" style="width: 90%; border-radius: 15px; border-left: 5px solid #dc3545;">
                    <i class="fas fa-user-shield fa-4x mb-3 text-danger"></i>
                    <h4 class="font-weight-bold">Access Denied</h4>
                    <hr>
                    <p class="lead">สิทธิของคุณไม่สามารถเข้าถึงรายละเอียดรายชื่อผู้ป่วยได้</p>
                    <p class="text-sm text-muted">ตามนโยบาย PDPA ระบบจะแสดงเฉพาะยอดสรุปตัวเลขเท่านั้น</p>
                    <button type="button" class="btn btn-outline-danger btn-sm mt-2" data-dismiss="modal">ปิดหน้าต่าง</button>
                </div>
            </div>
        `);
    }
</script>            </div>
        </section>
    </div>

    <footer class="main-footer text-sm">
        <div class="float-right d-none d-sm-block"><b>Version</b> 1.1.0</div>
        <strong>© 2024-2026 รพ.สต.บ้านหายโศก</strong>
    </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script>
    const idleTime = 20 * 60 * 1000; 
    let idleTimer;
    function resetTimer() {
        clearTimeout(idleTimer);
        idleTimer = setTimeout(function() {
            window.location.href = 'logout.php?timeout=1';
        }, idleTime);
    }
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; 
    window.ontouchstart = resetTimer;
    window.onclick = resetTimer;      
    window.onkeypress = resetTimer;
</script>

</body>
</html>