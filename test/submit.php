<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$title = $_POST['title'];
$message = $_POST['message'];
$image = "";

// ตรวจสอบว่ามีการอัปโหลดรูปภาพหรือไม่
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "uploads/";
    // สร้างโฟลเดอร์ uploads หากยังไม่มี
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ตรวจสอบไฟล์ว่าเป็นรูปภาพหรือไม่
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = basename($_FILES["image"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}

// บันทึกข้อมูลลงในตาราง
$sql = "INSERT INTO announcements (title, message, image) VALUES ('$title', '$message', '$image')";

if ($conn->query($sql) === TRUE) {
    echo "ประกาศข่าวถูกบันทึกเรียบร้อยแล้ว";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// กลับไปยังหน้าแรก
header("Location: index.php");
exit;
?>
