<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$id = $_GET["ids"];
$sql = "SELECT * FROM person WHERE ids = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include_once('../includes/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">กระดานประกาศข่าว</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">บุคลากร</li>
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
                                    <h3 class="card-title" style="line-height: 2.1 rem;">เพิ่มเนื้อหาที่จะแสดง</h3>
                                    <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class='fas fa-arrow-left'></i> กลับ</a>
                                </div>
                                <form action="update_person.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <div class="form-row">
                                            <input type="hidden" name="ids" value="<?php echo $row["ids"]; ?>">
                                            <div class="form-group col-sm-4">
                                                <label for="pres">คำนำหน้า</label>
                                                <input type="text" id="pres" name="pres" class="form-control" value="<?php echo $row["pres"]; ?>" required>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="firsts">ชื่อ</label>
                                                <input type="text" id="firsts" name="firsts" class="form-control" value="<?php echo $row["firsts"]; ?>" required>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="lasts">นามสกุล</label>
                                                <input type="text" id="lasts" name="lasts" class="form-control" value="<?php echo $row["lasts"]; ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="roles">กลุ่มสาระการเรียนรู้</label>
                                                <select name="roles" id="roles" class="form-select" required>
                                                    <?php
                                                    $roles = [
                                                        'sci' => 'วิทยาศาสตร์และเทคโนโลยี',
                                                        'math' => 'คณิตศาสตร์',
                                                        'thai' => 'ภาษาไทย',
                                                        'society' => 'สังคมศึกษาและวัฒนธรรมศึกษา',
                                                        'eng' => 'ภาษาต่างประเทศ',
                                                        'art' => 'ศิลปะ',
                                                        'health' => 'สุขศึกษาและพละศึกษา',
                                                        'career' => 'การงานอาชีพ',
                                                        'activity' => 'กิจกรรมพัฒนาผู้เรียน'
                                                    ];
                                                    foreach ($roles as $key => $value) {
                                                        $selected = ($row["roles"] === $key) ? 'selected' : '';
                                                        echo "<option value='$key' $selected>$value</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="manager">ตำแหน่ง</label>
                                                <select name="manager" id="manager" class="form-select">
                                                    <?php
                                                    $manager = [
                                                        'หัวหน้ากลุ่ม' => 'หัวหน้ากลุ่มสาระ',
                                                        'รองหัวหน้ากลุ่ม' => 'รองหัวหน้ากลุ่มสาระ',
                                                        '' => '-',
                                                    ];
                                                    foreach ($manager as $key => $value) {
                                                        $selected_manager = ($row["manager"] === $key) ? 'selected' : '';
                                                        echo "<option value='$key' $selected_manager>$value</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="images">รูปภาพ:</label><br>
                                            <?php if ($row["images"]) { ?>
                                                <img src="../../../uploads/<?php echo $row["images"]; ?>" style="width: 100px; height: auto;" required>
                                            <?php } ?>
                                            <br><br>
                                            <input type="file" id="images" name="images" class="form-control" accept="image/*" required>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">เพิ่มประกาศข่าว</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        CKEDITOR.replace('link');
                    </script>
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
