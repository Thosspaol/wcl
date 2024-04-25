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

  <!-- =======================================================
  * Template Name: EstateAgency
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  .item {
    background-color: #007bff; /* สีพื้นหลังของปุ่ม */
    border: none; /* ลบเส้นขอบ */
    border-radius: 5px; /* กำหนดรูปร่างขอบ */
    padding: 10px 20px; /* ขนาดของแนวคำของปุ่ม */
    cursor: pointer; /* เปลี่ยนรูปแบบเคอร์เซอร์เป็นมือ */
  }

  .item a {
    text-decoration: none; /* ลบขีดเส้นใต้ข้อความลิงก์ */
    color: #fff; /* สีข้อความลิงก์ */
  }

  .item:hover {
    background-color: #0056b3; /* สีพื้นหลังเมื่อเมาส์ผ่านไป */
  }
  .login-box form .bt {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      color: black;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: .5s;
      margin-top: 40px;
      letter-spacing: 4px;
      margin-left: 173px;
    }

    .login-box .bt:hover {
      background: #DAA520;
      color: black;
      border-radius: 5px;
      box-shadow: 0 0 5px #FF4500,
    }
    .login-box .bt span {
      position: absolute;
      display: block;
    }
</style>
  
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php">โรงเรียน<span class="color-b">วัดช่องลมธรรมโชติ</span></a>

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
              <a class="dropdown-item " href="agents-grid.html">อัตลักษณ์ประจำโรงเรียน</a>
              <a class="dropdown-item " href="agent-single.html">เพลงประจำโรงเรียน</a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="property-grid.php">ผู้บริหารและบุคลากร</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">นักเรียน</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="timetable2022_subgroups_days_vertical.html">ตารางสอน</a>
              <a class="dropdown-item " href="blog-single.html">ตารางสอบ</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="contact.php">ติดต่อเรา</a>
          </li>
        </ul>
      </div>
      <div class="btn-group ml-auto">
  <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
    <i class="bi bi-search"></i>
  </button>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="bt" href="login.php">เข้าสู่ระบบ</a>
</div>
      <!-- <button class="iteam ">
            <a class="nav-link " href="contact.html">เข้าสู่ระบบ</a>
          </button> -->
