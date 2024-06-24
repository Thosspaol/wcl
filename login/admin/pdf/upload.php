<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        if ($fileExtension === 'pdf') {
            $target_url = 'http://localhost/wcl/login/student/pdf/save_pdf.php'; // เปลี่ยน URL นี้ให้เป็น URL ของคุณ

            $cfile = new CURLFile($fileTmpPath, 'application/pdf', $fileName);
            $uploadTime = date("Y-m-d H:i:s"); // ดึงเวลาปัจจุบัน

            $post_data = array(
                'file' => $cfile,
                'upload_time' => $uploadTime
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $target_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            } else if ($http_code == 200) {
                echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'บันทึกสำเร็จ!!',
                        text: 'SENATE',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                })
            </script>";
                header("refresh:2.5; url=index.php");
            } else {
                echo "Error: Failed to upload file. Server responded with status code $http_code.";
            }

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
