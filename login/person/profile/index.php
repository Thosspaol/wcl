<?php
session_start();
$open_connect = 1;
require('../../connect.php');

if(!isset($_SESSION['id_account']) || !isset($_SESSION['role_account'])){//ถ้าไม่มีเซสชัน id_account หรือเซสชัน role_account จะถูกส่งไปหน้า login
    die(header('Location: ../form_login.php'));
}elseif(isset($_GET['logout'])){ //ถ้ามีการกดปุ่มออกจากระบบให้ทำการทำลายเซสชันและส่งไปหน้า login
    session_destroy();
    die(header('Location: ../form_login.php'));
}else{
    $id_account = $_SESSION['id_account'];
    $query_show = "SELECT * FROM account WHERE id_account= '$id_account'";
    $call_back_show = mysqli_query($connect, $query_show);
    $result_show = mysqli_fetch_assoc($call_back_show);
    $directory = '../../images_account/';
    $image_name = $directory . $result_show['images_account'];
    $clear_cache = '?' . filemtime($image_name);
    $image_account = $image_name . $clear_cache;
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>โปรไฟล์ | Watchonglom</title>
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
                        <h5 class="m-0 text-dark">โปรไฟล์</h5>
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
            <div class="container-fluid">
                <div class="row">                
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="line-height: 2.1 rem;">ข้อมูลผู้ใช้งาน</h3>
                                <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class='fas fa-arrow-left'></i> กลับ</a>
                            </div>
                            <form id="formData" action="edit_profile_admin.php">
                                <div class="card-body">
                                    <div class="form-row">

                                        <div class="form-group col-sm-4">
                                            <label for="per">คำนำหน้า</label>                                            
                                            <input type="text" name="pre" class="form-control" value="<?php echo $result_show['pre'];?>" readonly>
                                        </div>        

                                        <div class="form-group col-sm-4">
                                            <label for="fristname">ชื่อ</label>
                                            <input type="text" name="firstname" class="form-control" value="<?php echo $result_show['firstname'];?>"readonly>                                                                                      
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="lastname">นามสกุล</label>
                                            <input type="text" name="lastname" class="form-control" value="<?php echo $result_show['lastname'];?>" readonly>
                                        </div>

                                         <div class="form-group col-sm-4">
                                            <label for="password_account">รหัสผ่าน</label>
                                            <input type="text" name="password_account" class="form-control" value="<?php echo $result_show['password_account'];?>" readonly>
                                         </div>
                                         
                                         <div class="form-group col-sm-4">
                                            <label for="birthday">วัน/เดือน/ปีเกิด</label>
                                            <input type="text" name="birthday" class="form-control" value="<?php echo $result_show['birthday'];?>" readonly>
                                         </div> 
                                         
                                         <div class="form-group col-sm-4">
                                            <label for="status">สถานะ</label>
                                            <input type="text" name="status" class="form-control" value="<?php echo $result_show['role_account'];?>" readonly>
                                         </div>
                                         <div class="form-group col-sm-12">
                                            <label for="images_account">รูปโปรไฟล์</label><br>                                            
                                            <img src="<?php echo $image_account;?>" width=200>
                                         </div>
                                    </div>                                   
                                    <button type="submit" class="btn  btn-warning btn-block"><i class="far fa-edit"></i> แก้ข้อมูล</button>

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
<script src="../plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/js/login.js"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../assets/js/pages/dashboard.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>

</body>
</html>
