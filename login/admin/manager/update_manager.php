<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$pre = $_POST["pre"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$id_card = $_POST["id_card"];
$email_account = $_POST["email_account"];
$role_account = $_POST["role_account"];
$id_account = $_POST["id_account"];
$images_account = $_POST["images_account"];




$sql2="UPDATE account SET pre = '$pre',firstname = '$firstname',lastname = '$lastname',id_card = '$id_card',email_account = '$email_account',role_account = '$role_account',images_account = '$images_account' WHERE id_account = $id_account ";
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