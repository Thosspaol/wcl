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
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.11.3/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.11.3/locale/th.js"></script>
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
                                        <input type="hidden" name="id_account" value="<?php echo $row["id_account"];?>">
                                        <input type="hidden" name="pre" value="<?php echo $row["pre"];?>">
                                        <input type="hidden" name="firstname" value="<?php echo $row["firstname"];?>"> 
                                        <input type="hidden" name="lastname" value="<?php echo $row["lastname"];?>">
                                        <input type="hidden" name="level" value="<?php echo $row["level"];?>">
                                        <div class="col-sm-4">
                                            <label for="semester_name">ชื่อภาคเรียน:</label>
                                            <select type="text" id="semester_name" name="semester_name" class="form-control" required>
                                                <option value disabled selected>ชื่อภาคเรียน</option>
                                                <option value="ภาคเรียนที่1">ภาคเรียนที่ 1</option>
                                                <option value="ภาคเรียนที่2">ภาคเรียนที่ 2</option>
                                            </select><br>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="start_date">วันเริ่มต้น:</label>
                                            <input type="date" id="start_date"  class="form-control" required><br>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="end_date">วันสิ้นสุด:</label>
                                            <input type="date" id="end_date"  class="form-control" required><br>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="academic_year">ปีการศึกษา:</label>
                                            <select id="academic_year" name="academic_year" class="form-control" required>
                                                <!-- JavaScript จะเพิ่มตัวเลือกที่นี่ -->
                                            </select><br>
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
    <script>
        dayjs.locale('th');
        document.getElementById('start_date').addEventListener('input', function (e) {
            this.value = dayjs(this.value).format('YYYY-MM-DD');
        });
        document.getElementById('end_date').addEventListener('input', function (e) {
            this.value = dayjs(this.value).format('YYYY-MM-DD');
        });

        // เพิ่มปีการศึกษาให้เป็นปี พ.ศ.
        const currentYear = dayjs().year();
        const startYear = currentYear + 543; // ปี พ.ศ. ปัจจุบัน
        const endYear = startYear + 10; // ปี พ.ศ. ล่วงหน้า 5 ปี
        const pastYears = 10; // ปี พ.ศ. ย้อนหลัง 10 ปี
        const select = document.getElementById('academic_year');

        for (let year = startYear - pastYears; year <= endYear; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.text = year;
            if (year === startYear) {
                option.selected = true;
            }
            select.appendChild(option);
        }
    </script>
</body>

</html>
