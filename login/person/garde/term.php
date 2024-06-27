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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มภาคเรียน | Watchonglom</title>
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

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('../includes/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">ผู้ดูแลระบบ</h5>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="line-height:2.1 rem;">รายชื่อบุคลากร</h3>
                                    <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class='fas fa-arrow-left'></i> กลับ</a>
                                </div>
                                <div class="card-body">
                                    <form action="term_add.php" method="POST">
                                        <input type="hidden" name = "id_account" value="<?php echo $row["id_account"];?>">
                                        <input type="hidden" name ="pre" value="<?php echo $row["pre"];?>">
                                        <input type="hidden" name="firstname" value="<?php echo $row["firstname"];?>"> 
                                        <input type="hidden" name="lastname" value="<?php echo $row["lastname"];?>">
                                        <input type="hidden" name="level" value="<?php echo $row["level"];?>">
                                        <div class="col-sm-4">
                                            <label for="semester_name">ชื่อภาคเรียน:</label>
                                            <input type="text" id="semester_name" name="semester_name" class="form-control " required><br>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="start_date">วันเริ่มต้น:</label>
                                            <input type="date" id="start_date" name="start_date" class="form-control " required><br>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="end_date">วันสิ้นสุด:</label>
                                            <input type="date" id="end_date" name="end_date" class="form-control " required><br>
                                        </div>

                                        <input type="submit" class="btn btn-success" value="เพิ่มภาคเรียน">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>