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
        $academic_year = $_POST['academic_year'];

        $sql = "INSERT INTO semesters (id_account, pre, firstname, lastname, level, semester_name, start_date, end_date ,academic_year) VALUES ('$id_account', '$pre', '$firstname', '$lastname', '$level', '$semester_name', '$start_date', '$end_date','$academic_year')";

        if (mysqli_query($conn, $sql)) {
            // ดึง id ที่เพิ่มล่าสุด
            $last_id = mysqli_insert_id($conn);
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
            // ใช้ JavaScript เพื่อทำการ redirect หลังจากแสดง SweetAlert พร้อมกับส่งค่า id
            echo "<script>
            setTimeout(function() {
                window.location.href = 'score.php?id=$last_id';
            }, 2000);
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
