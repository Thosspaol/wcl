<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$pre = $_POST["pres"];
$first_name= $_POST["firsts"];
$last_name= $_POST["lasts"];
$role_people = $_POST["roles"];
$id = $_POST["ids"];


// ตรวจสอบว่ามีการอัปโหลดไฟล์หรือไม่
if ($_FILES['images']['name']) {
    // ตั้งค่าโฟลเดอร์สำหรับจัดเก็บไฟล์
    $target_dir = "../../../uploads/";
    // ตั้งชื่อไฟล์
    $target_file = $target_dir . basename($_FILES["images"]["name"]);
    // ตรวจสอบชนิดของไฟล์
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // อนุญาตเฉพาะไฟล์รูปภาพ
    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $allowed_types)) {
        if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
            $image = basename($_FILES["images"]["name"]); // ชื่อไฟล์ที่บันทึกลงในฐานข้อมูล
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }
} else {
    // ถ้าไม่ได้อัปโหลดรูปภาพใหม่ ใช้รูปภาพเดิม
    $image = $row["images"];
}



$sql2="UPDATE person SET pres = '$pre',firsts = '$first_name',lasts = '$last_name' , roles = '$role_people',images = '$image'  WHERE ids = $id ";
$result2 = mysqli_query($connect, $sql2);


if ($result2) {
    
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'แก้ไขสำเร็จ!!',
            text: 'WCL',
            icon: 'success',
            timer: 5000,
            showConfirmButton: false
        });
    })
</script>";
header("refresh: 1.5; url=../dashboard/home.php");
} else {
   
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'แก้ไขไม่สำเร็จ!!',
            text: 'WCL',
            icon: 'danger',
            timer: 5000,
            showConfirmButton: false
        });
    })
</script>";
    header("location:../dashboard/home.php");
}
?>