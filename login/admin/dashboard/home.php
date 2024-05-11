<?php
session_start();
$open_connect = 1;
$servername = "localhost";
$username = "root";
$password = "";

$approveCount = 0;
$pendingCount = 0;
$breakwaterCount = 0;
$finishCount = 0;



// try {
//     $conn = new PDO("mysql:host=$servername;dbname=wcl", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     echo "Connect failed: " . $e->getMessage();
//     exit(); // จะไม่สามารถทำงานต่อได้ถ้าไม่สามารถเชื่อมต่อฐานข้อมูลได้
// }

// try {
//     $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM test WHERE status = 'online'");
//     $stmt->execute();
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     $approveCount = $result['count'];

//     $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM test WHERE status = 'waitng'");
//     $stmt->execute();
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     $pendingCount = $result['count'];

//     $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM test WHERE card = 'bide'");
//     $stmt->execute();
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     $breakwaterCount = $result['count'];
    
//     $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM test WHERE card = 'finish'");
//     $stmt->execute();
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     $finishCount = $result['count'];
    

// } catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

// $totalCount = $approveCount + $pendingCount ;
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
    <!-- stylesheet -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mali">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body class = "hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('../includes/sidebar.php')?>
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
                    <div class="col-12 col-md-3">
                        <div class="card">
                            <form id="formData">
                                    <a href="../add/index.php"  title="เพิ่มบุคคลากร">
                                     <img alt="เพิ่มบุคคลากร" class="img-responsive ls-is-cached lazyloaded"   src="../img/เพิ่ม.png"  style="max-width: 75%; height: auto;" >                                                                 
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