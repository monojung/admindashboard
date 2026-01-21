<?php 
// ใช้ include_once เสมอสำหรับไฟล์ตั้งค่า
include_once 'includes/config.php';

// รับค่าหน้าปัจจุบัน
$current_page = $_GET['page'] ?? 'overview';

// รายการหน้าที่ต้องการให้ Dropdown กางออก
$link_pages = [
    'income', 'ar', 'eclaim_ofc', 'eclaim_lgo', 'fsfund', 
    'moph_claim_report', 'pt_report', 'thai_fm_annual', 
    'sss_report_02991', 'car_act_report', 'patient'
];

// เช็คสถานะการเปิดเมนู
$is_link_open = in_array($current_page, $link_pages);
?>



<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">THC Dashboard</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info"><a href="#" class="d-block">โรงพยาบาลทุ่งหัวช้าง</a></div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="?page=overview" class="nav-link <?php echo ($current_page == 'overview') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard หน้าหลัก</p>
          </a>
        </li>

        <li class="nav-item <?php echo $is_link_open ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?php echo $is_link_open ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-wallet text-success"></i>
            <p>
              จัดเก็บรายได้
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="?page=income" class="nav-link <?php echo ($current_page == 'income') ? 'active' : ''; ?>">
                <i class="fas fa-chart-pie nav-icon text-info"></i>
                <p>ประมาณการรายได้</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=ar" class="nav-link <?php echo ($current_page == 'ar') ? 'active' : ''; ?>">
                <i class="fas fa-file-invoice-dollar nav-icon text-warning"></i>
                <p>รายงานลูกหนี้</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=eclaim_ofc" class="nav-link <?php echo ($current_page == 'eclaim_ofc') ? 'active' : ''; ?>">
                <i class="fas fa-file-export nav-icon text-primary"></i>
                <p>เคลมสิทธิ OFC</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=eclaim_lgo" class="nav-link <?php echo ($current_page == 'eclaim_lgo') ? 'active' : ''; ?>">
                <i class="fas fa-file-export nav-icon text-info"></i>
                <p>เคลมสิทธิ LGO</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=fsfund" class="nav-link <?php echo ($current_page == 'fsfund') ? 'active' : ''; ?>">
                <i class="fas fa-coins nav-icon text-warning"></i>
                <p>ชดเชย FS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=moph_claim_report" class="nav-link <?php echo ($current_page == 'moph_claim_report') ? 'active' : ''; ?>">
                <i class="fas fa-hospital-user nav-icon text-primary"></i>
                <p>ชดเชย MOPH Claim</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=pt_report" class="nav-link <?php echo ($current_page == 'pt_report') ? 'active' : ''; ?>">
                <i class="fas fa-leaf nav-icon text-success"></i>
                <p>ชดเชยกายภาพบำบัด</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=thai_fm_annual" class="nav-link <?php echo ($current_page == 'thai_fm_annual') ? 'active' : ''; ?>">
                <i class="fas fa-leaf nav-icon text-success"></i>
                <p>ชดเชยแพทย์แผนไทย</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=sss_report_02991" class="nav-link <?php echo ($current_page == 'sss_report_02991') ? 'active' : ''; ?>">
                <i class="fas fa-user-shield nav-icon text-indigo"></i>
                <p>ชดเชย ปกส.ในจังหวัด</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=car_act_report" class="nav-link <?php echo ($current_page == 'car_act_report') ? 'active' : ''; ?>">
                <i class="fas fa-car-crash nav-icon text-danger"></i>
                <p>ชดเชย พรบ.รถ</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>

<div class="sidebar-footer" style="position: absolute; bottom: 0; width: 100%; padding: 10px; border-top: 1px solid #4b545c; font-size: 0.75rem; background: #343a40;">
    <div class="text-white text-center">
      <strong>© 2026 THC Dashboard</strong><br>
      <small>Powered By.<a href="https://www.facebook.com/fenziikung" target="_blank">Fz</a></small><br>
      <small>V.<?php echo APP_VERSION; ?></small> 
    </div>
  </div>
</aside>



