<?php
session_start();
$open_connect = 1;
$servername = "localhost";
$username = "root";
$password = "";

$approveCount = 0;
$pendingCount = 0;
$breakwaterCount = 0;
$finishCount = 0;



try {
    $conn = new PDO("mysql:host=$servername;dbname=wcl", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connect failed: " . $e->getMessage();
    exit(); // จะไม่สามารถทำงานต่อได้ถ้าไม่สามารถเชื่อมต่อฐานข้อมูลได้
}

try {
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM test WHERE status = 'online'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $approveCount = $result['count'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM test WHERE status = 'waitng'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $pendingCount = $result['count'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM test WHERE card = 'bide'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $breakwaterCount = $result['count'];
    
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM test WHERE card = 'finish'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $finishCount = $result['count'];
    

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$totalCount = $approveCount + $pendingCount ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Senate</title>
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
<body class = "hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('../includes/sidebar.php')?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-dark">หน้าหลัก</h5>
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
                                    <h3 class="card-title" style="line-height: 2.1 rem;">คำขอมีบัตร</h3>
                                    <a href="home.php" class="btn float-right" id="finishBtn">รับบัตรเสร็จสิ้น <span class="badge badge-success" id="finishCount"><?php echo $finishCount; ?></span> |</a>
                                    <a href="home.php" class="btn float-right" id="breakwaterBtn">รอรับบัตร <span class="badge badge-warning" id="breakwaterCount"><?php echo $breakwaterCount; ?></span> |</a>
                                    <a href="home.php" class="btn float-right" id="approveBtn">อนุมัติ <span class="badge badge-success" id="approveCount"><?php echo $approveCount; ?></span> |</a>
                                    <a href="home.php" class="btn float-right" id="pendingBtn">รอดำเนินการ <span class="badge badge-info" id="pendingCount"><?php echo $pendingCount; ?></span> |</a>
                                    <a href="home.php" class="btn float-right">ทั้งหมด <span class="badge badge-primary"><?php echo $totalCount; ?></span> |</a>
                                </div>
                                <div class="card-body">
                                    <table class="table  table-striped table-bordered " id="Table" style="width:100%">
                                    <thead class="table-secondary">
                                        <th scope = "col">ลำดับที่</th>
                                        <th scope = "col">รหัสบัตรประชาชน</th>
                                        <th scope = "col">คำนำหน้า</th>
                                        <th scope = "col">ชื่อ</th>
                                        <th scope = "col">นามสกุล</th>
                                        <th scope ="col">วันที่รับบัตร</th>
                                        <th scope = "col">สถานะ</th>
                                        <th scope ="col">เบอร์โทรศัพท์</th>
                                        <th scope = "col">ผู้รับผิดชอบ</th>
                                        <th scope = "col">สถานะรับบัตร</th>
                                        <th scope = "col">รายละเอียด</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $conn->query("SELECT * FROM test");
                                        $stmt->execute();

                                        $rows = $stmt->fetchAll();
                                        foreach($rows as $row){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id_account']?></td>
                                                <td><?php echo $row['id_card']?></td>
                                                <td><?php echo $row['pre']?></td>
                                                <td><?php echo $row['firstname']?></td>
                                                <td><?php echo $row['lastname']?></td>
                                                <td><?php echo $row['pickup_card']?></td>                                                
                                                <td>
                                                    <?php
                                                    if($row["status"]=='waitng'){
                                                        ?>
                                                        <span class="badge badge-info"><?php echo "รอดำเนินการ"?></span>
                                                        <?php
                                                    }elseif($row["status"]=='online'){
                                                        ?>
                                                        <span class="badge badge-success"><?php echo "อนุมัติ"?></span>
                                                        <?php
                                                    }elseif($row["status"]=='process'){
                                                        ?>
                                                        <span class="badge badge-primary"><?php echo "กำลังดำเนินการ"?></span>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span class="badge badge-warning"><?php echo "แก้ไข"?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $row['call']?></td>
                                                <td><?php echo $row['pre_name']?><?php echo $row['first_name']?> <?php echo $row['list_name']?></td>
                                                <td>
                                                    <?php
                                                    if($row["card"] == 'bide'){ // เพิ่มเงื่อนไขเช็คค่า card ว่าเป็น 'bide' หรือไม่
                                                        ?>
                                                        <span class="badge badge-warning"><?php echo "รอรับบัตร"?></span>
                                                        <?php
                                                    } elseif($row["card"] == 'finish'){ // เพิ่มเงื่อนไขเช็คค่า card ว่าเป็น 'finish' หรือไม่
                                                        ?>
                                                        <span class="badge badge-success"><?php echo "รับบัตรเสร็จสิ้น"?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($row["status"] != 'waitng'){ ?>                                                
                                                        <a href="view.php?id_account=<?php echo $row["id_account"]; ?> " class="btn btn-primary"><i class="far fa-folder-open"></i> ดูรายละเอียด</a>                                                        
                                                        <?php if($row["card"] == 'finish'){ ?> <!-- เพิ่มเงื่อนไขเช็คค่า card ว่าเป็น 'bide' หรือไม่ -->
                                                            <button href="finish.php?id_account=<?php echo $row["id_account"]; ?>" class="btn btn-success" disabled><i class="fas fa-solid fa-check">รับบัตรเสร็จสิ้น</i></button>
                                                        <?php } else { ?> <!-- ถ้าไม่ใช่ 'bide' ให้แสดงปุ่มปกติ -->
                                                            <a href="finish.php?id_account=<?php echo $row["id_account"]; ?>" class="btn btn-success"><i class="fas fa-solid fa-check">รับบัตรเสร็จสิ้น</i></a>
                                                        <?php } ?>
                                                    <?php } else { ?>                                                        
                                                        <a href="view.php?id_account=<?php echo $row["id_account"]; ?>" class="btn btn-primary"><i class="far fa-folder-open"></i> ดูรายละเอียด</a>
                                                        <button class="btn btn-success" disabled><i class="fas fa-solid fa-check">รับบัตรเสร็จสิ้น</i></button>
                                                    <?php } ?>                                                                                          
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
            $(document).ready( function () {
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
                    language : {
                "decimal":        "",
                "emptyTable":     "No data available in table",
                "info":           "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                "infoEmpty":      "ไม่พบข้อมูลที่ต้องการ",
                "infoFiltered":   "(filtered from _MAX_ total entries)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "แสดง _MENU_ แถว",
                "loadingRecords": "Loading...",
                "processing":     "",
                "search":         "ค้นหา:",
                "zeroRecords":    "ไม่พบข้อมูลที่ต้องการ",
                "paginate": {                    
                    "next":       "ถัดไป",
                    "previous":   "ก่อนหน้านี้"
                },
                "aria": {
                    "orderable":  "Order by this column",
                    "orderableReverse": "Reverse order this column"
                }
            }
                });
            } );
        </script>     
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