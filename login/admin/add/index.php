<?php
session_start();
$open_connect = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มบุคลากร | Senate</title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/senate.png">
    <link rel="manifest" href="../assets/img/favicons/senate.png">
    <link rel="mask-icon" href="../assets/img/favicons/senate.png" color="#5bbad5">
    <link rel="shortcut icon" href="../assets/img/favicons/senate.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../assets/img/favicons/senate.png">
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

        <?php include_once('../includes/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">เพิ่มบุคลากรเจ้าหน้าที่</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">เจ้าหน้าที่</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="content-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="line-height:2.1rem;">กรอกข้อมูล</h3>
                                <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> กลับ</a>
                            </div>
                            <form action="process_admin.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="pre">คำนำหน้า <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="pre" class="form-control" placeholder="คำนำหน้า" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="firstname">ชื่อ <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="firstname" class="form-control" placeholder="ชื่อ" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="lastname">นามสกุล <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="lastname" class="form-control" placeholder="นามสกุล" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="birthday">วัน/เดือน/ปีเกิด <font style="color: red; margin-left: 1px">* ตัวอย่างเช่น 07072544 *</font></label>
                                            <input type="text" name="birthday" class="form-control" placeholder="วัน/เดือน/ปีเกิด" required pattern="[0-9]{8}" title="ใส่วันเดือนปีเกิดให้ครบ 8 หลัก">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="id_card">เลขบัตรประชาชน<font style="color: red; margin-left: 1px">* ถ้าไม่มี 00000 13 หลัก *</font></label>
                                            <input type="text" name="id_card" class="form-control" placeholder="เลขบัตรประชาชน" required pattern="[0-9]{13}" title="ใส่เลขบัตรประชาชนให้ครบ 13 หลัก">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="role_account">สถานะ <font style="color: red; margin-left: 1px">*</font></label>
                                            <select name="role_account" id="status" class="form-select" required>
                                                <option value disabled selected>สถานะผู้ใช้</option>
                                                <option value="person">บุคคลากร</option>
                                                <option value="admin">เจ้าหน้าที่</option>
                                                <option value="student">นักเรียน</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="level">ระดับชั้น <font style="color: red; margin-left: 1px">*</font></label>
                                            <select name="level" id="level" class="form-select" required>
                                                <option value disabled selected>ระดับชั้น</option>
                                                <option value="ป.1">ป.1</option>
                                                <option value="ป.2">ป.2</option>
                                                <option value="ป.3">ป.3</option>
                                                <option value="ป.4">ป.4</option>
                                                <option value="ป.5">ป.5</option>
                                                <option value="ป.6">ป.6</option>
                                                <option value="บุคลากร">บุคลากร</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="subject">ตำแหน่ง <font style="color: red; margin-left: 1px">*</font></label>
                                            <select name="subject" id="subject" class="form-select" required>
                                                <option value disabled selected>กลุ่มสาระการเรียนรู้</option>
                                                <option value="การงานอาชีพ">การงานอาชีพ</option>
                                                <option value="คณิตศาสตร์">คณิตศาสตร์</option>
                                                <option value="คณิตศาสตร์เพิ่มเติม">คณิตศาสตร์เพิ่มเติม</option>
                                                <option value="ดนตรี">ดนตรี</option>
                                                <option value="ประวัติศาสตร์">ประวัติศาสตร์</option>
                                                <option value="พละศึกษา">พละศึกษา</option>
                                                <option value="เกษตร">เกษตร</option>
                                                <option value="เทคโนโลยี">เทคโนโลยี</option>
                                                <option value="ภาษาอังกฤษ">ภาษาอังกฤษ</option>
                                                <option value="ภาษาไทย">ภาษาไทย</option>
                                                <option value="วิทยาศาสตร์">วิทยาศาสตร์</option>
                                                <option value="ศิลปะ">ศิลปะ</option>
                                                <option value="สังคมศึกษา">สังคมศึกษา</option>
                                                <option value="สุขศึกษา">สุขศึกษา</option>
                                                <option value="หน้าที่พลเมือง">หน้าที่พลเมือง</option>
                                                <option value="อื่นๆ">อื่นๆ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="password_account">รหัสผ่าน <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="password" name="password_account1" class="form-control" placeholder="รหัสผ่าน" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="password_account2">ยืนยันรหัสผ่าน <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="password" name="password_account2" class="form-control" placeholder="ยืนยันรหัสผ่าน" required>
                                        </div>
                                        <button class= "btn btn-success btn-block" type="submit"><i class='fas fa-save'></i> บันทึกข้อมูล</button></div>
                                           
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="../assets/js/login.js"></script>