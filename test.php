<?php
$servername = "localhost"; // หรือชื่อโฮสต์ของคุณ
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านฐานข้อมูล
$dbname = "wcl"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ดึงข้อมูลจากตาราง people
$sql = "SELECT role_account, COUNT(*) as count FROM account GROUP BY role_account";
$result = $conn->query($sql);

$roleCount = [
    'student' => 0,
    'teacher' => 0,
];

if ($result->num_rows > 0) {
    // เก็บจำนวนในแต่ละประเภท
    while($row = $result->fetch_assoc()) {
        $roleCount[$row['role_account']] = $row['count'];
    }
} else {
    echo "ไม่มีข้อมูล";
}

// แสดงผลจำนวนคนแต่ละประเภท
echo "จำนวนนักเรียน: " . $roleCount['student'] . "<br>";
echo "จำนวนอาจารย์: " . $roleCount['person'] . "<br>";
echo "ทั้งหมด" . $roleCount['student'] + $roleCount['person'] + $roleCount['admin'] ."<br>";

$conn->close();
?>
