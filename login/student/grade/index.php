<?php
session_start();
$open_connect = 1;
require('../../connect.php');
$id_account = $_SESSION['id_account'];
$query = "SELECT * FROM grade WHERE id_account = $id_account";
$call_back = mysqli_query($connect, $query);
$row_show = mysqli_fetch_assoc($call_back);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลเกรด</title>
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
    <?php
    // Assume $row is populated with data before this point
    $firstname = htmlspecialchars($row_show['firstname']);
    $lastname = htmlspecialchars($row_show['lastname']);
    $math_grade = htmlspecialchars($row_show['math_grade']);
    $sci_grade = htmlspecialchars($row_show['sci_grade']);
    $eng_grade = htmlspecialchars($row_show['eng_grade']);
    $total_grade = htmlspecialchars($row_show['total_grade']);
    $average_grade = htmlspecialchars($row_show['average_grade']);
    ?>
    <h2>ตารางเกรดของ <?php echo "$firstname $lastname"; ?></h2>
    <table>
        <tr>
            <th>วิชา</th>
            <th>เกรด</th>
        </tr>
        <tr>
            <td>คณิตศาสตร์</td>
            <td><?php echo $math_grade; ?></td>
        </tr>
        <tr>
            <td>วิทยาศาสตร์</td>
            <td><?php echo $sci_grade; ?></td>
        </tr>
        <tr>
            <td>ภาษาอังกฤษ</td>
            <td><?php echo $eng_grade; ?></td>
        </tr>
        <tr>
            <th>ผลรวมเกรด</th>
            <td><?php echo $total_grade; ?></td>
        </tr>
        <tr>
            <th>เกรดเฉลี่ย</th>
            <td><?php echo $average_grade; ?></td>
        </tr>
    </table>
</body>
</html>
