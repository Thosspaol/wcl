<?php
session_start();
$open_connect = 1;
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=wcl",$username,$password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo"Connected successfully";
} catch(PDOException $e){
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
        <?php include_once('../includes/sidebar.php')?>
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
                <div class="content-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="line-height:2.1 rem;">รายชื่อบุคลากร</h3>
                                    <div class="float-right">
                                        <label for="levelFilter">กรองตามระดับชั้น: </label>
                                        <select id="levelFilter" class="form-control">
                                            <option value="">ทั้งหมด</option>
                                            <option value="ป.1">ป.1</option>
                                            <option value="ป.2">ป.2</option>
                                            <option value="ป.3">ป.3</option>
                                            <option value="ป.4">ป.4</option>
                                            <option value="ป.5">ป.5</option>
                                            <option value="ป.6">ป.6</option>
                                            <!-- เพิ่มระดับชั้นอื่น ๆ ที่ต้องการ -->
                                        </select>
                                    </div>                                   
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered" id="Table" style="width:100%">
                                        <thead class="table-secondary">
                                            <tr>
                                                
                                                <th scope="col">วัน/เดือน/ปีเกิด</th>
                                                <th scope="col">คำนำหน้า</th>
                                                <th scope="col">ชื่อ</th>
                                                <th scope="col">นามสกุล</th>
                                                <th scope="col">สถานะ</th>
                                                <th scope="col">ระดับชั้น</th>
                                                <th scope="col">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $stmt = $conn->query("SELECT * FROM account WHERE role_account = 'student'");
                                                $stmt->execute();

                                                $rows = $stmt->fetchAll();
                                                foreach($rows as $row){
                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $row['birthday']?></td>
                                                <td><?php echo $row['pre']?></td>
                                                <td><?php echo $row['firstname']?></td>
                                                <td><?php echo $row['lastname']?></td>
                                                <td><?php echo $row['role_account']?></td>
                                                <td><?php echo $row['level']?></td>
                                                <td>
                                                    <a href="term.php?id_account=<?php echo $row["id_account"];?>" class="btn btn-success"><i class="fas fa-poll-h"></i> ออกเกรด</a> 
                                                    <a href="grade.php?id_account=<?php echo $row["id_account"];?>" class="btn btn-primary"><i class="fas fa-address-card"></i> ตรวจสอบผลการเรียน</a>      
                                                    <a href="edit_grade_student.php?id_account=<?php echo $row["id_account"];?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> แก้ไขผลการเรียน</a>                                                 
                                                </td>
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
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#Table').DataTable({
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

            // Custom filtering function
            $('#levelFilter').on('change', function() {
                var selectedLevel = $(this).val();
                table.columns(5).search(selectedLevel).draw();
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
