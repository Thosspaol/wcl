<?php

session_start();
require_once("config.php");

if (isset($_POST['signup'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $c_password = htmlspecialchars($_POST['c_password']);
    $urole = 'user';

    if (empty($firstname)) {
        $_SESSION["error"] = "กรุณากรอกชื่อ!";
        header("location: register.php");
        exit();
    } else if (empty($lastname)) {
        $_SESSION["error"] = "กรุณากรอกนามสกุล!";
        header("location: register.php");
        exit();
    } else if (empty($email)) {
        $_SESSION["error"] = "กรุณากรอกอีเมล!";
        header("location: register.php");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "อีเมลไม่ถูกต้อง!";
        header("location: register.php");
        exit();
    } else if (empty($password)) {
        $_SESSION["error"] = "กรุณากรอกรหัสผ่าน!";
        header("location: register.php");
        exit();
    } else if (strlen($password) > 20 || strlen($password) < 5) {
        $_SESSION["error"] = "รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร!";
        header("location: register.php");
        exit();
    } else if (empty($c_password)) {
        $_SESSION["error"] = "กรุณายืนยันรหัสผ่าน!";
        header("location: register.php");
        exit();
    } else if ($password != $c_password) {
        $_SESSION["error"] = "รหัสผ่านไม่ตรงกัน!";
        header("location: register.php");
        exit();
    } else {
        try {
            $check_email = $conn->prepare("SELECT email FROM system_db WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if ($row && $row['email'] == $email) {
                $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='login.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                header("location: register.php");
                exit();
            } else if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO system_db(firstname, lastname, email, password, urole) VALUES(:firstname, :lastname, :email, :password, :urole)");
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":urole", $urole);
                $stmt->execute();

                $sToken = ["tpjlNvHVx1bN4vyEuQPAleOyBDA9rhSNplF00LjxacU", "EmIaKzUe4sX9j42TN5qACU3o3sckKNnbg6rLGZeycWb", "3vAUW2O2f7gGJwS7tu4dZvmovmeelUDuSEDZ2kq8RrY"];
                $sMessage = "แจ้งเตือนการสมัครสมาชิก!\r\n";
                $sMessage .= $firstname . " " . $lastname . " ได้ทำการสมัครสมาชิก!\r\n";
                $sMessage .= "Full Name: " . $firstname . " " . $lastname . " \r\n";
                $sMessage .= "Email: " . $email . " \r\n";

                function notify_message($sMessage, $Token)
                {
                    $chOne = curl_init();
                    curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                    curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($chOne, CURLOPT_POST, 1);
                    curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
                    $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $Token,);
                    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                    $result = curl_exec($chOne);

                    if (curl_error($chOne)) {
                        echo 'error:' . curl_error($chOne);
                    } else {
                        $result_ = json_decode($result, true);
                        echo "status : " . $result_['status'];
                        echo "message : " . $result_['message'];
                    }
                    curl_close($chOne);
                }

                foreach ($sToken as $Token) {
                    notify_message($sMessage, $Token);
                }

                $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว <a href='login.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                header("location: register.php");
                exit();
            } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: register.php");
                exit();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
