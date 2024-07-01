<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$id_account = $_SESSION['id_account'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Query to get student's name and other details from accounts table
    $account_query = "
        SELECT pre, firstname, lastname, level, semester_id
        FROM grades
        WHERE id_account = ?
    ";
    
    if ($stmt = mysqli_prepare($connect, $account_query)) {
        mysqli_stmt_bind_param($stmt, 'i', $id_account);
        mysqli_stmt_execute($stmt);
        $account_result = mysqli_stmt_get_result($stmt);
        $account_info = mysqli_fetch_assoc($account_result);
        mysqli_stmt_close($stmt);
    } else {
        throw new Exception("ไม่สามารถเตรียมการ statement ได้: " . mysqli_error($connect));
    }

    // Query to join grades and subjects tables
    $query = "
        SELECT s.name AS subject_name, g.grade_point
        FROM grades g
        JOIN subjects s ON g.subject_id = s.id
        WHERE g.id_account = ?
    ";

    if ($stmt = mysqli_prepare($connect, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $id_account);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 0) {
            $message = "ไม่พบข้อมูลเกรดสำหรับนักเรียนนี้";
        } else {
            $grades = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $total_grades = 0;
            $total_subjects = count($grades);
            foreach ($grades as $row_show) {
                $total_grades += $row_show['grade_point'];
            }
            $average_grade = $total_grades / $total_subjects;
        }

        mysqli_stmt_close($stmt);
    } else {
        throw new Exception("ไม่สามารถเตรียมการ statement ได้: " . mysqli_error($connect));
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
}
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
                            if (isset($error_message)) {
                                echo '<div class="alert alert-danger text-center" role="alert">' . $error_message . '</div>';
                            } elseif (isset($message)) {
                                echo '<div class="alert alert-warning text-center" role="alert">' . $message . '</div>';
                            } else {
                            ?>
                                <div class="table-container">
                                    <table>
                                        <tr>
                                            <td>
                                                <table class="inner-table">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th colspan="2">ผลการเรียน <?php echo $account_info["pre"];?> <?php echo $account_info["firstname"];?> <?php echo $account_info["lastname"];?> ชั้น <?php echo $account_info["level"];?> <?php echo $account_info["semester_id"];?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>วิชา</th>
                                                            <th>เกรด</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    foreach ($grades as $row_show) {
                                                        $subject_name = htmlspecialchars($row_show['subject_name']);
                                                        $grade_point = number_format(htmlspecialchars($row_show['grade_point']), 2);
                                                        echo "<tr>";
                                                        echo "<td>$subject_name</td>";
                                                        echo "<td>$grade_point</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><strong>เกรดเฉลี่ยรวม</strong></td>
                                                        <td><strong><?php echo number_format($average_grade, 2); ?></strong></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
