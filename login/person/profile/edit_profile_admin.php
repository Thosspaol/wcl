<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$id_account = $_SESSION['id_account'];
$query_show = "SELECT * FROM account WHERE id_account = '$id_account'";
$call_back_show = mysqli_query($connect, $query_show);
$row = mysqli_fetch_assoc($call_back_show);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลการขออนุญาติทำบัตร | senate</title>
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
                    <div class="content-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h5 class="m-0 text-dark">แก้ข้อมูล</h5>
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
                                        <h3 class="card-title" style="line-height: 2.1 rem;">แก้ข้อมูล</h3>
                                        <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class='fas fa-arrow-left'></i> กลับ</a>
                                    </div><br>

                                    <form action="update_profile_admin.php" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <input type="hidden" name="id_account" value="<?php echo $row["id_account"];?>">
                                                <div class="form-group col-sm-4">
                                                    <label for="pre">คำนำหน้า</label>
                                                    <input type="text" name="pre" class="form-control" value="<?php echo $row["pre"];?>">
                                                </div>
                                                <div class="from-group col-sm-4">
                                                    <label for="firstname">ชื่อ</label>
                                                    <input type="text" name="firstname" class="form-control" value="<?php echo $row["firstname"];?>">
                                                </div>
                                                <div class="from-group col-sm-4">
                                                    <label for="lastname">นามสกุล</label>
                                                    <input type="text" name="lastname" class="form-control" value="<?php echo $row["lastname"];?>">
                                                </div>                                               
                                            </div>
                                            <div class="form-row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="password_account">รหัสผ่าน</label>
                                                        <input type="text" name="password_account" class="form-control" value="<?php echo $row["password_account"];?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="birthday">วัน/เดือน/ปีเกิด</label>
                                                        <input type="text" name="birthday" class="form-control" value="<?php echo $row["birthday"];?>" readonly>
                                                    </div>
                                                    <div cl
                                                    <div class="form-group col-sm-4">
                                                        <label for="status">สถานะ</label>
                                                        <input type="text" name="role_account" class="form-control" value="<?php echo $row["role_account"];?>" readonly>
                                                    </div>
                                                </div>
                                               <div class="form-group col-sm-4">
                                                <div class="custom-file">
                                                    <label for="image_account">รูปโปรไฟล์</label>
                                                    <input type="file" name="images_account" class="form-control" id="images_account" accept=".jpg, .jpeg, .png" value="" required>
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
        </div>
    
</body>
</html>
<script src="../assets/js/login.js"></script>