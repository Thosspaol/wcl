<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
$open_connect = 1;
require('connect.php');


if (!empty($_POST['birthday']) and !empty($_POST['password_account'])) {
    $birthday = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['birthday']));
    $password_account = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password_account']));
    
    // ค้นหาข้อมูลผู้ใช้จากฐานข้อมูล
    $query_check_account = "SELECT * FROM account WHERE birthday = '$birthday'and password_account='$password_account'";
    $call_back_check_account = mysqli_query($connect, $query_check_account);
    
    if(mysqli_num_rows($call_back_check_account) == 1){
        $result_check_account = mysqli_fetch_assoc($call_back_check_account);
        $stored_hash = $result_check_account['password_account'];
        //t1
        if($result_check_account['role_account'] == 'person'){
            $_SESSION['id_account']=$result_check_account['id_account'];
            $_SESSION['role_account']='person';
            // กระโดดไปยังหน้าของผู้ใช้ที่ล็อกอินแล้ว
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'เข้าสู่ระบบสำเร็จ!!',
                        text: 'SENATE',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                })
            </script>";
            header("refresh:1.5; url=person/dashboard/home.php");   
        } elseif($result_check_account['role_account'] == 'admin'){
            $_SESSION['id_account']=$result_check_account['id_account'];
            $_SESSION['role_account']='admin';
            // กระโดดไปยังหน้าของผู้ดูแลระบบที่ล็อกอินแล้ว
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'เข้าสู่ระบบสำเร็จ!!',
                    text: 'SENATE',
                    icon: 'success',
                    timer: 5000,
                    showConfirmButton: false
                });
            })
        </script>";
        header("refresh:1.5; url=admin/dashboard/home.php");   
        } elseif($result_check_account['$role_account' == 'student']){
            $_SESSION['id_account'] = $result_check_account['$id_account'];
            $_SESSION['$role_account'] ='student';
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'เข้าสู่ระบบสำเร็จ!!',
                    text: 'SENATE',
                    icon: 'success',
                    timer: 5000,
                    showConfirmButton: false
                });
            })
        </script>";
        header("refresh:1.5; url=admin/dashboard/home.php");   
        }
        //t1
        // ทำการเปรียบเทียบรหัสผ่านที่ผู้ใช้ป้อนกับรหัสผ่านที่ถูกเก็บไว้ในฐานข้อมูล
        
    } else {
        // หากไม่พบอีเมลในฐานข้อมูล แสดงข้อความแจ้งเตือนและเปลี่ยนเส้นทางไปยังหน้าลงทะเบียนอีกครั้ง
        echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'วัน/เดือน/ปีเกิดหรือรหัสผ่านไม่ถูกต้อง!!',
                    text: 'SENATE',
                    icon: 'error',
                    timer: 5000,
                    showConfirmButton: false
                });
            });
            setTimeout(function(){
                window.location.href = 'form_login.php';
            }, 2500);
            </script>";
    }
} else {
    // หากไม่มีการป้อนอีเมลหรือรหัสผ่าน กลับไปยังหน้าล็อกอิน
    die(header('Location:form_login.php'));
}

?>
