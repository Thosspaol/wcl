<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$id_account = $_GET['id_account'];
$query = "SELECT * FROM grade WHERE id_account = $id_account";
$call_back = mysqli_query($connect, $query);
$row_show = mysqli_fetch_assoc($call_back);
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลเกรด</title>
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
                            <h5 class="m-0 text-dark">ผลการศึกษา</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">นักเรียน</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="line-height:2.1rem;">ตารางเกรด</h3>
                                <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> กลับ</a>
                            </div>
                            <?php
                            $pre = htmlspecialchars($row_show['pre']);
                            $firstname = htmlspecialchars($row_show['firstname']);
                            $lastname = htmlspecialchars($row_show['lastname']);

                            $math_grade = number_format(htmlspecialchars($row_show['math_grade']), 2);
                            $additional_grade  = number_format(htmlspecialchars($row_show['additional_grade']), 2);
                            $sci_grade = number_format(htmlspecialchars($row_show['sci_grade']), 2);

                            $eng_grade = number_format(htmlspecialchars($row_show['eng_grade']), 2);
                            $thai_grade = number_format(htmlspecialchars($row_show['thai_grade']), 2);
                            $society_grade = number_format(htmlspecialchars($row_show['society_grade']), 2);

                            $health_grade = number_format(htmlspecialchars($row_show['health_grade']), 2);
                            $music_grade = number_format(htmlspecialchars($row_show['music_grade']), 2);
                            $history_grade = number_format(htmlspecialchars($row_show['history_grade']), 2);

                            $art_grade = number_format(htmlspecialchars($row_show['art_grade']), 2);
                            $technology_grade = number_format(htmlspecialchars($row_show['technology_grade']), 2);
                            $career_grade = number_format(htmlspecialchars($row_show['career_grade']), 2);

                            $physical_grade = number_format(htmlspecialchars($row_show['physical_grade']), 2);
                            $civic_grade  = number_format(htmlspecialchars($row_show['civic_grade']), 2);
                            $farm_grade  = number_format(htmlspecialchars($row_show['farm_grade']), 2);

                            $total_grade = number_format(htmlspecialchars($row_show['total_grade']), 2);
                            $average_grade = number_format(htmlspecialchars($row_show['average_grade']), 2);
                            ?> <br>
                            <div class="table-container">
                                <table>                                    
                                    <tr>
                                        <td>
                                            <table class="inner-table">
                                                <thead class="table-secondary">
                                                    <tr>                                                        
                                                        <th colspan="2">ผลการเรียนของ <?php echo "$pre $firstname $lastname"; ?> ภาคเรียนที่ 2</th>
                                                    </tr>
                                                    <tr>
                                                        <th>วิชา</th>
                                                        <th>เกรด</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>คณิตศาสตร์</td>
                                                    <td><?php echo $math_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>คณิตศาสตร์เพิ่มเติม</td>
                                                    <td><?php echo $additional_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>วิทยาศาสตร์</td>
                                                    <td><?php echo $sci_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ภาษาอังกฤษ</td>
                                                    <td><?php echo $eng_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ภาษาไทย</td>
                                                    <td><?php echo $thai_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>สังคมศึกษาและวัฒนธรรม</td>
                                                    <td><?php echo $society_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>สุขศึกษา</td>
                                                    <td><?php echo $health_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ดนตรีและนาฏศิลป์</td>
                                                    <td><?php echo $music_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ประวัติศาสตร์</td>
                                                    <td><?php echo $history_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ศิลปะ</td>
                                                    <td><?php echo $art_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>เทคโนโลยี</td>
                                                    <td><?php echo $technology_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>การงานอาชีพ <font style="color: red; font-size: 0.8em; color: red;text-align: left;margin-bottom: -10px;">*หมายเหตุ เฉพาะนักเรียนชั้น ประถมศึกษาปีที่ 1-3* </font>
                                                    </td>
                                                    <td><?php echo $career_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>พละศึกษา</td>
                                                    <td><?php echo $physical_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>หน้าที่พลเมือง</td>
                                                    <td><?php echo $civic_grade; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>เกษตร <font style="color: red; font-size: 0.8em; color: red;text-align: left;margin-bottom: -10px;">*หมายเหตุ เฉพาะนักเรียนชั้น ประถมศึกษาปีที่ 4-6* </font>
                                                    </td>
                                                    <td><?php echo $farm_grade; ?></td>
                                                </tr>                                                
                                                <tr>
                                                    <th>เกรดเฉลี่ย</th>
                                                    <th><?php echo $average_grade; ?></th>
                                                </tr>
                                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>