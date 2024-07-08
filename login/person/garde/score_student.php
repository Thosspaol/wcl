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
    $academic_year = $_POST['academic_year'];
    $score = $_POST['score'];
    $mitterm = $_POST['mitterm'];
    $final = $_POST['final'];

    // คำนวณคะแนนรวม
    $totle = $score + $mitterm + $final;

    // คำนวณเกรด
    if ($totle >= 80) {
        $grade = 'A';
        $grade_point = 4.0;
    } elseif ($totle >= 75) {
        $grade = 'B+';
        $grade_point = 3.5;
    } elseif ($totle >= 70) {
        $grade = 'B';
        $grade_point = 3.0;
    } elseif ($totle >= 65) {
        $grade = 'C+';
        $grade_point = 2.5;
    } elseif ($totle >= 60) {
        $grade = 'C';
        $grade_point = 2.0;
    } elseif ($totle >= 55) {
        $grade = 'D+';
        $grade_point = 1.5;
    } elseif ($totle >= 50) {
        $grade = 'D';
        $grade_point = 1.0;
    } else {
        $grade = 'F';
        $grade_point = 0.0;
    }

    // สร้างคำสั่ง SQL สำหรับบันทึกข้อมูลลงในตาราง `grades`
    $sql1 = "INSERT INTO grades (id_account, pre, firstname, lastname, level, subject_id, teacher_name, semester_id, grade, grade_point, academic_year, score, mitterm, final, totle) 
             VALUES ('$id', '$pre', '$firstname', '$lastname', '$level', '$subject_id', '$teacher_name', '$semester_id', '$grade', '$grade_point', '$academic_year', '$score', '$mitterm', '$final', '$totle')";

    // ทำการ execute คำสั่ง SQL
    if (mysqli_query($connect, $sql1)) {
        // ดึงข้อมูลเกรดทั้งหมดของนักเรียน
        $sql2 = "SELECT grade_point FROM grades WHERE id_account = '$id'";
        $result = mysqli_query($connect, $sql2);

        // คำนวณ GPA
        $total_points = 0;
        $total_subjects = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $total_points += $row['grade_point'];
            $total_subjects++;
        }

        if ($total_subjects > 0) {
            $gpa = $total_points / $total_subjects;
        } else {
            $gpa = 0;
        }

        // อัปเดต GPA ในตาราง `account`
        $sql3 = "UPDATE account SET gpa = '$gpa' WHERE id_account = '$id'";
        mysqli_query($connect, $sql3);

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
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($connect);
}
?>
