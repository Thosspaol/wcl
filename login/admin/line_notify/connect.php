<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wcl";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // ใช้สำหรับตรวจสอบว่าการเชื่อมต่อสำเร็จ
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
