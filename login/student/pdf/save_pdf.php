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
                            <h5 class="m-0 text-dark">เพิ่มบุคลากรเจ้าหน้าที่</h5>
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
                                <h3 class="card-title" style="line-height:2.1rem;">กรอกข้อมูล</h3>
                                <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> กลับ</a>
                            </div>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
                                $target_dir = "uploads/"; // โฟลเดอร์ที่จะเก็บไฟล์ที่อัปโหลด
                                
                                // ตรวจสอบว่ามีโฟลเดอร์ uploads หรือไม่ ถ้าไม่มีให้สร้างขึ้นมา
                                if (!is_dir($target_dir)) {
                                    mkdir($target_dir, 0777, true);
                                }

                                $fileName = basename($_FILES["file"]["name"]);
                                $target_file = $target_dir . $fileName;

                                // ตรวจสอบประเภทไฟล์
                                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                if($fileType != "pdf") {
                                    echo "<div class='alert alert-danger'>Sorry, only PDF files are allowed.</div>";
                                } else {
                                    // ตรวจสอบการเขียนทับไฟล์ที่มีชื่อซ้ำกัน
                                    $i = 1;
                                    while (file_exists($target_file)) {
                                        $target_file = $target_dir . pathinfo($fileName, PATHINFO_FILENAME) . '_' . $i . '.' . $fileType;
                                        $i++;
                                    }

                                    // ตรวจสอบว่ามีการอัปโหลดไฟล์และย้ายไฟล์ไปยังโฟลเดอร์ที่กำหนด
                                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                                        // บันทึกชื่อไฟล์และเวลาที่อัปโหลดลงในไฟล์ log
                                        $log = fopen('uploads/uploads.log', 'a');
                                        fwrite($log, basename($target_file) . " - " . date("Y-m-d H:i:s") . "\n");
                                        fclose($log);
                                        echo "<div class='alert alert-success'>The file " . basename($target_file) . " has been uploaded.</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
                                    }
                                }
                            }

                            // แสดงรายการไฟล์ที่อัปโหลดทั้งหมด
                            echo "<div class='card-body'>";
                            echo "<h3>Uploaded Files:</h3>";
                            echo "<table class='table table-striped'>";
                            echo "<thead><tr><th>File Name</th><th>Upload Time</th><th>Action</th></tr></thead>";
                            echo "<tbody>";

                            $files = scandir('uploads/');
                            $log = file('uploads/uploads.log', FILE_IGNORE_NEW_LINES);
                            $file_upload_times = [];
                            foreach ($log as $entry) {
                                list($name, $time) = explode(' - ', $entry);
                                $file_upload_times[$name] = $time;
                            }

                            foreach ($files as $file) {
                                if ($file !== '.' && $file !== '..' && $file !== 'uploads.log') { // ไม่แสดง uploads.log
                                    $upload_time = isset($file_upload_times[$file]) ? $file_upload_times[$file] : 'Unknown';
                                    echo "<tr><td>" . htmlspecialchars($file) . "</td><td>" . $upload_time . "</td><td><a href='download.php?file=" . urlencode($file) . "' class='btn btn-primary btn-sm'><i class='fas fa-download'></i> Download</a></td></tr>";
                                }
                            }
                            echo "</tbody></table>";
                            echo "</div>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
