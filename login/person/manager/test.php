<!DOCTYPE html>
<html>
<head>
    <title>Grade System</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Grade System</h2>

<form method="post">
    <label for="student_name">ชื่อของนักเรียน:</label>
    <input type="text" id="student_name" name="student_name" required>
    <br><br>
    <label for="math_grade">เกรดคณิตศาสตร์:</label>
    <input type="text" id="math_grade" name="math_grade" required>
    <br><br>
    <label for="science_grade">เกรดวิทยาศาสตร์:</label>
    <input type="text" id="science_grade" name="science_grade" required>
    <br><br>
    <label for="english_grade">เกรดภาษาอังกฤษ:</label>
    <input type="text" id="english_grade" name="english_grade" required>
    <br><br>
    <input type="submit" name="submit" value="คำนวณเกรด">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ประมวลผลข้อมูลฟอร์ม
    $student_name = htmlspecialchars($_POST['student_name']);
    $math_grade = (float) $_POST['math_grade'];
    $science_grade = (float) $_POST['science_grade'];
    $english_grade = (float) $_POST['english_grade'];

    // คำนวณผลรวมเกรดและเกรดเฉลี่ย
    $total_grade = ($math_grade * 2) + ($science_grade * 2) + ($english_grade * 2);
    $average_grade = $total_grade / 8;

    // แสดงผลลัพธ์
    echo "<h3>ผลลัพธ์สำหรับ $student_name:</h3>";
    echo "<table>
            <tr>
                <th>วิชา</th>
                <th>เกรด</th>
            </tr>
            <tr>
                <td>คณิตศาสตร์</td>
                <td>$math_grade</td>
            </tr>
            <tr>
                <td>วิทยาศาสตร์</td>
                <td>$science_grade</td>
            </tr>
            <tr>
                <td>ภาษาอังกฤษ</td>
                <td>$english_grade</td>
            </tr>
            <tr>
                <th>ผลรวมเกรด</th>
                <td>$total_grade</td>
            </tr>
            <tr>
                <th>เกรดเฉลี่ย</th>
                <td>$average_grade</td>
            </tr>
          </table>";
}
?>

</body>
</html>
