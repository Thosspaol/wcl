<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'wcl');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    $id_account = $_POST['id_account'];
    $pre = $_POST['pre'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $level = $_POST["level"];
    $semester_name = $_POST['semester_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO semesters (id_account, pre, firstname, lastname, level, semester_name, start_date, end_date) VALUES ('$id_account', '$pre', '$firstname', '$lastname', '$level', '$semester_name', '$start_date', '$end_date')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'บันทึกสำเร็จ!!',
                text: 'SENATE',
                icon: 'success',
                timer: 1000,
                showConfirmButton: false
            });
        });
        </script>";
        // ใช้ JavaScript เพื่อทำการ redirect หลังจากแสดง SweetAlert
        echo "<script>
        setTimeout(function() {
            window.location.href = 'score.php?id_account=$id_account';
        }, 2000);
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
