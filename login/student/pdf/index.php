<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
$open_connect = 1;
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF | Senate</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf_viewer.min.css">
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
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('../includes/sidebar.php') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">PDF</h5>
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
                                <h3 class="card-title" style="line-height:2.1rem;">ไฟล์ทั้งหมด</h3>
                                <a href="../dashboard/home.php" class="btn btn-primary float-right"><i class="fas fa-arrow-left"></i> กลับ</a>
                            </div>
                            <div class="card-body">                               
                                <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
                                    $target_dir = "uploads/";

                                    if (!is_dir($target_dir)) {
                                        mkdir($target_dir, 0777, true);
                                    }

                                    $fileName = basename($_FILES["file"]["name"]);
                                    $target_file = $target_dir . $fileName;
                                    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                    if ($fileType != "pdf") {
                                        echo "<div class='alert alert-danger'>ขออภัย, เฉพาะไฟล์ PDF เท่านั้นที่อนุญาต.</div>";
                                    } else {
                                        $i = 1;
                                        while (file_exists($target_file)) {
                                            $target_file = $target_dir . pathinfo($fileName, PATHINFO_FILENAME) . '_' . $i . '.' . $fileType;
                                            $i++;
                                        }

                                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                                            $log = fopen('uploads/uploads.log', 'a');
                                            fwrite($log, basename($target_file) . " - " . date("Y-m-d") . "\n");
                                            fclose($log);
                                            echo "<div class='alert alert-success'>ไฟล์ " . basename($target_file) . " ได้รับการอัปโหลดแล้ว.</div>";
                                        } else {
                                            echo "<div class='alert alert-danger'>ขออภัย, มีข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ.</div>";
                                        }
                                    }
                                }

                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_file'])) {
                                    $file_to_delete = 'uploads/' . $_POST['delete_file'];
                                    if (file_exists($file_to_delete)) {
                                        unlink($file_to_delete);

                                        $log = file('uploads/uploads.log');
                                        $new_log = [];
                                        foreach ($log as $entry) {
                                            list($name, $time) = explode(' - ', $entry);
                                            if (trim($name) !== $_POST['delete_file']) {
                                                $new_log[] = $entry;
                                            }
                                        }
                                        file_put_contents('uploads/uploads.log', implode("", $new_log));
                                        echo "<script>
                                        $(document).ready(function() {
                                            Swal.fire({
                                                title: 'ลบข้อมูลสำเร็จแล้ว!!',
                                                text: 'SENATE',
                                                icon: 'success',
                                                timer: 5000,
                                                showConfirmButton: false
                                            });
                                        })
                                    </script>";
                                    } else {
                                        echo "<script>
                                        $(document).ready(function() {
                                            Swal.fire({
                                                title: 'ไม่พบไฟล์ที่จะลบ',
                                                text: 'SENATE',
                                                icon: 'error',
                                                timer: 5000,
                                                showConfirmButton: false
                                            });
                                        })
                                    </script>";
                                    }
                                }

                                // แสดงรายการไฟล์ที่อัปโหลดทั้งหมด
                                echo "<h3 class='mt-4'>อัปโหลดไฟล์:</h3>";
                                echo "<table id='uploadedFilesTable' class='table table-striped'>";
                                echo "<thead><tr><th>ชื่อไฟล์</th><th>เวลาที่อัปโหลด</th><th>การกระทำ</th></tr></thead>";
                                echo "<tbody>";

                                $files = scandir('uploads/');
                                $log = file('uploads/uploads.log', FILE_IGNORE_NEW_LINES);
                                $file_upload_times = [];
                                foreach ($log as $entry) {
                                    list($name, $time) = explode(' - ', $entry);
                                    $file_upload_times[$name] = $time;
                                }

                                foreach ($files as $file) {
                                    if ($file !== '.' && $file !== '..' && $file !== 'uploads.log') {
                                        $upload_time = isset($file_upload_times[$file]) ? $file_upload_times[$file] : 'Unknown';
                                        echo "<tr><td>" . htmlspecialchars($file) . "</td><td>" . $upload_time . "</td><td><a href='download.php?file=" . urlencode($file) . "' class='btn btn-primary btn-sm'><i class='fas fa-download'></i> ดาวน์โหลด</a> <form method='POST' action='' style='display:inline-block;'><input type='hidden' name='delete_file' value='" . htmlspecialchars($file) . "'><button type='submit' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> ลบ</button></form> <button class='btn btn-secondary btn-sm' onclick='printFile(\"" . htmlspecialchars($file) . "\")'><i class='fas fa-print'></i> พิมพ์</button></td></tr>";
                                    }
                                }
                                echo "</tbody></table>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf_viewer.min.js"></script>  
    <script>
        $(document).ready(function () {
            $('#uploadedFilesTable').DataTable({
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                bLengthChange: true,
                lengthMenu: [[10, 20, -1], [10, 20, "All"]],
                bFilter: true,
                bSort: true,
                bPaginate: true,
                language: {
                    "decimal": "",
                    "emptyTable": "ไม่มีข้อมูลในตาราง",
                    "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                    "infoEmpty": "ไม่มีข้อมูลที่จะแสดง",
                    "infoFiltered": "(กรองจาก _MAX_ รายการทั้งหมด)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "แสดง _MENU_ แถว",
                    "loadingRecords": "กำลังโหลด...",
                    "processing": "กำลังประมวลผล...",
                    "search": "ค้นหา:",
                    "zeroRecords": "ไม่พบรายการที่ค้นหา",
                    "paginate": {
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้า"
                    },
                    "aria": {
                        "orderable": "เรียงตามคอลัมน์นี้",
                        "orderableReverse": "เรียงตามคอลัมน์นี้ (กลับกัน)"
                    }
                }
            });
        });

        function printFile(fileName) {
            const url = `uploads/${fileName}`;
            const pdfFrame = document.createElement('iframe');
            pdfFrame.style.visibility = 'hidden';
            pdfFrame.src = url;

            document.body.appendChild(pdfFrame);
            pdfFrame.onload = function() {
                pdfFrame.contentWindow.print();
            };
        }
    </script>     
</body>
</html>
