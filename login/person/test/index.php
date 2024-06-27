<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มภาคเรียน</title>
</head>
<body>
    <h1>เพิ่มภาคเรียน</h1>
    <form action="term.php" method="POST">
        <label for="semester_name">ชื่อภาคเรียน:</label>
        <input type="text" id="semester_name" name="semester_name" required><br>

        <label for="start_date">วันเริ่มต้น:</label>
        <input type="date" id="start_date" name="start_date" required><br>

        <label for="end_date">วันสิ้นสุด:</label>
        <input type="date" id="end_date" name="end_date" required><br>

        <input type="submit" value="เพิ่มภาคเรียน">
    </form>
</body>
</html>
