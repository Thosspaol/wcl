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
<html lang="th">

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

    <style>
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .inner-table {
            width: 100%;
            border-collapse: collapse;
        }

        .inner-table th,
        .inner-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        /* Custom CSS for smaller input fields */
        .small-input {
            width: 80px;
            display: inline-block;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?php include('../includes/sidebar.php') ?>
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
                                    <h3 class="card-title" style="line-height:2.1rem;">แก้ไขข้อมูล</h3>
                                    <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class='fas fa-arrow-left'></i> กลับ</a>
                                </div><br>
                                <form action="process_grade.php" method="post" enctype="multipart/form-data">
                                <?php
                                    $pre = htmlspecialchars($row['pre']);
                                    $firstname = htmlspecialchars($row['firstname']);
                                    $lastname = htmlspecialchars($row['lastname']);
                                    $level = htmlspecialchars($row['level']);
                                ?>
                                <div class="table-container">
                                    <input type="hidden" class="form-control" value="<?php echo $row["id_account"];?>" name="id_account">
                                    <table>
                                        <tr>
                                            <td>
                                                <table class="inner-table">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th colspan="2">ผลการเรียนของ  <input type="text" name="pre" class="form-control small-input" value="<?php echo $pre;?>" readonly> <input type="text" name="firstname" class="form-control small-input" value="<?php echo $firstname;?>"readonly> <input type="text" name="lastname" class="form-control small-input" value="<?php echo $lastname;?>" readonly> <input type="text" name="level" class="form-control small-input" value="<?php echo $level;?>" readonly> ภาคเรียนที่ 2</th>
                                                        </tr>
                                                        <tr>
                                                            <th>วิชา</th>
                                                            <th>เกรด</th>
                                                        </tr>
                                                    </thead>
                                                    <tr>
                                                        <td>คณิตศาสตร์</td>
                                                        <td><input type="text" name="math_grade" class="form-control" id="math_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>คณิตศาสตร์เพิ่มเติม</td>
                                                        <td><input type="text" name="additional_grade" class="form-control" id="additional_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>วิทยาศาสตร์</td>
                                                        <td><input type="text" name="sci_grade" class="form-control" id="sci_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ภาษาอังกฤษ</td>
                                                        <td><input type="text" name="eng_grade" class="form-control" id="eng_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ภาษาไทย</td>
                                                        <td><input type="text" name="thai_grade" class="form-control" id="thai_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>สังคมศึกษาและวัฒนธรรม</td>
                                                        <td><input type="text" name="society_grade" class="form-control" id="society_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>สุขศึกษา</td>
                                                        <td><input type="text" name="health_grade" class="form-control" id="health_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ดนตรีและนาฏศิลป์</td>
                                                        <td><input type="text" name="music_grade" class="form-control" id="music_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ประวัติศาสตร์</td>
                                                        <td><input type="text" name="history_grade" class="form-control" id="history_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ศิลปะ</td>
                                                        <td><input type="text" name="art_grade" class="form-control" id="art_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>เทคโนโลยี</td>
                                                        <td><input type="text" name="technology_grade" class="form-control" id="technology_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>การงานอาชีพ <font style="font-size: 0.8em; color: red;">*หมายเหตุ เฉพาะนักเรียนชั้น ประถมศึกษาปีที่ 1-3* </font></td>
                                                        <td><input type="text" name="career_grade" class="form-control" id="career_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>พละศึกษา</td>
                                                        <td><input type="text" name="physical_grade" class="form-control" id="physical_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>หน้าที่พลเมือง</td>
                                                        <td><input type="text" name="civic_grade" class="form-control" id="civic_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>เกษตร <font style="font-size: 0.8em; color: red;">*หมายเหตุ เฉพาะนักเรียนชั้น ประถมศึกษาปีที่ 4-6* </font></td>
                                                        <td><input type="text" name="farm_grade" class="form-control" id="farm_grade" required></td>
                                                    </tr>
                                                    <tr>
                                                        <th>เกรดเฉลี่ย</th>
                                                        <th></th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div> <br>
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
