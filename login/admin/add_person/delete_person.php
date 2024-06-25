<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
$open_connect = 1 ;
require('../../connect.php');
$id = $_GET["ids"];
$sql = "DELETE FROM person WHERE ids = $id";
$result = mysqli_query($connect ,$sql);

if($result){
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'ลบข้อมูลสำเร็จแล้ว!!',
            text: 'SENATE',
            icon: 'success',
            timer: 5000,
            showConfirmButton: false
        });
    })
</script>";
header("refresh:1.5; url=../dashboard/home.php");
} else {
header("location: ../dashboard/home.php");
}