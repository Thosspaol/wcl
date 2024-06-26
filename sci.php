<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ฟังก์ชันสำหรับดึงข้อมูลผู้บริหารในกลุ่มสาระการเรียนรู้การงานอาชีพ
function getManager($conn, $role) {
    $sql = "SELECT * FROM person WHERE roles = '$role' ORDER BY FIELD(manager, 'หัวหน้ากลุ่ม', 'รองหัวหน้ากลุ่ม', 'กลุ่ม')";
    $result = $conn->query($sql);
    return $result;
}

$sciManagers = getManager($conn, 'sci');

$head = [];
$deputies = [];
$members = [];
while ($row = $sciManagers->fetch_assoc()) {
    if ($row['manager'] == 'หัวหน้ากลุ่ม') {
        $head[] = $row;
    } else if ($row['manager'] == 'รองหัวหน้ากลุ่ม') {
        $deputies[] = $row;
    } else if ($row['manager'] == 'กลุ่ม') {
        $members[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>กลุ่มสาระการเรียนรู้วิทยาศาสตร์</title>
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

  <style>
    .card-img-top {
      height: 250px;
      object-fit: cover;
    }
  </style>
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
              <a href="health.php" class="dropdown-item">สุขศึกษาและพละศึกษา</a>
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
              <h1 class="title-single">กลุ่มสาระการเรียนรู้</h1>
              <p>วิทยาศาสตร์และเทคโนโลยี</p>              
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <div class="container">
      <div class="row">
        <?php if (!empty($head)) { ?>
          <?php foreach ($head as $row) { ?>
            <div class="col-md-3 mb-4">
              <div class="card">
                <img src="uploads/<?php echo $row['images']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['pres'] . ' ' . $row['firsts'] . ' ' . $row['lasts']; ?></h5>
                  <p class="card-text"><?php echo $row['manager'];?>สาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี</p>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>

        <?php if (!empty($deputies)) { ?>
          <?php foreach ($deputies as $row) { ?>
            <div class="col-md-3 mb-4">
              <div class="card">
                <img src="uploads/<?php echo $row['images']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['pres'] . ' ' . $row['firsts'] . ' ' . $row['lasts']; ?></h5>
                  <p class="card-text"><?php echo $row['manager'];?>สาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี</p>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>

        <?php if (!empty($members)) { ?>
          <?php foreach ($members as $row) { ?>
            <div class="col-md-3 mb-4">
              <div class="card">
                <img src="uploads/<?php echo $row['images']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['pres'] . ' ' . $row['firsts'] . ' ' . $row['lasts']; ?></h5>
                  <p class="card-text"><?php echo $row['manager'];?>สาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี</p>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
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
