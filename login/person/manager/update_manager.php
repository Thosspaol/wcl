<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
$open_connect = 1;
require('../../connect.php'); // ตรวจสอบให้แน่ใจว่าไฟล์นี้มีอยู่และเชื่อมต่อฐานข้อมูลอย่างถูกต้อง

$id_account = $_POST["id_account"];
$pre = $_POST["pre"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$level = $_POST["level"];

$math_grade = (float) $_POST['math_grade'];
$additional_grade = (float) $_POST['additional_grade'];
$sci_grade = (float) $_POST['sci_grade'];

$eng_grade = (float) $_POST['eng_grade'];
$thai_grade = (float) $_POST['thai_grade'];
$society_grade = (float) $_POST['society_grade'];

$health_grade = (float) $_POST['health_grade'];
$music_grade = (float) $_POST['music_grade'];
$history_grade = (float) $_POST['history_grade'];

$art_grade = (float) $_POST['art_grade'];
$technology_grade = (float) $_POST['technology_grade'];
$career_grade = (float) $_POST['career_grade'];

$physical_grade = (float) $_POST['physical_grade'];
$civic_grade = (float) $_POST['civic_grade'];
$farm_grade = (float) $_POST['farm_grade'];

$total_grade = ($math_grade * 2) + ($additional_grade * 2) + ($sci_grade * 2) + ($eng_grade * 2) + ($thai_grade * 2) + 
($society_grade * 2) + ($health_grade * 2) + ($music_grade * 2) + ($history_grade * 2) + ($art_grade * 2) + ($technology_grade * 2) + ($career_grade * 2) +
($physical_grade * 2) + ($civic_grade * 2) + ($farm_grade * 2);
$average_grade = $total_grade / 28;

$sql = "INSERT INTO grade (id_account, pre, firstname, lastname, level, math_grade, additional_grade, sci_grade, eng_grade, thai_grade, society_grade, health_grade, music_grade, history_grade, art_grade, technology_grade, career_grade, physical_grade, civic_grade, farm_grade, total_grade, average_grade)
VALUES ('$id_account','$pre','$firstname','$lastname','$level', '$math_grade', '$additional_grade', '$sci_grade', '$eng_grade', '$thai_grade','$society_grade' , '$health_grade', '$music_grade','$history_grade' ,'$art_grade' , '$technology_grade','$career_grade' ,'$physical_grade','$civic_grade','$farm_grade', '$total_grade', '$average_grade')";

$result2 = mysqli_query($connect, $sql);

if ($result2) {
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'บันทึกสำเร็จ!!',
            text: 'SENATE',
            icon: 'success',
            timer: 5000,
            showConfirmButton: false
        });
    });
    </script>";
    header("refresh:5; url=../dashboard/home.php");
} else {
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'บันทึกไม่สำเร็จ!!',
            text: 'SENATE',
            icon: 'error',
            timer: 5000,
            showConfirmButton: false
        });
    });
    </script>";
    header("refresh:1.5; url=../dashboard/home.php");
}
?>
