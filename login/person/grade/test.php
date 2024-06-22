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
    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" required>
    <br><br>
    <label for="math_grade">Math Grade:</label>
    <input type="text" id="math_grade" name="math_grade" required>
    <br><br>
    <label for="science_grade">Science Grade:</label>
    <input type="text" id="science_grade" name="science_grade" required>
    <br><br>
    <label for="english_grade">English Grade:</label>
    <input type="text" id="english_grade" name="english_grade" required>
    <br><br>
    <input type="submit" name="submit" value="Calculate Grades">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $student_name = htmlspecialchars($_POST['student_name']);
    $math_grade = (float) $_POST['math_grade'];
    $science_grade = (float) $_POST['science_grade'];
    $english_grade = (float) $_POST['english_grade'];

    // Calculate total grade and average
    $total_grade = $math_grade + $science_grade + $english_grade;
    $average_grade = $total_grade / 3;

    // Determine letter grade based on average
    if ($average_grade >= 90) {
        $letter_grade = 'A';
    } elseif ($average_grade >= 80) {
        $letter_grade = 'B';
    } elseif ($average_grade >= 70) {
        $letter_grade = 'C';
    } elseif ($average_grade >= 60) {
        $letter_grade = 'D';
    } else {
        $letter_grade = 'F';
    }

    // Display results
    echo "<h3>Results for $student_name:</h3>";
    echo "<table>
            <tr>
                <th>Subject</th>
                <th>Grade</th>
            </tr>
            <tr>
                <td>Math</td>
                <td>$math_grade</td>
            </tr>
            <tr>
                <td>Science</td>
                <td>$science_grade</td>
            </tr>
            <tr>
                <td>English</td>
                <td>$english_grade</td>
            </tr>
            <tr>
                <th>Total Grade</th>
                <td>$total_grade</td>
            </tr>
            <tr>
                <th>Average Grade</th>
                <td>$average_grade</td>
            </tr>
            <tr>
                <th>Letter Grade</th>
                <td>$letter_grade</td>
            </tr>
          </table>";
}
?>

</body>
</html>
