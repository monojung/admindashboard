
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!-- ChartJS ONLINE-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.5.0/chart.min.js" integrity="sha512-n/G+dROKbKL3GVngGWmWfwK0yPctjZQM752diVYnXZtD/48agpUKLIn0xDQL9ydZ91x6BiOmTIFwWjjFi2kEFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<!-- Custom Chart Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const labels = <?= json_encode($js_labels) ?>;
    const ofcTotalCollect = <?= json_encode($js_op_collect) ?>;
    const ofcTotalComp = <?= json_encode($js_op_comp) ?>;

    new Chart(document.getElementById('ofcOpBarChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                { label: 'ยอดเรียกเก็บรวม', data: ofcTotalCollect, backgroundColor: 'rgba(255, 81, 0, 0.8)' },
                { label: 'ยอดชดเชยรวม', data: ofcTotalComp, backgroundColor: 'rgba(75, 192, 192, 0.8)' }
            ]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const labels = <?= json_encode($js_labels) ?>;
    const ofcTotalCollect = <?= json_encode($js_ip_collect) ?>;
    const ofcTotalComp = <?= json_encode($js_ip_comp) ?>;

    new Chart(document.getElementById('ofcIpBarChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                { label: 'ยอดเรียกเก็บรวม', data: ofcTotalCollect, backgroundColor: 'rgba(255, 81, 0, 0.8)' },
                { label: 'ยอดชดเชยรวม', data: ofcTotalComp, backgroundColor: 'rgba(75, 192, 192, 0.8)' }
            ]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
});
</script>