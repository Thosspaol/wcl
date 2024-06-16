<?php
// การเชื่อมต่อฐานข้อมูล
$servername = "localhost"; // ชื่อเซิร์ฟเวอร์ฐานข้อมูล
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านฐานข้อมูล
$dbname = "wcl"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// สร้างคำสั่ง SQL สำหรับดึงข้อมูลตารางสอน
$sql = "SELECT * FROM tbl_schedule";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ตารางสอน | Watchonglom</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <style type="text/css">
        .schedule-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .schedule-table th,
        .schedule-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .schedule-table th {
            background-color: #f2f2f2;
        }

        .schedule-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5">ตารางสอน</h2>
        <table class="table schedule-table">
            <thead>
                <tr>
                    <th>วิชา</th>
                    <th>วันที่เริ่มสอน</th>
                    <th>วันที่สิ้นสุดการสอน</th>
                    <th>เวลาเริ่มสอน</th>
                    <th>เวลาสิ้นสุดการสอน</th>
                    <th>รอบการสอน</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['schedule_title'] . "</td>";
                        echo "<td>" . $row['schedule_startdate'] . "</td>";
                        echo "<td>" . $row['schedule_enddate'] . "</td>";
                        echo "<td>" . $row['schedule_starttime'] . "</td>";
                        echo "<td>" . $row['schedule_endtime'] . "</td>";
                        // แปลงรอบการสอนจากเลขเป็นชื่อวัน
                        $repeat_day = str_replace(["1", "2", "3", "4" ,"5"], ["จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์"], $row['schedule_repeatday']);
                        echo "<td>" . $repeat_day . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>ไม่พบข้อมูลตารางสอน</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
