<?php
session_start();
$open_connect = 1;
require('../../connect.php');

// ป้องกัน SQL Injection โดยการใช้ prepared statements
$id = $_GET["id_account"];
$stmt = $connect->prepare("SELECT * FROM account WHERE id_account = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
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
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <?php include('../includes/sidebar.php')?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
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
                            <form action="update_manager.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-row">
                                        <input type="hidden" name="id_account" value="<?php echo $row["id_account"];?>">
                                        <div class="form-group col-sm-4">
                                            <label for="pre">คำนำหน้า</label>
                                            <input type="text" name="pre" class="form-control" value="<?php echo $row["pre"];?>" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="firstname">ชื่อ</label>
                                            <input type="text" name="firstname" class="form-control" value="<?php echo $row["firstname"];?>" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="lastname">นามสกุล</label>
                                            <input type="text" name="lastname" class="form-control" value="<?php echo $row["lastname"];?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="birthday">วัน/เดือน/ปีเกิด</label>
                                            <input type="text" name="birthday" class="form-control" value="<?php echo $row["birthday"];?>" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="status">สถานะ</label>
                                            <select name="role_account" class="form-select">
                                                <option value="person" <?php if ($row["role_account"] === 'person') echo 'selected'; ?>>person</option>
                                                <option value="admin" <?php if ($row["role_account"] === 'admin') echo 'selected'; ?>>admin</option>
                                                <option value="student" <?php if ($row["role_account"] === 'student') echo 'selected'; ?>>student</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="id_card">เลขบัตรประชาชน</label>
                                            <input type="text" name="id_card" class="form-control" value="<?php echo $row["id_card"];?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="image_account">รูปถ่าย</label>
                                            <input type="text" name="images_account" class="form-control" value="<?php echo $row["images_account"];?>" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="level">ระดับชั้น</label>
                                            <select name="level" id="level" class="form-select" required>
                                                <?php
                                                $level = [
                                                    'ป.1' => 'ป.1',
                                                    'ป.2' => 'ป.2',
                                                    'ป.3' => 'ป.3',
                                                    'ป.4' => 'ป.4',
                                                    'ป.5' => 'ป.5',
                                                    'ป.6' => 'ป.6',
                                                    'บุคลากร' => 'บุคลากร',
                                                ];
                                                foreach ($level as $key => $value) {
                                                    $selected = ($row["level"] === $key) ? 'selected' : '';
                                                    echo "<option value='$key' $selected>$value</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="subject">ตำแหน่ง</label>
                                            <select name="subject" id="subject" class="form-select" required>
                                                <?php
                                                $subject = [
                                                    'การงานอาชีพ' => 'การงานอาชีพ',
                                                    'คณิตศาสตร์' => 'คณิตศาสตร์',
                                                    'คณิตศาสตร์เพิ่มเติม' => 'คณิตศาสตร์เพิ่มเติม',
                                                    'ดนตรี' => 'ดนตรี',
                                                    'ประวัติศาสตร์' => 'ประวัติศาสตร์',
                                                    'พละศึกษา' => 'พละศึกษา',
                                                    'ภาษาอังกฤษ' => 'ภาษาอังกฤษ',
                                                    'ภาษาไทย' => 'ภาษาไทย',
                                                    'วิทยาศาสตร์' => 'วิทยาศาสตร์',
                                                    'ศิลปะ' => 'ศิลปะ',
                                                    'สังคมศึกษา' => 'สังคมศึกษา',
                                                    'สุขศึกษา' => 'สุขศึกษา',
                                                    'หน้าที่พลเมือง' => 'หน้าที่พลเมือง',
                                                    'เกษตร' => 'เกษตร',
                                                    'เทคโนโลยี' => 'เทคโนโลยี',
                                                    'อื่นๆ' => 'อื่นๆ',
                                                ];
                                                foreach ($subject as $key => $value) {
                                                    $selected = ($row["subject"] === $key) ? 'selected' : '';
                                                    echo "<option value='$key' $selected>$value</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block"><i class='fas fa-save'></i> บันทึกข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/js/login.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../assets/js/pages/dashboard.js"></script>
</body>
</html>
