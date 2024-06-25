<?php
session_start();
$open_connect = 1;
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=wcl", $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo"Connected successfully";
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
                            <h5 class="m-0 text-dark">บุคลากร</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">เจ้าหน้าที่</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <?php
                    // Fetch unique levels
                    $stmt = $conn->query("SELECT DISTINCT level FROM grade ORDER BY level");
                    $levels = $stmt->fetchAll(PDO::FETCH_COLUMN);

                    foreach ($levels as $level) {
                        ?>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title" style="line-height:2.1 rem;">รายชื่อบุคลากร ระดับชั้น <?php echo $level; ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered" id="Table_<?php echo $level; ?>" style="width:100%">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th scope="col">ลำดับที่</th>
                                                    <th scope="col">คำนำหน้า</th>
                                                    <th scope="col">ชื่อ</th>
                                                    <th scope="col">นามสกุล</th>
                                                    <th scope="col">เกรดเฉลี่ย</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            // Fetch students in the current level
                                            $stmt = $conn->prepare("SELECT * FROM grade WHERE level = ? ORDER BY average_grade DESC");
                                            $stmt->execute([$level]);
                                            $rows = $stmt->fetchAll();
                                            $index = 1;
                                            foreach ($rows as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $index++; ?></td>
                                                    <td><?php echo $row['pre']; ?></td>
                                                    <td><?php echo $row['firstname']; ?></td>
                                                    <td><?php echo $row['lastname']; ?></td>
                                                    <td><?php echo number_format($row['average_grade'], 2); ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('table[id^="Table_"]').each(function() {
                $(this).DataTable({
                    order: [[4, 'desc']],
                    columnDefs: [{
                        "defaultContent": "-",
                        "targets": "_all"
                    }],
                    bLengthChange: true,
                    lengthMenu: [
                        [10, 20, -1],
                        [10, 50, "All"]
                    ],
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
        });
    </script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/adminlte.min.js"></script>
    <script src="../assets/js/login.js"></script>
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>
</body>

</html>
