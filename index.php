<?php 
  include 'includes/header.php';
  include 'includes/navbar.php';
  include 'includes/sidebar.php';
  // Define page configuration
  $pages = [
      'income' => [
          'title' => 'รายงานรายละเอียดรายได้ (Estimated Income)',
          'file' => 'income.php'
      ],
      'ar' => [
          'title' => 'รายงานลูกหนี้ (Accounts Receivable)',
          'file' => 'ar.php'
      ],
      'eclaim_ofc' => [
          'title' => 'รายงานส่งเคลม (กรมบัญชีกลาง)',
          'file' => 'eclaim_ofc.php'
      ],
      'eclaim_lgo' => [
          'title' => 'รายงานส่งเคลม (ท้องถิ่น)',
          'file' => 'eclaim_lgo.php'
      ],
      'fsfund' => [
          'title' => 'รายงานกองทุนสุขภาพ',
          'file' => 'fsfund.php'
      ],
      'moph_claim_report' => [
          'title' => 'รายงานการเคลม สปสช. ส่ง สธ.',
          'file' => 'moph_claim_report.php'
      ],
      'thai_fm_annual' => [
          'title' => 'รายงานการเงินแพทย์แผนไทย.',
          'file' => 'thai_fm_annual.php'
      ],
      'sss_report_02991' => [
          'title' => 'รายงาน สสส. 02991',
          'file' => 'sss_report_02991.php'
      ],
      'car_act_report' => [
          'title' => 'รายงานตาม พ.ร.บ. คุ้มครองผู้ประสบภัยจากรถ',
          'file' => 'car_act_report.php'
      ],
      'pt_report' => [
          'title' => 'รายงานการเงินกายภาพบำบัด (PT Report)',
          'file' => 'pt_report.php'
      ],
      'overview' => [
          'title' => 'Dashboard ภาพรวมรายได้',
          'file' => 'overview.php'
      ]
  ];

  $page = isset($_GET['page']) ? $_GET['page'] : 'overview';
  $page = array_key_exists($page, $pages) ? $page : 'overview';
  
  $page_title = $pages[$page]['title'];
  $content_file = $pages[$page]['file'];
?>
<html>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
  
<div class="wrapper">
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $page_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <?php include $content_file; ?>
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

</body>
</html>
<?php include 'includes/scripts.php'; ?>  
