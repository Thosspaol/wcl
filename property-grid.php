<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ฟังก์ชันสำหรับดึงข้อมูลผู้บริหาร
function getManager($conn, $role) {
  $sql = "SELECT * FROM manager WHERE role_people = '$role' LIMIT 1";
  $result = $conn->query($sql);
  return $result->fetch_assoc();
}

// ดึงข้อมูลผู้บริหาร
$director = getManager($conn, 'ผู้อำนวยการโรงเรียนวัดช่องลมธรรมโชติ');
if (!$director) {
  $director = getManager($conn, 'รองผู้อำนวยการกลุ่มบริหารทั่วไป');
}

$academic = getManager($conn, 'รองผู้อำนวยการกลุ่มบริหารวิชาการ');
$finance = getManager($conn, 'รองผู้อำนวยการกลุ่มบริหารบุคคล การเงินและสินทรัพย์');
$studentAffairs = getManager($conn, 'รองผู้อำนวยการกลุ่มบริหารกิจการนักเรียน');
$quality = getManager($conn, 'ปฏิบัติหน้าที่รองผู้อำนวยการกลุ่มพัฒนาคุณภาพการศึกษา');
$general = getManager($conn, 'รองผู้อำนวยการกลุ่มบริหารทั่วไป');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>คณะผู้บริหาร</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/โลโก้วัดช่องลม.png" rel="icon">
  <link href="assets/img/โลโก้วัดช่องลม (1).png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php">โรงเรียนวัดช่องลมธรรมโชติ</a>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">หน้าแรก</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">รู้จักโรงเรียน</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="property-single.php">ประวัติโรงเรียน</a>
              <a class="dropdown-item" href="blog-single.php">วิสัยทัศน์/พันธกิจ</a>
              <a class="dropdown-item" href="property-grid.php">คณะผู้บริหาร</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">กลุ่มสาระการเรียนรู้</a>
            <div class="dropdown-menu">
              <a href="sci.php" class="dropdown-item">วิทยาศาสตร์และเทคโนโลยี</a>
              <a href="math.php" class="dropdown-item">คณิตศาสตร์</a>
              <a href="thai.php" class="dropdown-item">ภาษาไทย</a>
              <a href="society.php" class="dropdown-item">สังคมศึกษา ศาสนาและวัฒนธรรม</a>
              <a href="eng.php" class="dropdown-item">ภาษาต่างประเทศ</a>
              <a href="art.php" class="dropdown-item">ศิลปะ</a>
              <a href="health.php" class="dropdown-item">สุขศึกษาและพลศึกษา</a>
              <a href="career.php" class="dropdown-item">การงานอาชีพ</a>
              <a href="activity.php" class="dropdown-item">กิจกรรมพัฒนาผู้เรียน</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">ติดต่อเรา</a>
          </li>
        </ul>
      </div>
      <div class="btn-group ml-auto">
        <a class="btn btn-success" href="login/form_login.php">เข้าสู่ระบบ</a>
      </div>
    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">คณะผู้บริหาร</h1>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <table border="0" cellpadding="4" cellspacing="1" style="margin-left: auto; margin-right: auto;" width="450">
      <tbody>
        <tr>
          <td>
            <div>
              <?php if ($director): ?>
              <div style="text-align: center;">
                <img src="uploads/<?php echo $director['image']; ?>" style="width: 170px; height: 216px;" /><br />
                <br />
                <strong><?php echo $director['pre'] . ' ' . $director['first_name'] . ' ' . $director['last_name']; ?></strong><br />
                <p><?php echo $director['role_people']; ?></p>
              </div>
              <?php endif; ?>
              <div style="text-align: center;">
                &nbsp;</div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <div>
      <table border="0" cellpadding="1" cellspacing="1" width="100%">
        <tbody>
          <tr style="text-align: center;">
            <td style="vertical-align: bottom;">
              <div>&nbsp;</div>
              <?php if ($academic): ?>
              <div><img src="uploads/<?php echo $academic['image']; ?>" style="width: 160px; height: 216px;" /></div>
              <div>&nbsp;</div>
              <div><strong><?php echo $academic['pre'] . ' ' . $academic['first_name'] . ' ' . $academic['last_name']; ?></strong></div>
              <div><?php echo $academic['role_people']; ?></div>
              <div>&nbsp;</div>
              <?php endif; ?>
            </td>
            <td style="vertical-align: bottom;">
              <?php if ($finance): ?>
              <div><img src="uploads/<?php echo $finance['image']; ?>" style="width: 160px; height: 216px;" /></div>
              <div>&nbsp;</div>
              <div><strong><?php echo $finance['pre'] . ' ' . $finance['first_name'] . ' ' . $finance['last_name']; ?></strong></div>
              <div><?php echo $finance['role_people']; ?></div>
              <div>&nbsp;</div>
              <?php endif; ?>
            </td>
          </tr>
          <tr style="text-align: center;">
            <td style="vertical-align: bottom;">
              <?php if ($general): ?>
              <p><img src="uploads/<?php echo $general['image']; ?>" style="width: 160px; height: 216px;" /></p>
              <p><b><?php echo $general['pre'] . ' ' . $general['first_name'] . ' ' . $general['last_name']; ?></b><br />
                <?php echo $general['role_people']; ?></p>
              <?php endif; ?>
            </td>
            <td style="text-align: center; vertical-align: bottom; width: 50%;">
              <?php if ($studentAffairs): ?>
              <div><img src="uploads/<?php echo $studentAffairs['image']; ?>" style="width: 160px; height: 216px;" /></div>
              <div>&nbsp;</div>
              <div><b><?php echo $studentAffairs['pre'] . ' ' . $studentAffairs['first_name'] . ' ' . $studentAffairs['last_name']; ?></b><br />
                <?php echo $studentAffairs['role_people']; ?></div>
              <div>&nbsp;</div>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="vertical-align: bottom;">
              <?php if ($quality): ?>
              <div style="text-align: center;">&nbsp;</div>
              <div style="text-align: center;"><img src="uploads/<?php echo $quality['image']; ?>" style="width: 160px; height: 216px;" /></div>
              <div style="text-align: center;">&nbsp;</div>
              <div style="text-align: center;"><strong><?php echo $quality['pre'] . ' ' . $quality['first_name'] . ' ' . $quality['last_name']; ?></strong><br />
                <?php echo $quality['role_people']; ?></div>
              <?php endif; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    </div><!-- End Property Grid Single-->
  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
