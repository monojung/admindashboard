<?php include 'includes/config.php'; ?>
<input type="hidden" name="page" value="eclaim_ofc">
           

<div class="container-fluid">
    
<div class="row mb-3 mt-3">
    <div class="col-sm-12">
        <div class="header-container">
            
            <h3 class="m-0 text-dark font-weight-bold">Dashboard ส่งเคลมสิทธิ จ่ายตรงกรมบัญชีกลาง ปีงบประมาณ <?php echo $year_select ; ?></h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-primary">
            <div class="inner"><h3>0.00</h3><p>ยอดส่งเบิก OFC ทั้งสิ้น</p></div>
            <div class="icon"><i class="fas fa-file-export"></i></div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-success">
            <div class="inner"><h3>0.00</h3><p>ยอดรับชดเชยรวม</p></div>
            <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-info">
            <div class="inner"><h3>0.00</h3><p>ส่วนต่ำสะสม (Down)</p></div>
            <div class="icon"><i class="fas fa-arrow-down"></i></div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-danger">
            <div class="inner"><h3>0.00</h3><p>ส่วนสูงสะสม (Up)</p></div>
            <div class="icon"><i class="fas fa-arrow-up"></i></div>
        </div>
    </div>
</div>

<form method="GET" class="card card-body shadow-sm mb-4 border-left-primary">
    <input type="hidden" name="page" value="eclaim_ofc">
    <div class="row align-items-end">
        <div class="col-md-2"><label class="small font-weight-bold">ปีงบประมาณ:</label>
            <select name="fy" class="form-control form-control-sm" onchange="this.form.submit()">
                <option value="2569" selected>2569</option><option value="2568" >2568</option><option value="2567" >2567</option><option value="2566" >2566</option>            </select>
        </div>
        <div class="col-md-2"><label class="small font-weight-bold">ตั้งแต่เดือน:</label>
            <select name="start_m" class="form-control form-control-sm"><option value="10" selected>ต.ค.</option><option value="11" >พ.ย.</option><option value="12" >ธ.ค.</option><option value="01" >ม.ค.</option><option value="02" >ก.พ.</option><option value="03" >มี.ค.</option><option value="04" >เม.ย.</option><option value="05" >พ.ค.</option><option value="06" >มิ.ย.</option><option value="07" >ก.ค.</option><option value="08" >ส.ค.</option><option value="09" >ก.ย.</option></select>
        </div>
        <div class="col-md-2"><label class="small font-weight-bold">ถึงเดือน:</label>
            <select name="end_m" class="form-control form-control-sm"><option value="10" >ต.ค.</option><option value="11" >พ.ย.</option><option value="12" >ธ.ค.</option><option value="01" >ม.ค.</option><option value="02" >ก.พ.</option><option value="03" >มี.ค.</option><option value="04" >เม.ย.</option><option value="05" >พ.ค.</option><option value="06" >มิ.ย.</option><option value="07" >ก.ค.</option><option value="08" >ส.ค.</option><option value="09" selected>ก.ย.</option></select>
        </div>
        <div class="col-md-4">
            <label class="small font-weight-bold text-primary">เลขที่รายงาน (Rep):</label>
            <select name="rep_id" class="form-control form-control-sm border-primary">
                <option value="all">-- ทั้งหมด --</option>
                <option value="681200021" >681200021</option><option value="681200020" >681200020</option><option value="681200008" >681200008</option><option value="681100018" >681100018</option><option value="681100004" >681100004</option><option value="681000011" >681000011</option><option value="681000003" >681000003</option>            </select>
        </div>
        <div class="col-md-2"><button type="submit" class="btn btn-primary btn-sm btn-block">ค้นหา</button></div>
    </div>
</form>

<div class="card shadow-sm mb-4"><div class="card-body"><div style="height: 350px;"><canvas id="ofcComboChart"></canvas></div></div></div>

