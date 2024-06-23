<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่าได้ส่ง id มาหรือไม่
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  
  // ดึงข้อมูลประกาศข่าวที่มี id ตรงกับที่ส่งมา
  $sql = "SELECT * FROM announcements WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  } else {
    echo "ไม่พบข้อมูล";
    exit;
  }
} else {
  echo "ไม่มี ID ที่กำหนด";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo htmlspecialchars($row["title"]); ?></title>
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
  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-box">
            <h2 class="title-a"><?php echo htmlspecialchars($row["title"]); ?></h2>
          </div>
          <div class="img-box-a">
            <img src="uploads/<?php echo htmlspecialchars($row["image"]); ?>" class="img-a img-fluid" alt="<?php echo htmlspecialchars($row["title"]); ?>">
          </div>
          <div class="content-box">
            <p><?php echo nl2br(htmlspecialchars($row["message"])); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
