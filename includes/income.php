<div class="container-fluid">
    <!-- Date Filter Form -->
    <div class="row">
        <div class="col-12">
            <form method="GET" action="index.php" class="date-form card card-primary card-outline" style="margin-bottom: 20px;">
                <div class="card-body d-flex align-items-center p-3">
                    <input type="hidden" name="page" value="income">
                    
                    <label for="start_date_input" class="mr-2">วันที่เริ่มต้น:</label>
                    <input type="date" id="start_date_input" name="start_date" class="form-control form-control-sm mr-2" style="width: 150px;" value="2026-01-01" required>
                    
                    <label for="end_date_input" class="mr-2">ถึงวันที่:</label>
                    <input type="date" id="end_date_input" name="end_date" class="form-control form-control-sm mr-2" style="width: 150px;" value="2026-01-06" required>
                    
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-search mr-1"></i> แสดงรายงาน
                    </button>
                    
                    <small class="text-muted ml-auto">
                        ข้อมูลตั้งแต่วันที่ <strong>2026-01-01</strong> ถึง <strong>2026-01-06</strong>
                    </small>
                </div>
            </form>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner" style="height: 120px;">
                    <h3>4,600.00</h3>
                    <div style="font-weight: bold; margin-top: 10px;">รวมประมาณการรายได้ตามสิทธิ (บาท)</div>
                </div>
                <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
                <a href="revenue_pttype_report.php?start_date=2026-01-01&end_date=2026-01-06" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner" style="height: 120px;">
                    <h3>2,498.00</h3>
                    <div style="font-weight: bold; margin-top: 10px;">รวมประมาณการรายได้ยาสมุนไพร</div>
                </div>
                <div class="icon"><i class="fas fa-leaf"></i></div>
                <a href="herb_detail_report.php?start_date=2026-01-01&end_date=2026-01-06" class="small-box-footer">ดูรายละเอียดรายคน <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner" style="height: 120px;">
                    <h3>0.00</h3>
                    <div style="color: #8b4513; font-weight: bold; margin-top: 10px;">รวมประมาณการรายได้ยาคุมกำเนิด</div>
                </div>
                <div class="icon"><i class="fas fa-pills"></i></div>
                <a href="fp_services_report.php" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner" style="height: 120px;">
                    <h3>75.00</h3>
                    <div style="color: #ffffff; font-weight: bold; margin-top: 10px;">รวมประมาณการรายได้ส่งเสริม (ADP)</div>
                </div>
                <div class="icon"><i class="fas fa-heartbeat"></i></div>
                <a href="adp_services_report.php" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <section class="col-lg-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">สัดส่วนรายได้ตามสิทธิ (Pie Chart)</h3>
                </div>
                <div class="card-body">
                    <canvas id="incomePieChart"></canvas>
                </div>
            </div>
        </section>

        <section class="col-lg-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">จำนวนผู้ป่วย (คน/ครั้ง) (Bar Chart)</h3>
                </div>
                <div class="card-body">
                    <canvas id="patientCountBarChart"></canvas>
                </div>
            </div>
        </section>
    </div>

    <!-- Table 1: Income by Rights -->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">1. ตารางสรุปรายละเอียดรายได้ตามสิทธิ</h3>
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
                                <td>ชำระเงินเองไม่ใช้ พรบ.</td>
                                <td class="numeric">1</td>
                                <td class="numeric">3</td>
                                <td class="numeric">0</td>
                                <td class="numeric">3</td>
                                <td class="numeric text-bold text-primary">210.00</td>
                            </tr>
                            <tr>
                                <td>ปกส.นอกจังหวัด</td>
                                <td class="numeric">1</td>
                                <td class="numeric">1</td>
                                <td class="numeric">0</td>
                                <td class="numeric">1</td>
                                <td class="numeric text-bold text-primary">130.00</td>
                            </tr>
                            <tr>
                                <td>ปกส.ในจังหวัด</td>
                                <td class="numeric">1</td>
                                <td class="numeric">1</td>
                                <td class="numeric">0</td>
                                <td class="numeric">0</td>
                                <td class="numeric text-bold text-primary">100.00</td>
                            </tr>
                            <tr>
                                <td>สิทธิ Walk in</td>
                                <td class="numeric">2</td>
                                <td class="numeric">3</td>
                                <td class="numeric">3</td>
                                <td class="numeric">0</td>
                                <td class="numeric text-bold text-primary">210.00</td>
                            </tr>
                            <tr>
                                <td>สิทธิ อปท.</td>
                                <td class="numeric">3</td>
                                <td class="numeric">3</td>
                                <td class="numeric">3</td>
                                <td class="numeric">0</td>
                                <td class="numeric text-bold text-primary">585.00</td>
                            </tr>
                            <tr>
                                <td>สิทธิจ่ายตรง</td>
                                <td class="numeric">6</td>
                                <td class="numeric">9</td>
                                <td class="numeric">8</td>
                                <td class="numeric">0</td>
                                <td class="numeric text-bold text-primary">3,365.00</td>
                            </tr>
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                <td class="numeric">14</td>
                                <td class="numeric">20</td>
                                <td class="numeric">14</td>
                                <td class="numeric">3</td>
                                <td class="numeric text-bold text-primary">4,600.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Table 2: Herbal Medicine Income -->
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">2. ประมาณการรายได้ยาสมุนไพรตามรายการ (สิทธิ WEL/UCS)</h3>
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
                                <td class="numeric">4</td>
                                <td class="numeric">191.50</td>
                                <td class="numeric">4</td>
                                <td class="numeric text-bold text-success">766.00</td>
                            </tr>
                            <tr>
                                <td>ฟ้าทะลายโจร</td>
                                <td class="numeric">6</td>
                                <td class="numeric">92.00</td>
                                <td class="numeric">6</td>
                                <td class="numeric text-bold text-success">552.00</td>
                            </tr>
                            <tr>
                                <td>ยาแก้ไอมะขามป้อม</td>
                                <td class="numeric">10</td>
                                <td class="numeric">84.00</td>
                                <td class="numeric">10</td>
                                <td class="numeric text-bold text-success">840.00</td>
                            </tr>
                            <tr>
                                <td>ลูกประคบ</td>
                                <td class="numeric">2</td>
                                <td class="numeric">100.00</td>
                                <td class="numeric">2</td>
                                <td class="numeric text-bold text-success">200.00</td>
                            </tr>
                            <tr>
                                <td>เถาวัลย์เปรียง</td>
                                <td class="numeric">1</td>
                                <td class="numeric">60.00</td>
                                <td class="numeric">1</td>
                                <td class="numeric text-bold text-success">60.00</td>
                            </tr>
                            <tr>
                                <td>ไพลครีม</td>
                                <td class="numeric">2</td>
                                <td class="numeric">40.00</td>
                                <td class="numeric">2</td>
                                <td class="numeric text-bold text-success">80.00</td>
                            </tr>
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                <td class="numeric">25</td>
                                <td class="numeric">-</td>
                                <td class="numeric">25</td>
                                <td class="numeric text-bold text-success">2,498.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Table 3: Contraceptive Income -->
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">3. ประมาณการรายได้ยาคุมกำเนิด (ยาเม็ด/ยาฉีด)</h3>
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
                                <td class="numeric">0</td>
                                <td class="numeric">0</td>
                                <td class="numeric text-bold text-info">0.00</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="fp_services_report.php?start_date=2026-01-01 00:00:00&end_date=2026-01-06 23:59:59" class="text-info font-weight-bold" title="ดูรายละเอียดรายคน">
                                        <i class="fas fa-search-plus mr-1"></i> ยาฉีด
                                    </a>
                                </td>
                                <td class="numeric">0</td>
                                <td class="numeric">0</td>
                                <td class="numeric text-bold text-info">0.00</td>
                            </tr>
                            <tr class="total-row">
                                <td>รวมทั้งหมด</td>
                                <td class="numeric">0</td>
                                <td class="numeric">0</td>
                                <td class="numeric text-bold text-info">0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Table 4: ADP Services Income -->
    <div class="row">
        <div class="col-12">
            <div class="card card-warning card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">4. ประมาณการรายได้จากบริการส่งเสริมสุขภาพ (ADP)</h3>
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
                                <td>ทดสอบหญิงตั้งครรภ์</td>
                                <td class="numeric">1</td>
                                <td class="numeric">1</td>
                                <td class="numeric text-bold text-warning">75.00</td>
                                <td class="numeric">1</td>
                            </tr>
                            <tr class="total-row">
                                <td>รวมคัดกรอง (ADP)</td>
                                <td class="numeric">1</td>
                                <td class="numeric">1</td>
                                <td class="numeric text-bold text-warning">75.00</td>
                                <td class="numeric">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Chart.js configuration data
    const chartLabels = ["ชำระเงินเองไม่ใช้ พรบ.", "ปกส.นอกจังหวัด", "ปกส.ในจังหวัด", "สิทธิ Walk in", "สิทธิ อปท.", "สิทธิจ่ายตรง"];
    const incomeData = [210, 130, 100, 210, 585, 3365];
    const hnCountData = [1, 1, 1, 2, 3, 6];
    const vnCountData = [3, 1, 1, 3, 3, 9];

    if (typeof ChartDataLabels !== 'undefined') {
        Chart.register(ChartDataLabels);
    }

    function generateColors(count) {
        const colors = ['#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1', '#fd7e14', '#e83e8c', '#20c997', '#6c757d', '#001f3f', '#3d9970', '#ff851b', '#00c0ef', '#f012be'];
        return Array.from({ length: count }, (_, i) => colors[i % colors.length]);
    }

    const backgroundColors = generateColors(chartLabels.length);

    // Pie Chart
    const ctxIncomePie = document.getElementById('incomePieChart').getContext('2d');
    new Chart(ctxIncomePie, {
        type: 'pie',
        data: {
            labels: chartLabels,
            datasets: [{
                data: incomeData,
                backgroundColor: backgroundColors,
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            plugins: {
                legend: { position: 'right', labels: { boxWidth: 15, padding: 10 } },
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = ctx.dataset.data.reduce((a, b) => a + b, 0);
                        return (value / sum * 100).toFixed(1) + "%";
                    },
                    color: '#fff',
                    font: { weight: 'bold' }
                },
                tooltip: {
                    callbacks: {
                        label: (context) => {
                            let label = context.label || '';
                            if (label) label += ': ';
                            label += new Intl.NumberFormat('th-TH', { style: 'currency', currency: 'THB' }).format(context.raw);
                            return label;
                        }
                    }
                }
            }
        }
    });

    // Bar Chart
    const ctxPatientBar = document.getElementById('patientCountBarChart').getContext('2d');
    new Chart(ctxPatientBar, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'จำนวนคน (HN)',
                data: hnCountData,
                backgroundColor: 'rgba(40, 167, 69, 0.8)',
                borderColor: '#28a745',
                borderWidth: 1
            }, {
                label: 'จำนวนครั้ง (VN)',
                data: vnCountData,
                backgroundColor: 'rgba(0, 123, 255, 0.8)',
                borderColor: '#007bff',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            indexAxis: 'y',
            scales: {
                x: { beginAtZero: true, title: { display: true, text: 'จำนวน' } },
                y: { stacked: false }
            },
            plugins: {
                legend: { position: 'bottom' },
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    color: '#333',
                    font: { size: 10, weight: 'bold' },
                    formatter: (value) => value.toLocaleString()
                },
                tooltip: {
                    callbacks: {
                        label: (context) => {
                            let label = context.dataset.label || '';
                            if (label) label += ': ';
                            label += new Intl.NumberFormat('th-TH').format(context.raw);
                            return label;
                        }
                    }
                }
            }
        }
    });
</script>
<?php include 'footer.php'; ?>