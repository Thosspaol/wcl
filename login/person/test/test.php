<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wcl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert example students
$students = [
    ['สมชาย สมหมาย', 'ม.6', '12345'],
    ['สมหญิง สมศรี', 'ม.5', '67890']
];

foreach ($students as $student) {
    $stmt = $conn->prepare("INSERT INTO students (student_name, student_class, student_number) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $student[0], $student[1], $student[2]);
    $stmt->execute();
    $stmt->close();
}

// Insert example subjects
$subjects = [
    ['คณิตศาสตร์', 'MATH101'],
    ['วิทยาศาสตร์', 'SCI101']
];

foreach ($subjects as $subject) {
    $stmt = $conn->prepare("INSERT INTO subjects (subject_name, subject_code) VALUES (?, ?)");
    $stmt->bind_param("ss", $subject[0], $subject[1]);
    $stmt->execute();
    $stmt->close();
}

// Insert example semesters
$semesters = [
    ['ภาคเรียนที่ 1/2564', '2023-05-01', '2023-10-31'],
    ['ภาคเรียนที่ 2/2564', '2023-11-01', '2024-04-30']
];

foreach ($semesters as $semester) {
    $stmt = $conn->prepare("INSERT INTO semesters (semester_name, start_date, end_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $semester[0], $semester[1], $semester[2]);
    $stmt->execute();
    $stmt->close();
}

// Insert example grades
$grades = [
    ['A', 4.00],
    ['B+', 3.50],
    ['B', 3.00],
    ['C+', 2.50],
    ['C', 2.00],
    ['D+', 1.50],
    ['D', 1.00],
    ['F', 0.00]
];

foreach ($grades as $grade) {
    $stmt = $conn->prepare("INSERT INTO grades (grade_name, grade_point) VALUES (?, ?)");
    $stmt->bind_param("sd", $grade[0], $grade[1]);
    $stmt->execute();
    $stmt->close();
}

// Insert example student grades
$student_grades = [
    [1, 1, 1, 1], // สมชาย สมหมาย, คณิตศาสตร์, ภาคเรียนที่ 1/2564, A
    [2, 2, 2, 3]  // สมหญิง สมศรี, วิทยาศาสตร์, ภาคเรียนที่ 2/2564, B
];

foreach ($student_grades as $student_grade) {
    $stmt = $conn->prepare("INSERT INTO student_grades (student_id, subject_id, semester_id, grade_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiii", $student_grade[0], $student_grade[1], $student_grade[2], $student_grade[3]);
    $stmt->execute();
    $stmt->close();
}

echo "ข้อมูลตัวอย่างถูกเพิ่มลงในฐานข้อมูลเรียบร้อยแล้ว";

$conn->close();
?>