<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mb-0">
            <thead class="bg-dark text-white">
                <tr>
                    <th width="80">YYMM</th><th width="90">เดือน</th><th class="text-left">เลขใบเสร็จ (Bill)</th>
                    <th width="100" class="bg-primary">Rep</th><th width="120" class="text-right">ยอดเบิก</th>
                    <th width="120" class="text-right">ชดเชย</th><th width="120" class="text-right">ส่วนต่าง</th>
                    <th width="110" class="text-right">ส่วนต่ำ</th><th width="110" class="text-right">ส่วนสูง</th>
                </tr>
            </thead>
            <tbody>
                                <tr>
                    <td class="small text-muted">6810</td><td>ต.ค.</td>
                    <td class="text-left small text-primary">บร.228/05                                                   </td>
                    <td><span class="rep-link" onclick="viewRepDetail('681000003')">681000003</span></td>
                    <td class="text-right">3,845.00</td>
                    <td class="text-right text-success font-weight-bold">3,845.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger font-weight-bold">0.00</td>
                </tr>
                                <tr>
                    <td class="small text-muted">6810</td><td>ต.ค.</td>
                    <td class="text-left small text-primary">บร.228/08                                                   </td>
                    <td><span class="rep-link" onclick="viewRepDetail('681000011')">681000011</span></td>
                    <td class="text-right">7,232.00</td>
                    <td class="text-right text-success font-weight-bold">7,232.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger font-weight-bold">0.00</td>
                </tr>
                                <tr>
                    <td class="small text-muted">6811</td><td>พ.ย.</td>
                    <td class="text-left small text-primary">บร.228/13                                                   </td>
                    <td><span class="rep-link" onclick="viewRepDetail('681100004')">681100004</span></td>
                    <td class="text-right">2,885.00</td>
                    <td class="text-right text-success font-weight-bold">2,885.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger font-weight-bold">0.00</td>
                </tr>
                                <tr>
                    <td class="small text-muted">6811</td><td>พ.ย.</td>
                    <td class="text-left small text-primary">บร.228/15                                                   </td>
                    <td><span class="rep-link" onclick="viewRepDetail('681100018')">681100018</span></td>
                    <td class="text-right">6,205.00</td>
                    <td class="text-right text-success font-weight-bold">6,205.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger font-weight-bold">0.00</td>
                </tr>
                                <tr>
                    <td class="small text-muted">6812</td><td>ธ.ค.</td>
                    <td class="text-left small text-primary">-</td>
                    <td><span class="rep-link" onclick="viewRepDetail('681200008')">681200008</span></td>
                    <td class="text-right">6,210.00</td>
                    <td class="text-right text-success font-weight-bold">6,210.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger font-weight-bold">0.00</td>
                </tr>
                                <tr>
                    <td class="small text-muted">6812</td><td>ธ.ค.</td>
                    <td class="text-left small text-primary">-</td>
                    <td><span class="rep-link" onclick="viewRepDetail('681200020')">681200020</span></td>
                    <td class="text-right">11,595.00</td>
                    <td class="text-right text-success font-weight-bold">11,595.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger font-weight-bold">0.00</td>
                </tr>
                                <tr>
                    <td class="small text-muted">6812</td><td>ธ.ค.</td>
                    <td class="text-left small text-primary">-</td>
                    <td><span class="rep-link" onclick="viewRepDetail('681200021')">681200021</span></td>
                    <td class="text-right">260.00</td>
                    <td class="text-right text-success font-weight-bold">260.00</td>
                    <td class="text-right text-danger">0.00</td>
                    <td class="text-right text-info">0.00</td>
                    <td class="text-right text-danger font-weight-bold">0.00</td>
                </tr>
                            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="repModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl"><div class="modal-content">
        <div class="modal-header bg-primary text-white"><h5 class="modal-title">รายละเอียด Rep: <span id="modalRepTitle"></span></h5><button type="button" class="close text-white" data-dismiss="modal">&times;</button></div>
        <div class="modal-body" id="modalContent"></div>
    </div></div>
</div>
 
<script>
function viewRepDetail(repId) {
    $('#modalRepTitle').text(repId); $('#repModal').modal('show');
    $('#modalContent').html('<div class="text-center p-5"><i class="fas fa-spinner fa-spin fa-2x"></i> กำลังโหลด...</div>');
    $.get('get_patient_list_ofc.php', { rep: repId }, function(data) { $('#modalContent').html(data); });
}
Chart.register(ChartDataLabels);
const ctx = document.getElementById('ofcComboChart').getContext('2d');
new Chart(ctx, {
    data: {
        labels: ["\u0e15.\u0e04.","\u0e1e.\u0e22.","\u0e18.\u0e04."],
        datasets: [
            { type: 'line', label: 'แนวโน้มการชดเชย', data: [11077,9090,18065], borderColor: '#3498DB', borderWidth: 3, tension: 0.3, fill: false, pointRadius: 4, datalabels: { display: false } },
            { type: 'bar', label: 'ยอดส่งเบิก', data: [11077,9090,18065], backgroundColor: 'rgba(52, 152, 219, 0.2)', borderColor: '#3498DB', borderWidth: 1, datalabels: { anchor: 'end', align: 'top', formatter: (v) => v.toLocaleString(), font: { weight: 'bold', size: 10 }, color: '#3498DB' } },
            { type: 'bar', label: 'ยอดได้รับชดเชย', data: [11077,9090,18065], backgroundColor: '#F1C40F', datalabels: { anchor: 'end', align: 'top', formatter: (v) => v.toLocaleString(), font: { weight: 'bold', size: 10 }, color: '#B7950B' } }
        ]
    },
    options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } }, scales: { y: { beginAtZero: true, grace: '20%', ticks: { callback: (v) => v.toLocaleString() } } } }
});
</script>            
</div>
        </section>
    </div>

<?php include 'includes/footer.php'; ?>
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