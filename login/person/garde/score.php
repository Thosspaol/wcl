<?php
session_start();
$open_connect = 1;
require('../../connect.php');

$id = $_GET["id_account"];
$subject = $_SESSION["id_account"];  // เพิ่มการรับค่า subject จาก GET

// ตรวจสอบการเชื่อมต่อ
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// ดึงข้อมูลจากตาราง semesters
$sql = "SELECT * FROM semesters WHERE id_account = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

// ดึงข้อมูลจากตาราง account โดยใช้ค่า subject
$sql_show = "SELECT * FROM account WHERE id_account = '$subject'";
$result_show = mysqli_query($connect, $sql_show);
$row_show = mysqli_fetch_assoc($result_show);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกคะแนน | senate</title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicons/senate.png">
    <link rel="manifest" href="../../assets/img/favicons/senate.png">
    <link rel="mask-icon" href="../../assets/img/favicons/senate.png" color="#5bbad5">
    <link rel="shortcut icon" href="../../assets/img/favicons/senate.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../../assets/img/favicons/senate.png">
    <meta name="theme-color" content="#ffffff">

    <!-- stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mali">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../includes/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="content-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">แก้ไขผู้ใช้งานในระบบ</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">ผู้ใช้งาน</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="line-height:2.1 rem;">แก้ไขข้อมูล</h3>
                                    <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class='fas fa-arrow-left'></i> กลับ</a>
                                </div><br>
                                <form action="score_student.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <input type="hidden" name="id_account" value="<?php echo $row["id_account"]; ?>">
                                            <div class="col-sm-3">
                                                <label for="pre">คำนำหน้า</label>
                                                <input type="text" id="pre" name="pre" value="<?php echo $row["pre"]; ?>" required class="form-control"><br>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="firstname">ชื่อ</label>
                                                <input type="text" id="firstname" class="form-control" name="firstname" value="<?php echo $row["firstname"]; ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="lastname">นามสกุล</label>
                                                <input type="text" id="lastname" class="form-control" name="lastname" value="<?php echo $row["lastname"]; ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="level">ชั้น</label>
                                                <input type="text" id="level" class="form-control" name="level" value="<?php echo $row["level"]; ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="subject_id">รหัสวิชา</label>
                                                <input type="text" id="subject_id" name="subject_id" required class="form-control" value="<?php echo $row_show["subject"]; ?>"><br>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="teacher_name">ชื่ออาจารย์</label>
                                                <input type="text" id="teacher_name" name="teacher_name" required class="form-control" value="<?php echo $row_show["pre"]; ?> <?php echo $row_show["firstname"]; ?> <?php echo $row_show["lastname"]; ?>"><br>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="semester_id">ภาคเรียน</label>
                                                <input type="text" id="semester_name" name="semester_id" class="form-control" value="<?php echo $row["semester_name"]; ?>" readonly>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="academic_year">ปีการศึกษา</label>
                                                <input type="text" id="academic_year" class="form-control" name="academic_year" value="<?php echo $row["academic_year"]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4">
                                                <label for="score">คะแนน เก็บ</label>
                                                <input type="text" id="score" name="score" required class="form-control"><br>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="mitterm">คะแนน สอบกลางภาค</label>
                                                <input type="text" id="mitterm" name="mitterm" required class="form-control"><br>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="final">คะแนน สอบปลายภาค</label>
                                                <input type="text" id="final" name="final" required class="form-control"><br>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="submit" value="เพิ่มคะแนน" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>