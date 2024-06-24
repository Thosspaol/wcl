<?php
session_start();
$open_connect = 1;
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}



// ดึงข้อมูลจากตาราง
$sql = "SELECT COUNT(*) as count FROM account";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalCount = $row['count'];
}
$sql = "SELECT COUNT(*) as count FROM announcements";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $newsCount = $row['count'];
}


$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก | Watchonglom</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
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
                            <h5 class="m-0 text-dark">หน้าหลัก</h5>
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
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $totalCount; ?></h3>
                                    <p>สมาชิกทั้งหมด</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-people"></i>
                                </div>
                                <a href="#" class="small-box-footer">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $newsCount; ?></h3>
                                    <p>ข่าวสารทั้งหมด</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-clipboard"></i>
                                </div>
                                <a href="#" class="small-box-footer">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="card">
                                <form id="formData">
                                    <a href="../add/index.php" title="เพิ่มบุคลากร">
                                        <img alt="เพิ่มบุคลากร" class="img-responsive ls-is-cached lazyloaded" src="../img/เพิ่ม.png" style="max-width: 75%; height: auto;">
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card">
                                <form id="formData">
                                    <a href="../calendar/index.php" title="เพิ่มปฏิทินกิจกรรม">
                                        <img alt="เพิ่มปฏิทินกิจกรรม" class="img-responsive ls-is-cached lazyloaded" src="../img/เพิ่มกิจกรรม.png" style="max-width: 75%; height: auto;">
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card">
                                <form id="formData">
                                    <a href="../line_notify/index.php" title="line-Notify">
                                        <img alt="Line-Notify" class="img-responsive ls-is-cached lazyloaded" src="../img/Line.png" style="max-width: 75%; height: auto;">
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card">
                                <form id="formData">
                                    <a href="../pdf/index.php" title="เอกสารpdf">
                                        <img alt="pdf" class="img-responsive ls-is-cached lazyloaded" src="../img/pdf.png" style="max-width: 75%; height: auto;">
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12 col-md-3">
                            <div class="card">
                                <form id="formData">
                                    <a href="../news/index.php" title="กระดานข่าวรับสมัครนักเรียน">
                                        <img alt="กระดานข่าวรับสมัคร" class="img-responsive ls-is-cached lazyloaded" src="../img/กระดาน.png" style="max-width: 75%; height: auto;">
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/home.js"></script>
</body>

</html>
<!-- SCRIPTS -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/js/login.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../assets/js/pages/dashboard.js"></script>