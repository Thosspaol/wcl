<?php
session_start();
$open_connect = 1;
require('../../connect.php');

$id = $_GET["id_account"];
$sql = "SELECT * FROM grades WHERE id_account = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขผู้ใช้งาน | senate</title>
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

    <style>
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .inner-table {
            width: 100%;
            border-collapse: collapse;
        }

        .inner-table th, .inner-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        /* Custom CSS for smaller input fields */
        .small-input {
            width: 80px;
            display: inline-block;
        }
    </style>
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
                                    <h3 class="card-title" style="line-height:2.1rem;">แก้ไขข้อมูล</h3>
                                    <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class='fas fa-arrow-left'></i> กลับ</a>
                                </div><br>
                                <form action="update_grades.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <input type="hidden" name="id_account" value="<?php echo $row["id_account"]; ?>">
                                            <div class="col-sm-3">
                                                <label for="pre">คำนำหน้า</label>
                                                <input type="text" id="pre" name="pre" value="<?php echo $row["pre"]; ?>" required class="form-control"  readonly><br>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="firstname">ชื่อ</label>
                                                <input type="text" id="firstname" class="form-control" name="firstname" value="<?php echo $row["firstname"];?>"  readonly>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="lastname">นามสกุล</label>
                                                <input type="text" id="lastname" class="form-control" name="lastname" value="<?php echo $row["lastname"];?>"  readonly>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="level">ชั้น</label>
                                                <input type="text" id="level" class="form-control" name="level" value="<?php echo $row["level"];?>"  readonly>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="subject_id">รหัสวิชา</label>
                                                <input type="text" id="subject_id" name="subject_id" required class="form-control" value="<?php echo $row["subject_id"];?>" readonly><br>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="teacher_name">ชื่ออาจารย์</label>
                                                <input type="text" id="teacher_name" name="teacher_name" required class="form-control" value="<?php echo $row["teacher_name"];?> "  readonly><br>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="semester_id">ภาคเรียน</label>
                                                <select  id ="semester_name" name="semester_id" class="form-select" >
                                                <?php
                                                    $semester_id = [
                                                        'ภาคเรียนที่1' => 'ภาคเรียนที่1',
                                                        'ภาคเรียนที่2' => 'ภาคเรียนที่2',                                                       
                                                    ];
                                                    foreach ($semester_id as $key => $value) {
                                                        $selected = ($row["semester_id"] === $key) ? 'selected' : '';
                                                        echo "<option value='$key' $selected>$value</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="academic_year">ปีการศึกษา</label>
                                                <input type="text" id="academic_year" name="academic_year" required class="form-control" value="<?php echo $row["academic_year"];?> "  readonly><br>
                                            </div>
                                            <div class="col-sm-4">
                                            <label for="score">คะแนน เก็บ</label>
                                            <input type="text" id="score" name="score" required class="form-control" value="<?php echo $row["score"];?> "><br>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="mitterm">คะแนน สอบกลางภาค</label>
                                            <input type="text" id="mitterm" name="mitterm" required class="form-control" value="<?php echo $row["mitterm"];?> "><br>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="final">คะแนน สอบปลายภาค</label>
                                            <input type="text" id="final" name="final" required class="form-control" value="<?php echo $row["final"];?> "><br>
                                        </div>
                                            <div class="col-sm-3">
                                                <input type="submit" value="แก้ไขคะแนน" class="btn btn-success">
                                            </div>
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

<!-- SCRIPTS -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/js/login.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../assets/js/pages/dashboard.js"></script>
