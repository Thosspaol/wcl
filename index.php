<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลประกาศข่าวทั้งหมด
$sql_announcements = "SELECT * FROM announcements ORDER BY created_at DESC";
$result_announcements = $conn->query($sql_announcements);

// ดึงข้อมูลรับสมัครเรียนทั้งหมด
$sql_recruiting = "SELECT * FROM recruiting ORDER BY created_at DESC";
$result_recruiting = $conn->query($sql_recruiting);

$sql_manager = "SELECT * FROM manager WHERE role_people = 'ผู้อำนวยการโรงเรียนวัดช่องลมธรรมโชติ' LIMIT 1";
$result_manager = $conn->query($sql_manager);

// ตรวจสอบว่ามีข้อมูลผู้อำนวยการหรือไม่
if ($result_manager->num_rows == 0) {
    // หากไม่มีผู้อำนวยการ ให้ดึงข้อมูลรองผู้อำนวยการกลุ่มบริหารทั่วไป
    $sql_manager = "SELECT * FROM manager WHERE role_people = 'รองผู้อำนวยการกลุ่มบริหารทั่วไป' LIMIT 1";
    $result_manager = $conn->query($sql_manager);
}

$manager = $result_manager->fetch_assoc();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>โรงเรียนวัดช่องลมธรรมโชติ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/โลโก้วัดช่องลม.png" rel="icon">
  <link href="assets/img/โลโก้วัดช่องลม (1).png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .img-box-a img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .carousel-item-a.intro-item {
      height: 600px;
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
          <li class="nav-item"><a class="nav-link active" href="index.php">หน้าแรก</a></li>
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
          <li class="nav-item"><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
        </ul>
      </div>
      <div class="btn-group ml-auto">
        <a class="btn btn-success" href="login/form_login.php">เข้าสู่ระบบ</a>
      </div>
    </div>
  </nav><!-- End Header/Navbar -->

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel position-relative">
    <div class="swiper-wrapper">
      <?php if ($result_announcements->num_rows > 0) : ?>
        <?php while ($row = $result_announcements->fetch_assoc()) : ?>
          <div class="swiper-slide carousel-item-b intro-item bg-image" style="background-image: url('uploads/<?php echo $row['image']; ?>')">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="intro-body">
                        <p class="intro-title-top"><?php echo $row['title']; ?><br> <?php echo date('d F Y', strtotime($row['created_at'])); ?></p>
                        <h1 class="intro-title mb-4"><?php echo $row['message']; ?></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div><!-- End Intro Section -->

  <br>
  <main id="main">
    <section class="section-news section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">รับสมัครเรียน</h2>
              </div>
              <div class="title-link">
                <a href="blog-grid.html">เพิ่มเติม<span class="bi bi-chevron-right"></span></a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <?php if ($result_recruiting->num_rows > 0) : ?>
            <?php while ($row_show = $result_recruiting->fetch_assoc()) : ?>
              <div class="col-md-4 mb-4">
                <div class="card-box-a card-shadow">
                  <div class="img-box-a">
                    <img src="uploads/<?php echo htmlspecialchars($row_show["image"]); ?>" class="img-a img-fluid" alt="<?php echo htmlspecialchars($row_show["title"]); ?>">
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a class="category-b" style="color: black;"><?php echo htmlspecialchars($row_show["title"]); ?></a>
                        </h2>
                      </div>
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a class="link-a" style="color: white;"><?php echo ($row_show["message"]); ?> </a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <a href="recruiting.php?id=<?php echo $row_show['student_id']; ?>" class="link-a" style="color: white;">ดูเพิ่มเติม
                          <span class="bi bi-chevron-right"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <div class="col-md-12">
              <p>ไม่มีข้อมูล</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </main>


  <!-- ======= Agents Section ======= -->
  <section class="section-agents section-t8">
    <div class="container">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">ผู้อำนวยการโรงเรียนวัดช่องลมธรรมโชติ</h2>
          </div>
        </div>
      </div>

      <div class="row align-items-center">
        
            <div class="col-md-3">
              <div class="card-box-d">
                <div class="card-img-d">
                <img src="uploads/<?php echo $manager['image']; ?>" alt="" class="img-d img-fluid" style="width: 100%; height: 300px;">
                </div>
              </div>
            </div>
      </div><br>
      <div class="col-md-3 d-flex flex-column justify-content-start">
        <h2><?php echo $manager["pre"]; ?><?php echo $manager["first_name"]; ?> <?php echo $manager["last_name"]; ?></h2>
        <h6> <?php echo $manager['role_people']; ?></h6>
     
      </div>


  </section>


  <!-- ======= Latest News Section ======= -->
  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">กิจกรรมทางโรงเรียน</h2>
            </div>
            <div class="title-link">
              <a href="blog-grid.html">เพิ่มเติม
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="news-carousel" class="swiper">
        <div class="swiper-wrapper">

          <?php
          // รีเซ็ตการเรียกซ้ำฐานข้อมูล
          $result_announcements->data_seek(0);

          if ($result_announcements->num_rows > 0) {
            while ($row = $result_announcements->fetch_assoc()) {
              echo '<div class="swiper-slide carousel-item-b me-5">';
              echo '  <div class="card-box-a card-shadow">';
              echo '    <div class="img-box-a">';
              echo '      <img src="uploads/' . $row["image"] . '" class="img-a img-fluid" alt="' . $row["title"] . '">';
              echo '    </div>';
              echo '    <div class="card-overlay">';
              echo '      <div class="card-overlay-a-content">';
              echo '        <div class="card-header-a">';
              echo '          <h2 class="card-title-a">';
              echo '            <a   class="category-b" style="color: black;">' . $row["title"] . '</a>';
              echo '          </h2>';
              echo '        </div>';
              echo '          <div class="card-header-a">';
              echo '                   <h2 class="card-title-a>';
              echo '                     <a   class="link-a" style="color: white;">' . $row["message"] . '</a>';
              echo '             </h2>';
              echo '              </div>';
              echo '        <div class="card-body-a">';
              echo '          <a href="news.php?id=' . $row["id"] . ' class="link-a" style="color: white;">ดูเพิ่มเติม';
              echo '            <span class="bi bi-chevron-right"></span>';
              echo '          </a>';
              echo '        </div>';
              echo '      </div>';
              echo '    </div>';
              echo '  </div>';
              echo '</div><!-- End carousel item -->';
            }
          } else {
            echo '<p>ไม่มีประกาศข่าว</p>';
          }
          ?>
        </div>
      </div>

    </div>
  </section><!-- End carousel item --><!-- End Latest News Section -->

  <!-- ======= Testimonials Section ======= -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div id="testimonial-carousel" class="swiper">
      <div class="carousel-item-a swiper-slide">
        <div class="testimonials-box">
          <div class="row">
            <div class="col-md-6">

              <div class="testimonial-author-box">
                <img src="assets/img/โลโก้วัดช่องลม.png" alt="" class="testimonial-avatar">
                <h5 class="testimonial-author">โรงเรียนวัดช่องลม(ธรรมโชติ)</h5>
              </div><br>
              <div class="testimonials-content">
                <p>
                  ที่อยู่
                  <br>หมู่ที่ 6 บ้านลมทวน ตำบลบ้านปรก อำเภอเมืองสมุทรสงคราม จังหวัดสมุทรสงคราม 75000
                  <br>โทรศัพท์ 0 3471 8435
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="testimonial-img">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.872781295272!2d99.9813547!3d13.420200800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2d40de015592b%3A0x21473ef52c4a1f7!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4Lin4Lix4LiU4LiK4LmI4Lit4LiH4Lil4Lih!5e0!3m2!1sth!2sth!4v1698252319963!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End carousel item -->
    </div>
    <div class="testimonial-carousel-pagination carousel-pagination"></div>

    </div>
  </section>




  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    var swiper = new Swiper('.swiper', {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

</body>

</html>