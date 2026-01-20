<div class="card card-outline card-primary shadow-sm mb-3">
    <div class="card-body p-3">
        <form method="GET" action="index.php" class="row align-items-end">
            <input type="hidden" name="page" value="thai_med_ofc">
            <div class="col-md-2">
                <label class="small font-weight-bold">ปีงบประมาณ</label>
                <select name="fy" class="form-control form-control-sm">
                                            <option value="2027" >ปีงบประมาณ 2570</option>
                                            <option value="2026" selected>ปีงบประมาณ 2569</option>
                                            <option value="2025" >ปีงบประมาณ 2568</option>
                                            <option value="2024" >ปีงบประมาณ 2567</option>
                                            <option value="2023" >ปีงบประมาณ 2566</option>
                                            <option value="2022" >ปีงบประมาณ 2565</option>
                                            <option value="2021" >ปีงบประมาณ 2564</option>
                                    </select>
            </div>
            <div class="col-md-2">
                <label class="small font-weight-bold">รายเดือน</label>
                <select name="m" class="form-control form-control-sm">
                                            <option value="all" >--- ทั้งปีงบประมาณ ---</option>
                                            <option value="10" >ตุลาคม</option>
                                            <option value="11" >พฤศจิกายน</option>
                                            <option value="12" >ธันวาคม</option>
                                            <option value="01" selected>มกราคม</option>
                                            <option value="02" >กุมภาพันธ์</option>
                                            <option value="03" >มีนาคม</option>
                                            <option value="04" >เมษายน</option>
                                            <option value="05" >พฤษภาคม</option>
                                            <option value="06" >มิถุนายน</option>
                                            <option value="07" >กรกฎาคม</option>
                                            <option value="08" >สิงหาคม</option>
                                            <option value="09" >กันยายน</option>
                                    </select>
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold text-primary">หรือ ระบุวันที่เริ่มต้น</label>
                <input type="date" name="s_date" class="form-control form-control-sm" value="">
            </div>
            <div class="col-md-3">
                <label class="small font-weight-bold text-primary">ถึงวันที่</label>
                <input type="date" name="e_date" class="form-control form-control-sm" value="">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-search mr-1"></i> แสดงข้อมูล</button>
            </div>
        </form>
    </div>
</div>

<div class="row mb-3 mt-3 align-items-center">
    <div class="col-sm-12 text-center">
        <h3 class="m-0 text-dark font-weight-bold">
            สรุปผู้มารับบริการ  แพทย์แผนไทยแยกตามสิทธิการรักษา
            <br><small class="badge badge-info shadow-sm p-2" style="font-size: 0.9rem; border-radius:15px;">เดือน มกราคม พ.ศ. 2569</small>
        </h3>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-dark text-white">
        <h5 class="m-0"><i class="fas fa-table mr-2"></i>รายละเอียดรายได้ประมาณการแยกตามสิทธิ</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center mb-0">
                <thead class="bg-light">
                    <tr>
                        <th rowspan="2" class="align-middle">สิทธิการรักษา</th>
                        <th rowspan="2" class="align-middle bg-info">รับบริการ<br>(ครั้ง)</th>
                        <th colspan="2">นวด+ประคบ</th>
                        <th colspan="2">นวด</th>
                        <th colspan="2">ประคบ</th>
                        <th colspan="2">อบสมุนไพร</th>
                        <th rowspan="2" class="align-middle bg-success text-white">รวมรายได้<br>(บาท)</th>
                    </tr>
                    <tr>
                        <th class="small">ครั้ง</th><th class="small">เงิน</th>
                        <th class="small">ครั้ง</th><th class="small">เงิน</th>
                        <th class="small">ครั้ง</th><th class="small">เงิน</th>
                        <th class="small">ครั้ง</th><th class="small">เงิน</th>
                    </tr>
                </thead>
                <tbody>
                                        <tr class="">
                        <td class="text-left">จ่ายตรงกรมบัญชีกลาง</td>
                        <td>0</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td class="text-right font-weight-bold">0.00</td>
                    </tr>
                                        <tr class="">
                        <td class="text-left">บัตรทอง</td>
                        <td>0</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td class="text-right font-weight-bold">0.00</td>
                    </tr>
                                        <tr class="">
                        <td class="text-left">ประกันสังคม</td>
                        <td>0</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td class="text-right font-weight-bold">0.00</td>
                    </tr>
                                        <tr class="bg-secondary font-weight-bold text-white">
                        <td class="text-left">รวมทั้งหมด</td>
                        <td>0</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td>0</td>
                        <td class="text-right">0.00</td>
                        <td class="text-right font-weight-bold">0.00</td>
                    </tr>
                                    </tbody>
            </table>
        </div>
    </div>
</div>

<div class="alert alert-light mt-3 shadow-sm border-left border-info">
    <small>
    <i class="fas fa-info-circle text-info mr-2"></i> 
    <b>วิธีใช้ตัวกรอง:</b> หากคุณหมอใส่ "ระบุวันที่" ระบบจะใช้ช่วงวันที่นั้นทันที แต่หากเว้นว่างไว้ ระบบจะใช้ปีงบประมาณและเดือนที่คุณหมอเลือกเป็นหลักครับ
    </small>
</div>            </div>
        </section>
    </div>

    
</div>


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

