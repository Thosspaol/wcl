<?php
session_start();
$open_connect = 1;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wcl"; // อย่าลืมใส่ชื่อฐานข้อมูลของคุณ

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตั้งค่า locale เป็นภาษาไทย
setlocale(LC_TIME, 'th_TH.UTF-8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ปฏิทินกิจกรรม | wcl</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/senate.png">
    <link rel="manifest" href="../assets/img/favicons/senate.png">
    <link rel="mask-icon" href="../assets/img/favicons/senate.png" color="#5bbad5">
    <link rel="shortcut icon" href="../assets/img/favicons/senate.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../assets/img/favicons/senate.png">
    <meta name="theme-color" content="#ffffff">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mali">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <!-- <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style> -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('../includes/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">ปฏิทินกิจกรรม</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">เจ้าหน้าที่</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="line-height:2.1 rem;">กำหนด วัน-เวลา ปฏิทินกิจกรรม</h3>
                                    <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> กลับ</a>
                                    </div>
                                <div class="container py-5" id="page-container">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div id="calendar"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="cardt rounded-0 shadow">                                                                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Event Details Modal -->
                                <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-0">
                                            <div class="modal-header rounded-0">
                                                <h5 class="modal-title">รายละเอียดกำหนดงาน</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body rounded-0">
                                                <div class="container-fluid">
                                                    <dl>
                                                        <dt class="text-muted">ชื่อเรื่อง</dt>
                                                        <dd id="title" class="fw-bold fs-4"></dd>
                                                        <dt class="text-muted">หมายเหตุ</dt>
                                                        <dd id="description" class=""></dd>
                                                        <dt class="text-muted">เริ่ม</dt>
                                                        <dd id="start" class=""></dd>
                                                        <dt class="text-muted">สิ้นสุด</dt>
                                                        <dd id="end" class=""></dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="modal-footer rounded-0">
                                                <div class="text-end">                                                    
                                                    <button type="button" class="btn btn-danger btn-sm rounded-0" data-bs-dismiss="modal"><i class="fas fa-share-square"></i> ปิด</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>    
                    </div>
                </div>
            </div>            <!-- Event Details Modal -->
                            <!-- Event Details Modal -->

                                <?php
                                $schedules = $conn->query("SELECT * FROM `schedule_list`");
                                $sched_res = [];
                                foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
                                    $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
                                    $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
                                    $sched_res[$row['id']] = $row;
                                }
                                ?>
                                <?php
                                if (isset($conn)) $conn->close();
                                ?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>

</html>