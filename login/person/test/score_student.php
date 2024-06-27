<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $semester_id = $_POST['semester_id'];  // ภาคเรียน
    $grade = $_POST['grade'];

    $sql = "INSERT INTO grades (student_id, subject_id, semester_id, grade) VALUES ('$student_id', '$subject_id', '$semester_id', '$grade')";

    if (mysqli_query($conn, $sql)) {
        echo "Grade added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
