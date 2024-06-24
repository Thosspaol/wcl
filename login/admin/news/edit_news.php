<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$id = $_GET["student_id"];
$sql = "SELECT * FROM recruiting WHERE student_id = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ปฏิทินกิจกรรม | wcl</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/senate.png">
    <link rel="manifest" href="../assets/img/favicons/senate.png">
    <link rel="mask-icon" href="../assets/img/favicons/senate.png" color="#5bbad5">
    <link rel="shortcut icon" href="../assets/img/favicons/senate.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../assets/img/favicons/senate.png">
    <meta name="theme-color" content="#ffffff">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mali">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include_once('../includes/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">กระดานประกาศข่าว</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">บุคลากร</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="line-height: 2.1 rem;">เพิ่มเนื้อหาที่จะแสดง</h3>
                                    <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class='fas fa-arrow-left'></i> กลับ</a>
                                </div>
                                <form action="update_news.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-row">
                                        <input type="hidden" name="student_id" value="<?php echo $row["student_id"];?>">
                                            <div class="form-group col-sm-6">
                                                <label for="title">หัวข้อ:</label>
                                                <input type="text" id="title" name="title" class="form-control" value="<?php echo $row["title"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label for="message">ข้อความ:</label>
                                            <textarea id="message" name="message" class="form-control" required><?php echo $row["message"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label for="link">ลิ้งค์:</label>
                                            <textarea id="link" name="link" class="form-control" required><?php echo $row["link"]; ?></textarea>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="image">รูปภาพ:</label><br>                                        
                                            <?php if($row["image"]) { ?>
                                                <img src="../../../uploads/<?php echo $row["image"]; ?>" alt="<?php echo $row["title"]; ?>" style="width: 100px; height: auto;" required>
                                            <?php } ?>
                                            <br><br><input type="file" id="image" name="image" class="form-control" accept="image/*">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">เพิ่มประกาศข่าว</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                CKEDITOR.replace('link');
            </script>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../assets/js/home.js"></script>
</body>

</html>
<!-- SCRIPTS -->

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/js/login.js"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../assets/js/pages/dashboard.js"></script>
