<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

$open_connect = 1;
require('connect.php');

if (isset($_POST['signup'])) {
    $pre = htmlspecialchars($_POST['pre']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $title = htmlspecialchars($_POST['title']); // แก้ไขจาก tile เป็น title
    $apostille = htmlspecialchars($_POST['apostille']);
    $image_url = htmlspecialchars($_POST['image_url']); // เพิ่มช่องกรอก URL รูปภาพ

    try {
        $stmt = $conn->prepare("INSERT INTO system_db(pre, firstname, lastname, title, apostille) VALUES(:pre, :firstname, :lastname, :title, :apostille)");
        $stmt->bindParam(":pre", $pre);
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":apostille", $apostille);
        $stmt->execute();

        $sToken = ["tpjlNvHVx1bN4vyEuQPAleOyBDA9rhSNplF00LjxacU", "EmIaKzUe4sX9j42TN5qACU3o3sckKNnbg6rLGZeycWb", "3vAUW2O2f7gGJwS7tu4dZvmovmeelUDuSEDZ2kq8RrY"];
        $sMessage = "แจ้งเตือนผู้ปกครองทุกคน!\r\n";
        $sMessage .= $pre . " " . $firstname . " " . $lastname . " ได้มีเรื่องแจ้งให้ทราบ!\r\n";
        $sMessage .= "ชื่อเรื่อง: " . $title . "\r\n";
        $sMessage .= "หมายเหตุ: " . $apostille . "\r\n";
        $sMessage .= "โรงเรียนวัดช่องลมธรรมโชติขอขอบพระคุณอย่างยิ่ง\r\n";

        function notify_message($sMessage, $Token, $image_url)
        {
            $chOne = curl_init();
            curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
            curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($chOne, CURLOPT_POST, 1);
            curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage . "&imageThumbnail=" . $image_url . "&imageFullsize=" . $image_url);
            $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $Token,);
            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($chOne);
        }

        foreach ($sToken as $Token) {
            notify_message($sMessage, $Token, $image_url);
        }

        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'สำเร็จ',
                        text: 'ส่งข้อความเรียบร้อยแล้ว'
                    }).then(function() {
                        window.location = 'index.php';
                    });
                });
              </script>";
    } catch (PDOException $e) {
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'ข้อผิดพลาด',
                        text: 'มีบางอย่างผิดพลาด: " . $e->getMessage() . "'
                    }).then(function() {
                        window.location = 'index.php';
                    });
                });
              </script>";
    }
}
?>
