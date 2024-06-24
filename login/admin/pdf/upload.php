<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ตรวจสอบว่าไฟล์ถูกอัพโหลดหรือไม่
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // ตรวจสอบว่าเป็นไฟล์ PDF
        if ($fileExtension === 'pdf') {
            // URL ของเว็บที่ต้องการส่งไฟล์ไป
            $target_url = 'http://localhost/wcl/login/student/pdf/save_pdf.php'; // เปลี่ยน URL นี้ให้เป็น URL ของคุณ

            // เปิดไฟล์ PDF
            $cfile = new CURLFile($fileTmpPath, 'application/pdf', $fileName);

            // ดึงเวลาปัจจุบัน
            $uploadTime = date("Y-m-d");

            // สร้าง array สำหรับข้อมูลที่จะส่ง
            $post_data = array(
                'file' => $cfile,
                'upload_time' => $uploadTime
            );

            // เริ่มต้น cURL session
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $target_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // ส่งคำขอและเก็บผลลัพธ์
            $response = curl_exec($ch);

            // ตรวจสอบข้อผิดพลาด
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            } else {
                echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ส่งสำเร็จ!!',
                        text: 'WCL',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                });
                </script>";
                header("refresh:2; url=../dashboard/home.php");
            }

            // ปิด cURL session
            curl_close($ch);
        } else {
            echo 'Error: Only PDF files are allowed.';
        }
    } else {
        echo 'Error: There was an issue with your file upload.';
    }
} else {
    echo 'Invalid request method.';
}
?>
