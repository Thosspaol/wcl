<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
$open_connect = 1;
require('../../connect.php');

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_account'];
    $pre = $_POST['pre'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];  
    $level = $_POST['level']; 
    $subject_id = $_POST['subject_id']; 
    $teacher_name = $_POST['teacher_name']; 
    $semester_id = $_POST['semester_id']; 
    $grade = $_POST['grade'];

    // คำนวณเกรด
    if ($grade >= 80) {
        $grade_point = 4.0;
    } elseif ($grade >= 75) {
        $grade_point = 3.5;
    } elseif ($grade >= 70) {
        $grade_point = 3.0;
    } elseif ($grade >= 65) {
        $grade_point = 2.5;
    } elseif ($grade >= 60) {
        $grade_point = 2.0;
    } elseif ($grade >= 55) {
        $grade_point = 1.5;
    } elseif ($grade >= 50) {
        $grade_point = 1.0;
    } else {
        $grade_point = 0.0;
    }

    // สร้างคำสั่ง SQL สำหรับบันทึกข้อมูลลงในตาราง `grades`
    $sql1 = "INSERT INTO grades (id_account, pre, firstname, lastname, level, subject_id, teacher_name, semester_id, grade, grade_point) 
             VALUES ('$id', '$pre', '$firstname', '$lastname', '$level', '$subject_id', '$teacher_name', '$semester_id', '$grade', '$grade_point')";

    // สร้างคำสั่ง SQL สำหรับบันทึกข้อมูลลงในตารางที่สอง `second_table`
    $sql2 = "INSERT INTO second_table (id_account, pre, firstname, lastname, level, subject_id, teacher_name, semester_id, grade, grade_point) 
             VALUES ('$id', '$pre', '$firstname', '$lastname', '$level', '$subject_id', '$teacher_name', '$semester_id', '$grade', '$grade_point')";

    // ทำการ execute คำสั่ง SQL
    if (mysqli_query($connect, $sql1) && mysqli_query($connect, $sql2)) {
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
        header("refresh:2; url=../dashboard/home.php");
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($connect);
        echo "Error: " . $sql2 . "<br>" . mysqli_error($connect);
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($connect);
}
?>
