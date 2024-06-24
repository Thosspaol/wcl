<?php

$conn = new mysqli('localhost', 'root', '', 'wcl');
// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// เชื่อมต่อกับฐานข้อมูล

// ตรวจสอบว่ามีการส่งค่า ID มาหรือไม่
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // ดึงข้อมูลจากฐานข้อมูลโดยใช้ ID ที่ส่งมา
    $query = "SELECT * FROM recruiting WHERE student_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "ไม่พบข้อมูล";
        exit();
    }
} else {
    echo "ไม่มีการระบุ ID";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>โรงเรียนวัดช่องลมธรรมโชติ</title>
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
    .img-box-a img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .category-b {
      font-size: 0.9rem;
      background-color: #2eca6a;
      padding: 0.3rem 0.7rem;
      color: black;
      letter-spacing: 0.03em;
      border-radius: 50px;
      text-decoration: none;
    }
  </style>
</head>

<body>
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
              <a class="dropdown-item " href="property-single.php">ประวัติโรงเรียน</a>
              <a class="dropdown-item " href="blog-single.php">วิสัยทัศน์/พันธกิจ</a>
              <a class="dropdown-item " href="property-grid.php">คณะผู้บริหาร</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dorupdown" aria-haspopup="true" aria-expanded="false">กลุ่มสาระการเรียนรู้</a>
            <div class="dropdown-menu">
              <a href="sci.php" class="dropdown-item">วิทยาศาสตร์และเทคโนโลยี</a>
              <a href="#" class="dropdown-item">คณิตศาสตร์</a>
              <a href="#" class="dropdown-item">ภาษาไทย</a>
              <a href="#" class="dropdown-item">สังคมศึกษา ศาสนาและวัฒนธรรม</a>
              <a href="#" class="dropdown-item">ภาษาต่างประเทศ</a>
              <a href="#" class="dropdown-item">ศิลปะ</a>
              <a href="#" class="dropdown-item">สุขศึกษาและพละศึกษา</a>
              <a href="#" class="dropdown-item">การงานอาชีพ</a>
              <a href="#" class="dropdown-item">กิจกรรมพัฒนาผู้เรียน</a>
            </div>
          </li>

          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">นักเรียน</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="timetable2022_subgroups_days_vertical.html">ตารางสอน</a>
              <a class="dropdown-item " href="blog-single.html">ตารางสอบ</a>
            </div>
          </li> -->
          <li class="nav-item">
            <a class="nav-link " href="contact.php">ติดต่อเรา</a>
          </li>
        </ul>
      </div>
      <div class="btn-group ml-auto">
        <a class="btn btn-success" href="login/form_login.php">เข้าสู่ระบบ</a>
      </div>
      <!-- <button class="iteam ">
            <a class="nav-link " href="contact.html">เข้าสู่ระบบ</a>
          </button> -->
    </div>

    </div>
  </nav>

  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">รับสมัครนักเรียนโรงเรียนวัดช่องลมธรรมโชติ</h1>
          </div>          
        </div>
      </div>
    </div>
  </section>

  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div id="property-single-carousel" class="swiper">
            <div class="carousel-item-b swiper-slide">
              <img src="uploads/<?php echo htmlspecialchars($row["image"]); ?>" class="img-a img-fluid" alt="<?php echo htmlspecialchars($row["title"]); ?>">
            </div>
          </div>
          <div class="property-single-carousel-pagination carousel-pagination"></div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">

          <div class="row justify-content-between">
            <div class="center">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                </div>
              </div>
              <div class="property-summary">
                <div class="center">
                  <div class="row">
                    <div class="center">
                      <div class="title-box-d">
                        <br><br><br>
                        <h3 class="title-d">รับสมัครนักเรียนใหม่</h3>
                      </div>
                    </div>
                  </div>
                  <div class="property-description">
                  <p class="description color-text-a">
                  <?php echo htmlspecialchars ($row["message"]); ?>
                      </p>
                  </div>
                  <div class="property-description">
                  <p class="description color-text-a">
                  <?php echo ($row["link"]); ?>
                      </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>