<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$id = $_GET["id_account"];
$sql = "SELECT * FROM account WHERE id_account = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
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
<body class = "hold-transition sidebar-mini">

<div class="wrapper">
    <?php include('../includes/sidebar.php')?>
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
                            <form action="update_manager.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-row">
                                        <input type="hidden" name="id_account" value="<?php echo $row["id_account"];?>">
                                        <div class="form-grop col-sm-4">
                                            <label for="pre">คำนำหน้า</label>
                                            <input type="text" name="pre" class="form-control" value="<?php echo $row["pre"];?>"readonly>
                                        </div>
                                        <div class="form-grop col-sm-4">
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
                                            <label for="math_grade">เกรด:คณิตศาสตร์</label>
                                            <input type="text" class="form-control" name="math_grade" id="math_grade" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="sci_grade">เกรด:วิทยาศาสตร์</label>
                                            <input type="text" class="form-control" name="sci_grade" id="sci_grade" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="eng_grade">เกรด:ภาษาอังกฤษ</label>
                                            <input type="text" name="eng_grade" class="form-control" id="eng_grade" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="thai_grade">เกรด:ภาษาไทย</label>
                                            <input type="text" name="thai_grade" class="form-control" id="thai_grade" required  >
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