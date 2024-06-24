<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && isset($_POST['upload_time'])) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $uploadTime = $_POST['upload_time'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($fileName);

        if (move_uploaded_file($fileTmpPath, $target_file)) {
            // เปิดหรือสร้างไฟล์ uploads.log เพื่อบันทึกข้อมูล
            $log = fopen($target_dir . 'uploads.log', 'a');
            if ($log) {
                // บันทึกชื่อไฟล์และเวลาที่อัปโหลดลงในไฟล์ uploads.log
                fwrite($log, basename($fileName) . " - " . $uploadTime . "\n");
                fclose($log);
            } else {
                echo "Error: Unable to open log file.";
            }

            echo "The file has been uploaded successfully.";
        } else {
            echo "Error: There was an issue moving the uploaded file.";
        }
    } else {
        echo "Error: File or upload time not set.";
    }
} else {
    echo "Invalid request method.";
}
?>
