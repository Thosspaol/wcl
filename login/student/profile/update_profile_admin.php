<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$pre = $_POST["pre"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$birthday = $_POST["birthday"];
$password_account = $_POST["password_account"];
$role_account = $_POST["role_account"];
$id_account = $_POST["id_account"];

$photo =$_FILES["images_account"]["name"];
$fileSize =$_FILES["images_account"]["size"];
$tmpName =$_FILES["images_account"]["tmp_name"];

$validImageExtension = ['jpg','jpeg','png'];
$imageExtension = explode('.',$photo);
$imageExtension = strtolower(end($imageExtension));


$newImageName = uniqid();
$newImageName .='.'. $imageExtension;

if (move_uploaded_file($tmpName,'../../images_account/'.$photo)){
    
}else {
    echo "Sorry, there was an error uploading your file.";
}



$sql2="UPDATE account SET pre = '$pre',firstname = '$firstname',lastname = '$lastname',birthday = '$birthday',password_account = '$password_account',role_account = '$role_account',images_account = '$photo' WHERE id_account = $id_account ";
$result2 = mysqli_query($connect, $sql2);


if ($result2) {
    
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'แก้ไขสำเร็จ!!',
            text: 'SENATE',
            icon: 'success',
            timer: 5000,
            showConfirmButton: false
        });
    })
</script>";
header("refresh:1.5; url=../dashboard/home.php");
} else {
   
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'แก้ไขไม่สำเร็จ!!',
            text: 'SENATE',
            icon: 'danger',
            timer: 5000,
            showConfirmButton: false
        });
    })
</script>";
    header("location:../dashboard/home.php");
}
?>