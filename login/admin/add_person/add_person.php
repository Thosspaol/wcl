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
                            <h5 class="m-0 text-dark">เพิ่มผู้บริหาร</h5>
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
                            <form action="process_people.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="pres">คำนำหน้า <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="pres" class="form-control" placeholder="คำนำหน้า" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="firsts">ชื่อ <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="firsts" class="form-control" placeholder="ชื่อ" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="lasts">นามสกุล <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="lasts" class="form-control" placeholder="นามสกุล" required>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-sm-4">
                                            <label for="roles">กลุ่มสาระการเรียนรู้ <font style="color: red; margin-left: 1px">*</font></label>
                                            <select name="roles" id="status" class="form-select" required>
                                                <option value disabled selected>เลือกกลุ่มสาระการเรียนรู้</option>
                                                <option value="sci">วิทยาศาสตร์และเทคโนโลยี</option>
                                                <option value="math">คณิตศาสตร์</option>
                                                <option value="thai">ภาษาไทย</option>
                                                <option value="society">สังคมศึกษาและวัฒนธรรมศึกษา</option>
                                                <option value="eng">ภาษาต่างประเทศ</option>
                                                <option value="art">ศิลปะ</option>
                                                <option value="health">สุขศึกษาและพละศึกษา</option>
                                                <option value="career">การงานอาชีพ</option>
                                                <option value="activity">กิจกรรมพัฒนาผู้เรียน</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="manager">ตำแหน่ง <font style="color: red; margin-left: 1px ">*</font></label>
                                            <select name="manager" id="status" class="form-select">
                                                <option value disabled selected>เหลือกตำแหน่ง</option>
                                                <option value="หัวหน้ากลุ่ม">หัวหน้ากลุ่มสาระ</option>
                                                <option value="รองหัวหน้ากลุ่ม">รองหัวหน้ากลุ่มสาระ</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="images">รูปภาพ <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="file" id="images" name="images" class="form-control" accept="image/*" required>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-success btn-block" type="submit"><i class='fas fa-save'></i> บันทึกข้อมูล</button>
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