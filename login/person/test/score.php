<?php
session_start();
$open_connect = 1;
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=wcl", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connect failed:" . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มคะแนน</title>
</head>
<body>
    <h1>เพิ่มคะแนน</h1>
    <form action="score_student.php" method="POST">
        <label for="student_id">รหัสนักเรียน:</label>
        <input type="text" id="student_id" name="student_id" required><br>

        <label for="subject_id">รหัสวิชา:</label>
        <input type="text" id="subject_id" name="subject_id" required><br>

        <label for="semester_id">ภาคเรียน:</label>
        <select id="semester_id" name="semester_id" required>
            <?php           
            $stmt = $conn->prepare("SELECT id, semester_name FROM semesters");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['id'] . "'>" . $row['semester_name'] . "</option>";
            }
            ?>
        </select><br>

        <label for="grade">คะแนน:</label>
        <input type="text" id="grade" name="grade" required><br>

        <input type="submit" value="เพิ่มคะแนน">
    </form>
</body>
</html>
