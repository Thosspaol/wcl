<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>โรงเรียนวัดช่องลมธรรมโชติ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/โลโก้วัดช่องลม.png" rel="icon">
  <link href="../assets/img/โลโก้วัดช่องลม (1).png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>
<body>
    <h1>กระดานประกาศข่าว</h1>
    
    <!-- ฟอร์มเพิ่มประกาศข่าว -->
    <form action="submit.php" method="POST" enctype="multipart/form-data">
        <label for="title">หัวข้อ:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="message">ข้อความ:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <label for="image">รูปภาพ:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <br>
        <button type="submit">เพิ่มประกาศข่าว</button>
    </form>

    <h2>ประกาศข่าวทั้งหมด</h2>
    <?php
    // เชื่อมต่อฐานข้อมูล
    $conn = new mysqli('localhost', 'root', '', 'wcl');

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // ดึงข้อมูลประกาศข่าวทั้งหมด
    $sql = "SELECT * FROM announcements ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='carousel-item-c swiper-slide'>";
            echo " <div class='card-box-b card-shadow news-box>";
            echo "<div class='img-box-b'>";
            if (!empty($row["image"])) {
                echo "<img src='uploads/" . $row["image"] . "'class='img-a img-fluid' width='960' height='665'><br>";
            }
            echo "</div>";
            echo " <div class='card-overlay'>";
            echo "<div class='card-header-b'>";
            echo "<div class='card-category-b'>";
            echo "<h3 class='card-title-a'>" . $row["title"] . "</h3>";
            echo "<div class='card-body-a'>";
            echo "<p จำ>" . $row["message"] ."<span class='bi bi-chevron-right'></span>" . "</p>";
            echo "<small>Posted on: " . $row["created_at"] . "</small>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div><hr>";
        }
    } else {
        echo "ยังไม่มีประกาศข่าว";
    }

    $conn->close();
    ?>
     <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>