</div>

    </div>
  </nav><!-- End Header/Navbar -->

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">

      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/รูปกิจกรรม-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"> โรงเรียนวัดช่องลม(ธรรมโชติ)
                      <br> 7 เมษายน 2021
                    </p>
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b">(Day camp) </span>
                      <br> กิจกรรมเข้าค่ายและเดินทางไกลลูกเสือสำรอง 
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">ดูเพิ่มเติม</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/รูปกิจกรรม-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">ห้องนิทรรศการต่างๆภายในห้องสมุดประชาชน"เฉลิมราชกุมารี"อ.เมืองจ.สมุทรสงคราม
                      <br> 21 กุมภาพันธ์ 2022
                    </p>
                    <h1 class="intro-title mb-4">
                        กิจกรรมศึกษาเรียนรู้เกี่ยวกับเมืองแม่กลอง
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">ดูเพิ่มเติม</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/รูปกิจกรรม-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">โรงเรียนวัดช่องลม(ธรรมโชติ)
                      <br> 31 มีนาคม 2564
                    </p>
                    <h1 class="intro-title mb-4">
                      กิจกรรมส่งเสริมการบริโภคผักและผลไม้ตามโครงการสร้างเสริมสุขภาพขนาดเล็ก ปี 2563
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">ดูเพิ่มเติม</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

  <main id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">ข่าวรับสมัคร</h2>
              </div>
              <div class="title-link">
                <a href="property-grid.html">ดูทั้งหมด
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="property-carousel" class="swiper">
          <div class="swiper-wrapper">
            <div class="carousel-item-b me-5">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="assets/img/รับสมัคร-1.jpg" alt="" class="img-a img-fluid" width="960" height="665">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="property-single.html">ข่าวรับสมัคร ประจำปี 2565</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <a href="#" class="link-a">ดูเพิ่มเติม
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-b">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="assets/img/รับสมัคร-2.jpg" alt="" class="img-a img-fluid" width="960" height="665">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="property-single.html">ข่าวรับสมัคร ประจำปี 2564</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <a href="property-single.html" class="link-a">ดูเพิ่มเติม
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
    </section> 
            <!-- End carousel item -->

          </div>
        </div>
        <!-- <div class="propery-carousel-pagination carousel-pagination"></div> -->

      </div>

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">ผู้บริหารและบุคลากร</h2>
              </div>
              <div class="title-link">
                <a href="agents-grid.html">เพิ่มเติม
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="assets/img/ผู้อำนวยการ.jpg" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a>นายรัฐวัฒน์ ปรียานนท์</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    ผู้อำนวยการ โรงเรียนวัดช่องลมธรรมโชติ สังกัด สพป.สมุทรสงคราม ข้าราชการครูชำนาญการพิเศษ
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> 	087 079 0093
                    </p>
                    <p>
                      <strong>Email: </strong> supanida999@gmail.com
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="assets/img/ครูวิทย์.jpg" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a >นางสุดารัตน์ วรวลัญช์</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                   ครูวิทยาศาสตร์และเทคโนโลยี สังกัด สพป.สมุทรสงคราม ข้าราชการครู
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong>+66 000 0000
                    </p>
                    <p>
                      <strong>Email: </strong> ...@gmail.com
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="assets/img/ครูการงานอาชีพ.jpg" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a >นางสาวปุณณดา เล็กสราวุธ</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    ครูการงานอาชีพ สังกัด สพป.สมุทรสงคราม ข้าราชการครูชำนาญการพิเศษ
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +66 000 0000
                    </p>
                    <p>
                      <strong>Email: </strong>...@example.com
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Agents Section -->

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

            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="assets/img/กิจกรรม-1.jpg" alt="" class="img-b img-fluid" width="500" height="500">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">โรงเรียน</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="blog-single.html">กิจกรรมนิเทศการจัดการเรียนการสอน
                          <br>ภาคเรียนที่ ๑ ปีการศึกษา ๒๕๖๖</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">22 ส.ค. 2566</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="assets/img/กิจกรรม-2.jpg" alt="" class="img-b img-fluid" width="500" height="500">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">พระอุโบสถวัดช่องลม</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="blog-single.html">กิจกรรมแห่เทียนพรรษาและกิจกรรมเนื่องในวันอาสาฬหบูชา
                          <br> ประจำปี ๒๕๖๖</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">22 ก.ค. 2566</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="assets/img/กิจกรรม-3.jpg" alt="" class="img-b img-fluid" width="500" height="500">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">โรงเรียน</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="blog-single.html">ภาพกิจกรรมวันภาษาไทยแห่งชาติ
                          <br> ประจำปี ๒๕๖๖</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">26 ก.ค. 2566</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="assets/img/กิจกรรม-4.jpg" alt="" class="img-b img-fluid" width="500" height="500">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">โรงเรียน</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="#">กิจกรรมเลือกตั้งประธานนักเรียน
                          <br>ปีการศึกษา ๒๕๖๖</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">15 มิ.ย. 2566</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

          </div>
        </div>

        <div class="news-carousel-pagination carousel-pagination"></div>
      </div>
    </section><!-- End Latest News Section -->

    <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 nav-arrow-a">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">ที่อยู่</h2>
              </div>
            </div>
          </div>
        </div>

        <div id="testimonial-carousel" class="swiper">
            <div class="carousel-item-a swiper-slide">
              <div class="testimonials-box">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-img">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.872781295272!2d99.9813547!3d13.420200800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2d40de015592b%3A0x21473ef52c4a1f7!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4Lin4Lix4LiU4LiK4LmI4Lit4LiH4Lil4Lih!5e0!3m2!1sth!2sth!4v1698252319963!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                       ที่อยู่
                       <br>หมู่ที่ 6 บ้านลมทวน ตำบลบ้านปรก อำเภอเมืองสมุทรสงคราม จังหวัดสมุทรสงคราม 75000
                       <br>โทรศัพท์ 0 3471 8435
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="assets/img/โลโก้วัดช่องลม.png" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">โรงเรียนวัดช่องลม(ธรรมโชติ)</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->   
        </div>
        <div class="testimonial-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">EstateAgency</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> contact@example.com
                </li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +54 356 945234
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">The Company</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Site Map</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Legal</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Agent Admin</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Careers</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Affiliate</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">International sites</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Venezuela</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">China</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Hong Kong</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Argentina</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Singapore</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Philippines</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

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
