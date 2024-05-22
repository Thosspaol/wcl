<?php
// โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
session_start();
$open_connect = 1;
require_once("../../connect.php");
if (!isset($_SESSION['id_account']) || !isset($_SESSION['role_account'])) { //ถ้าไม่มีเซสชัน id_account หรือเซสชัน role_account จะถูกส่งไปหน้า login
    die(header('Location: ../form_login.php'));
} elseif (isset($_GET['logout'])) { //ถ้ามีการกดปุ่มออกจากระบบให้ทำการทำลายเซสชันและส่งไปหน้า login
    session_destroy();
    die(header('Location: ../form_login.php'));
} else {
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
<?php
// การบันทึกข้อมูลอย่างง่ายเบื้องตั้น
if (isset($_POST['btn_add']) && $_POST['btn_add'] != "") {
    $p_schedule_title = (isset($_POST['schedule_title'])) ? $_POST['schedule_title'] : "";
    $p_schedule_startdate = (isset($_POST['schedule_startdate'])) ? $_POST['schedule_startdate'] : "0000-00-00";
    $p_schedule_enddate = (isset($_POST['schedule_enddate'])) ? $_POST['schedule_enddate'] : "0000-00-00";
    $p_schedule_enddate = ($p_schedule_enddate == "0000-00-00") ? $p_schedule_startdate : $p_schedule_enddate;
    $p_schedule_starttime = (isset($_POST['schedule_starttime'])) ? $_POST['schedule_starttime'] : "00:00:00";
    $p_schedule_endtime = (isset($_POST['schedule_endtime'])) ? $_POST['schedule_endtime'] : "00:00:00";
    $p_schedule_repeatday = (isset($_POST['schedule_repeatday'])) ? $_POST['schedule_repeatday'] : "";
    $p_schedule_allday = (isset($_POST['schedule_allday'])) ? 1 : 0;
    $sql = "
    INSERT INTO tbl_schedule SET
    schedule_title='" . $p_schedule_title . "',
    schedule_startdate='" . $p_schedule_startdate . "',
    schedule_enddate='" . $p_schedule_enddate . "',
    schedule_starttime='" . $p_schedule_starttime . "',
    schedule_endtime='" . $p_schedule_endtime . "',
    schedule_repeatday='" . $p_schedule_repeatday . "'
    ";
    $mysqli->query($sql);
    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>โปรไฟล์ | Watchonglom</title>
    <!-- Favicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
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
    <style type="text/css">
        .wrap-form {
            width: 800px;
            margin: auto;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <?php include_once('../includes/sidebar.php') ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">ตารางเรียน</h5>
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
                                <h3 class="card-title" style="line-height: 2.1 rem;">ตารางเรียน-ตารางสอน</h3>
                                <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> กลับ</a>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <a href="grab student.html">ตารางเรียนโรงเรียนวัดช่องลมธรรมโชติ-นักเรียน</a>
                                </div><br>
                                <div class="form-row">
                                    <a href="grab teachers.html">ตารางสอนโรงเรียนวัดช่องลมธรรมโชติ-คุณครู</a>                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>

  


</body>

</html>