<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$pre = $_POST['pre'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$role_people = $_POST['role_people'];
$image = "";

// ตรวจสอบว่ามีการอัปโหลดรูปภาพหรือไม่
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "../../../uploads/";
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
$sql = "INSERT INTO manager (pre, first_name, last_name, role_people, image) VALUES ('$pre', '$first_name', '$last_name', '$role_people', '$image')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'บันทึกสำเร็จ!!',
                    text: 'WCL',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                }).then(function() {
                    window.location.href = 'index.php'; // หลังจากแสดง SweetAlert2 แล้วให้ redirect ไปที่หน้า index.php
                });
            });
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
