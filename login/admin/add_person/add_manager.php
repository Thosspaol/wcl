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
                            <form action="process_manager.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="pre">คำนำหน้า <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="pre" class="form-control" placeholder="คำนำหน้า" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="first_name">ชื่อ <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="first_name" class="form-control" placeholder="ชื่อ" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="last_name">นามสกุล <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="last_name" class="form-control" placeholder="นามสกุล" required>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label for="role_people">ตำแหน่ง <font style="color: red; margin-left: 1px">*</font></label>
                                            <select name="role_people" id="status" class="form-select" required>
                                                <option value disabled selected>ตำแหน่ง</option>
                                                <option value="ผู้อำนวยการโรงเรียนวัดช่องลมธรรมโชติ">ผู้อำนวยการโรงเรียนวัดช่องลมธรรมโชติ</option>
                                                <option value="รองผู้อำนวยการกลุ่มบริหารวิชาการ">รองผู้อำนวยการกลุ่มบริหารวิชาการ</option>
                                                <option value="รองผู้อำนวยการกลุ่มบริหารบุคคล การเงินและสินทรัพย์">รองผู้อำนวยการกลุ่มบริหารบุคคล การเงินและสินทรัพย์</option>
                                                <option value="รองผู้อำนวยการกลุ่มบริหารทั่วไป">รองผู้อำนวยการกลุ่มบริหารทั่วไป</option>
                                                <option value="รองผู้อำนวยการกลุ่มบริหารกิจการนักเรียน">รองผู้อำนวยการกลุ่มบริหารกิจการนักเรียน</option>
                                                <option value="ปฏิบัติหน้าที่รองผู้อำนวยการกลุ่มพัฒนาคุณภาพการศึกษา">ปฏิบัติหน้าที่รองผู้อำนวยการกลุ่มพัฒนาคุณภาพการศึกษา</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="image">รูปภาพ <font style="color: red; margin-left: 1px">*</font></label>
                                            <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
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