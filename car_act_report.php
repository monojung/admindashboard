
<style>
    /* พื้นหลังเทาเข้ม (Charcoal) - ตัดกับตัวหนังสือขาวได้ดีกว่าสีดำสนิท */
    .main-sidebar.custom-vivid-sidebar {
        background-color: #24292e !important; 
        transition: all 0.3s ease;
    }

    /* ส่วนหัว Logo */
    .brand-link.custom-logo-bg {
        background-color: #1a1d21 !important;
        border-bottom: 1px solid #3f4448 !important;
    }
    .brand-link .brand-text {
        color: #ffffff !important;
        font-weight: 600 !important;
        letter-spacing: 1px;
    }

    /* ตัวหนังสือเมนูหลัก (ขาวจัด ชัดเจน) */
    .custom-vivid-sidebar .nav-sidebar .nav-link p {
        color: #ffffff !important;
        font-weight: 400;
        font-size: 0.95rem;
    }

    /* จัดเต็มสีไอคอนแยกหมวดหมู่ (Vivid Colors) */
    .icon-dashboard { color: #00d2ff !important; } /* ฟ้านีออน */
    .icon-hosxp { color: #a29bfe !important; }     /* ม่วงพาสเทล */
    .icon-income { color: #ff9f43 !important; }    /* ส้มสด */
    .icon-thai { color: #55efc4 !important; }      /* เขียวมินต์ */
    .icon-balance { color: #ff7675 !important; }   /* แดงชมพู */
    .icon-admin { color: #fdcb6e !important; }     /* เหลืองทอง */

    /* สไตล์เมื่อเอาเมาส์ไปชี้ (Hover) */
    .custom-vivid-sidebar .nav-sidebar .nav-item .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
        transform: translateX(5px);
        transition: 0.2s;
    }

    /* สไตล์เมนูที่กำลังใช้งาน (Active) - ใช้สีฟ้าสว่างตัดพื้นเข้ม */
    .custom-vivid-sidebar .nav-pills .nav-link.active {
        background-color: #007bff !important; 
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.4);
        font-weight: 600 !important;
    }
    .custom-vivid-sidebar .nav-pills .nav-link.active i {
        color: #ffffff !important; /* ไอคอนเป็นสีขาวเมื่อ active */
    }

    /* หัวข้อกลุ่มเมนู (Nav Header) */
    .custom-vivid-sidebar .nav-header {
        color: #8b949e !important;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 1.5rem 0 0.5rem 1.2rem;
        text-transform: uppercase;
    }
</style>


<style>
    .small-box { border-radius: 12px; position: relative; display: block; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); color: #fff; padding: 15px; transition: transform 0.2s; }
    .small-box:hover { transform: translateY(-3px); }
    .small-box h4 { font-weight: bold; margin-bottom: 5px; }
    .bg-gradient-danger { background: linear-gradient(45deg, #d9534f, #9d1c1c); }
    .bg-gradient-success { background: linear-gradient(45deg, #28a745, #1e7e34); }
    .bg-gradient-warning { background: linear-gradient(45deg, #f6c23e, #f4b619); }
    .bg-gradient-info { background: linear-gradient(45deg, #36b9cc, #258391); }
    .bg-gradient-dark { background: linear-gradient(45deg, #5a5c69, #373840); }
    .rep-link { cursor: pointer; color: #d9534f; font-weight: bold; border-bottom: 1px dashed #d9534f; }
    .text-pending { color: #fd7e14 !important; font-weight: bold; }
</style>

<div class="row mb-3 mt-3 align-items-center">
    <div class="col-md-8">
        <h3 class="m-0 font-weight-bold text-dark"><i class="fas fa-car-crash text-danger mr-2"></i>Dashboard ชดเชยสิทธิ พรบ.รถ (Z2) ปีงบประมาณ 2568</h3>
    </div>
</div>

<div class="row">
    <div class="col-xl-2 col-md-4 col-6">
        <div class="small-box bg-gradient-danger">
            <div class="inner"><h4>18,190.00</h4><p class="mb-0 small">ยอดส่งเบิก</p></div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-6">
        <div class="small-box bg-gradient-success">
            <div class="inner"><h4>17,930.00</h4><p class="mb-0 small">ชดเชยแล้ว</p></div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-6">
        <div class="small-box bg-gradient-warning">
            <div class="inner"><h4>0.00</h4><p class="mb-0 small">ค้างรับสะสม</p></div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-6">
        <div class="small-box bg-gradient-info">
            <div class="inner"><h4>0.00</h4><p class="mb-0 small">ส่วนต่ำ (Down)</p></div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6 col-6">
        <div class="small-box bg-gradient-dark">
            <div class="inner"><h4>192</h4><p class="mb-0 small">จำนวน (ราย)</p></div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4 border-left-danger">
    <div class="card-body p-2">
        <form method="GET" action="index.php" class="form-inline justify-content-center">
            <input type="hidden" name="page" value="car_act_report">
            <label for="year_select" class="mr-2 mb-0 text-bold">ปีงบประมาณ:</label>
        <select id="year_select" name="year" class="form-control form-control-sm mr-4" style="width: 100px;" required>
            <?php foreach ($years as $y): ?>
                <option value="<?= $y ?>" <?= ($year_select == $y) ? 'selected' : '' ?>><?= $y ?></option>
            <?php endforeach; ?>
        </select>
            <button type="submit" class="btn btn-danger btn-sm">ประมวลผล</button>
        </form>
    </div>
</div>

<div class="card shadow-sm mb-4"><div class="card-body"><div style="height: 300px;"><canvas id="actChart"></canvas></div></div></div>

<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mb-0" id="reportTable">
            <thead class="bg-dark text-white">
                <tr>
                    <th width="80">YYMM</th><th width="90">เดือน</th><th class="text-left">เลขใบเสร็จ (Bill)</th>
                    <th width="100" class="bg-danger">Rep</th><th width="110" class="text-right">ยอดเบิก</th>
                    <th width="110" class="text-right">ชดเชย</th><th width="100" class="text-right text-info">ส่วนต่ำ</th>
                    <th width="100" class="text-right text-danger">ส่วนสูง</th><th width="110" class="bg-warning text-dark">ค้างรับ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="small text-muted">6809</td><td>ก.ย.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.228/10</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP681222810')">RVP681222810</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6809</td><td>ก.ย.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.228/11</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP681222811')">RVP681222811</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6807</td><td>ก.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/72</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680802')">RVP680802</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6806</td><td>มิ.ย.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/73</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680801')">RVP680801</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6805</td><td>พ.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/65</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680601')">RVP680601</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6805</td><td>พ.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/67</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680603')">RVP680603</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6804</td><td>เม.ย.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/65</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680601')">RVP680601</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6804</td><td>เม.ย.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/66</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680602')">RVP680602</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6804</td><td>เม.ย.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/67</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680603')">RVP680603</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6803</td><td>มี.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/50</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680501')">RVP680501</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6802</td><td>ก.พ.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/37</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680302')">RVP680302</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6802</td><td>ก.พ.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/40</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680305')">RVP680305</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6802</td><td>ก.พ.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/40</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680306')">RVP680306</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6802</td><td>ก.พ.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/50</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680501')">RVP680501</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6801</td><td>ม.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/36</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680301')">RVP680301</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6801</td><td>ม.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/38</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680303')">RVP680303</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6801</td><td>ม.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/39</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680304')">RVP680304</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6712</td><td>ธ.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/21</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680101')">RVP680101</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6712</td><td>ธ.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/20</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680102')">RVP680102</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6712</td><td>ธ.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/36</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680301')">RVP680301</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6711</td><td>พ.ย.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/18</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680103')">RVP680103</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
                <tr>
                    <td class="small text-muted">6710</td><td>ต.ค.</td>
                    <td class="text-left small text-truncate" style="max-width: 180px;">บร.170/19</td>
                    <td><span class="rep-link" onclick="viewRepDetail('RVP680104')">RVP680104</span></td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success font-weight-bold">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">-</td>
                </tr>
            </tbody>
            <tfoot class="bg-light font-weight-bold">
                <tr>
                    <td colspan="4" class="text-right text-danger">รวมสุทธิ (192 ราย):</td>
                    <td class="text-right">0.00</td>
                    <td class="text-right text-success">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-pending">0.00</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="modal fade" id="repModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl"><div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title font-weight-bold">รายละเอียดรายตัว Rep: <span id="modalRepTitle"></span></h5>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body p-0" id="modalContent"></div>
    </div></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
function viewRepDetail(repId) {
    $('#modalRepTitle').text(repId);
    $('#repModal').modal('show');
    $('#modalContent').html('<div class="text-center p-5"><i class="fas fa-spinner fa-spin fa-2x"></i> กำลังโหลด...</div>');
    $.get('modules/claim_fs/get_patient_list_ofc.php', { rep: repId, type: 'PRB' }, function(data) {
        $('#modalContent').html(data);
    });
}

const ctx = document.getElementById('actChart').getContext('2d');
new Chart(ctx, {
    data: {
        labels: ["\u0e15.\u0e04. 67","\u0e1e.\u0e22. 67","\u0e18.\u0e04. 67","\u0e21.\u0e04. 68","\u0e01.\u0e1e. 68","\u0e21\u0e35.\u0e04. 68","\u0e40\u0e21.\u0e22. 68","\u0e1e.\u0e04. 68","\u0e21\u0e34.\u0e22. 68","\u0e01.\u0e04. 68","\u0e01.\u0e22. 68"],
        datasets: [
            { type: 'line', label: 'ยอดชดเชย', data: [210,1030,2510,1890,2895,420,2935,2630,1890,1050,470], borderColor: '#dc3545', borderWidth: 3, tension: 0.4, fill: false },
            { type: 'bar', label: 'ยอดเบิก', data: [210,1030,2510,2030,3015,420,2935,2630,1890,1050,470], backgroundColor: 'rgba(52, 58, 64, 0.1)', borderColor: '#343a40', borderWidth: 1 }
        ]
    },
    options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'top' } } }
});
</script>        </div>
    </section>
</div>

