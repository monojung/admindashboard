<?php
// ฟังก์ชันช่วยดึงเวอร์ชันจากเวลาแก้ไขไฟล์
function getVersion($filename) {
    if (file_exists($filename)) {
        return date("Ymd.His", filemtime($filename));
    }
    return '1.0.0'; // ค่าเริ่มต้นถ้าไม่พบไฟล์
}

// นำไปใช้ใน Footer
$current_version = getVersion(__FILE__); 
?>

<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
<footer class="main-footer" style="margin-left: 0; margin-right: 0; width: 100%;">
    <strong>Copyright &copy; 2026 THC Dashboard.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Powered <a href="https://www.facebook.com/fenziikung" target="_blank">By.Fz </a> Version</b>  <?php echo $current_version; ?> 
   
    </div>

    <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"></aside>
</footer>