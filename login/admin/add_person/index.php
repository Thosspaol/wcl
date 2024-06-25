<?php
session_start();
$open_connect = 1;
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=wcl", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connect failed:" . $e->getMessage();
}

function translateRole($role) {
    $rolesTranslation = [
        'sci' => 'วิทยาศาสตร์',
        'math' => 'คณิตศาสตร์',
        'thai' => 'ภาษาไทย',
        'society' => 'สังคมศึกษาและวัฒนธรรม',
        'eng' => 'ภาษาต่างประเทศ',
        'art' => 'ศิลปะ',
        'health' => 'สุขศึกษาและพละศึกษา',
        'career' => 'การงานอาชีพ',
        'activity' => 'กิจกรรมพัฒนาผู้เรียน'
    ];
    return isset($rolesTranslation[$role]) ? $rolesTranslation[$role] : $role;
}

$stmt = $conn->query("SELECT * FROM person");
$stmt->execute();
$rows = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager | Watchonglom</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
                                    <h3 class="card-title" style="line-height:2.1 rem;">ประกาศข่าวสาร</h3>
                                    <a href="add_person.php" class="btn btn-success float-right"><i class="fas fa-plus"></i> เพิ่มบุคลากรกลุ่มสาระ</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered" id="Table" style="width:100%">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th scope="col">ลำดับที่</th>
                                                <th scope="col">คำนำหน้า</th>
                                                <th scope="col">ชื่อ</th>
                                                <th scope="col">นามสกุล</th>
                                                <th scope="col">กลุ่มสาระการเรียนรู้</th>
                                                <th scope="col">รูปภาพ</th>
                                                <th scope="col">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 1;
                                            foreach ($rows as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $index++; ?></td>
                                                    <td><?php echo $row['pres'] ?></td>
                                                    <td><?php echo $row['firsts'] ?></td>
                                                    <td><?php echo $row['lasts'] ?></td>
                                                    <td><?php echo translateRole($row['roles']) ?></td>
                                                    <td><img src="../../../uploads/<?php echo $row['images'] ?>" style="width: 100px; height: auto;"></td>
                                                    <td>
                                                        <a href="edit_person.php?ids=<?php echo $row['ids']; ?>" class="btn btn-warning"><i class="far fa-folder-open"></i> แก้ไขข้อมูล</a>
                                                        <a href="delete_person.php?ids=<?php echo $row['ids']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
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

    <!-- เรียกใช้ jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- เรียกใช้ DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Table').DataTable({
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                pageLength: 10,
                lengthChange: true,
                lengthMenu: [
                    [10, 20, -1],
                    [10, 20, "ทั้งหมด"]
                ],
                searching: true,
                ordering: true,
                paging: true,
                language: {
                    "decimal": "",
                    "emptyTable": "ไม่มีข้อมูลในตาราง",
                    "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                    "infoEmpty": "ไม่พบข้อมูลที่ต้องการ",
                    "infoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
                    "loadingRecords": "กำลังโหลดข้อมูล...",
                    "processing": "กำลังประมวลผล...",
                    "search": "ค้นหา:",
                    "zeroRecords": "ไม่พบข้อมูลที่ตรงกับการค้นหา",
                    "paginate": {
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้า"
                    },
                    "aria": {
                        "sortAscending": ": เรียงจากน้อยไปมาก",
                        "sortDescending": ": เรียงจากมากไปน้อย"
                    }
                }
            });
        });
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
