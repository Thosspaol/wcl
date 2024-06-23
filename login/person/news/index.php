<?php
session_start();
$open_connect = 1;
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=wcl", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connect failed:" . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager | Watchonglom</title>
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
        <?php include_once('../includes/sidebar.php')?>
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
                                    <a href="add.php" class="btn btn-success float-right"><i class="fas fa-plus"></i> เพิ่มประกาศข่าวสาร</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered" id="Table" style="width:100%">
                                        <thead class="table-secondary">
                                            <th scope="col">ลำดับที่</th>
                                            <th scope="col">ชื่อเรื่อง</th>
                                            <th scope="col">เนื้อหา</th>
                                            <th scope="col">วันเวลาที่ส่ง</th>
                                            <th scope="col">รูปภาพ</th>                                        
                                            <th scope="col">รายละเอียด</th>
                                        </thead>
                                        <?php
                                        $stmt = $conn->query("SELECT * FROM announcements");
                                        $stmt->execute();
                                        $rows = $stmt->fetchAll();
                                        foreach ($rows as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['title'] ?></td>
                                                <td><?php echo $row['message'] ?></td>
                                                <td><?php echo $row['created_at'] ?></td>
                                                <td><img src="../../../uploads/<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>" style="width: 100px; height: auto;"></td>
                                                <td>
                                                    <a href="edit_news.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="far fa-folder-open"></i> แก้ไขข้อมูล</a>
                                                    <a href="delete_manager.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Table').DataTable({
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                bLengthChange: true,
                lengthMenu: [[10, 20, -1], [10, 50, "All"]],
                bFilter: true,
                bSort: true,
                bPaginate: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No data available in table",
                    "info": "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                    "infoEmpty": "ไม่พบข้อมูลที่ต้องการ",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "แสดง _MENU_ แถว",
                    "loadingRecords": "Loading...",
                    "processing": "",
                    "search": "ค้นหา:",
                    "zeroRecords": "ไม่พบข้อมูลที่ต้องการ",
                    "paginate": {
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้านี้"
                    },
                    "aria": {
                        "orderable": "Order by this column",
                        "orderableReverse": "Reverse order this column"
                    }
                }
            });
        });
    </script>
</body>
</html>
