<?php
session_start();
$open_connect = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มบุคลากร | Senate</title>
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
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include_once('../includes/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">Line Notify</h5>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="line-height:2.1rem;">กรอกข้อมูลแจ้งผู้ปกครอง</h3>
                                <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> กลับ</a>
                            </div>
                            <form action="line_notify.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="pre">คำนำหน้า <font style = "color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="pre" class="form-control" value="<?php echo $result_show['pre'];?>" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="firstname">ชื่อ <font style = "color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="firstname" class="form-control" value="<?php echo $result_show['firstname'];?>" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="lastname">นามสกุล <font style = "color: red; margin-left: 1px">*</font></label>
                                            <input type="text" name="lastname" class="form-control" value="<?php echo $result_show['lastname'];?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">ชื่อเรื่อง </label>
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="apostille">หมายเหตุ</label>
                                            <input type="text" name="apostille" class="form-control" >
                                        </div>
                                        <div class="form-group col-sm-4">
                                                <div class="custom-file">
                                                    <label for="image_account">รูปภาพ</label>
                                                    <input type="file" name="image_url" class="form-control" id="image_url" accept=".jpg, .jpeg, .png" value="" required>
                                                </div>
                                               </div> 
                                       
                                    <button class="btn btn-success btn-block" type="submit" name="signup"><i class='fas fa-location-arrow'></i> ส่งข้อความ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="../assets/js/login.js"></script>
</body>
</html>