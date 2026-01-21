<div class="row">
    <div class="col-12">

    <?php 
include 'includes/config.php'; 
?>
        <form method="GET" action="index.php" class="ar-filter-form card card-primary card-outline" style="margin-bottom: 20px;">
            <div class="card-body d-flex align-items-center p-3 flex-wrap">
                <input type="hidden" name="page" value="ar"> 
                
               <label for="year_select" class="mr-2 mb-0 text-bold">ปีงบประมาณ:</label>
        <select id="year_select" name="year" class="form-control form-control-sm mr-4" style="width: 100px;" required>
            <?php foreach ($years as $y): ?>
                <option value="<?= $y ?>" <?= ($year_select == $y) ? 'selected' : '' ?>><?= $y ?></option>
            <?php endforeach; ?>
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
        <div class="small-box bg-info"><div class="inner"><h3>0</h3><p>ค่ารักษาทั้งหมด (บาท)</p></div><div class="icon"><i class="ion ion-cash"></i></div></div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning"><div class="inner"><h3>0</h3><p>ชำระเงินแล้ว (บาท)</p></div><div class="icon"><i class="ion ion-pricetag"></i></div></div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="small-box bg-danger"><div class="inner"><h3>0</h3><p>ลูกหนี้สุทธิ (บาท)</p></div><div class="icon"><i class="ion ion-pie-graph"></i></div></div>
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
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050101.209</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.209', 'ลูกหนี้ค่ารักษาUC-PP Expressed demand สร้างเสริมสุขภาพและป้องกันโรค')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาUC-PP Expressed demand สร้างเสริมสุขภาพและป้องกันโรค                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050101.401</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.401', 'ลูกหนี้ค่ารักษาเบิกจ่ายตรงกรมบัญชีกลาง')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาเบิกจ่ายตรงกรมบัญชีกลาง                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050101.301</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.301', 'ลูกหนี้ค่ารักษาประกันสังคม ในเครือข่าย')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาประกันสังคม ในเครือข่าย                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050102.801</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050102.801', 'ลูกหนี้ค่ารักษาจ่ายตรง อปท.')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาจ่ายตรง อปท.                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050102.602</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050102.602', 'ลูกหนี้ค่ารักษาพรบ.รถ')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาพรบ.รถ                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050101.204</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.204', 'ลูกหนี้ค่ารักษาพยาบาลUC นอก cup ต่างจังหวัด')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาพยาบาลUC นอก cup ต่างจังหวัด                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050101.203</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.203', 'ลูกหนี้ค่ารักษาพยาบาลUC นอก cup ในจังหวัด')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาพยาบาลUC นอก cup ในจังหวัด                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050101.307</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.307', 'ลูกหนี้ค่าประกันสังคม กองทุนทดแทน')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่าประกันสังคม กองทุนทดแทน                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050101.216</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050101.216', 'ลูกหนี้ค่ารักษาบริการเฉพาะ CR')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาบริการเฉพาะ CR                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050102.106</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050102.106', 'ลูกหนี้ค่ารักษาชำระเงินแล้ว')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาชำระเงินแล้ว                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
                        </tr>
                        <tr>
                            <td>1102050102.201</td>
                            <td>
                                <span class="rep-link" onclick="showPatientList('1102050102.201', 'ลูกหนี้ค่ารักษาUC ต่างสังกัด สป.')">
                                    <i class="fas fa-search-plus mr-1"></i> ลูกหนี้ค่ารักษาUC ต่างสังกัด สป.                                </span>
                            </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-right text-danger font-weight-bold">0</td>
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