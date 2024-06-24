<?php
if (isset($_GET['file'])) {
    $file = urldecode($_GET['file']);
    $filepath = "uploads/" . $file;

    // ตรวจสอบว่าไฟล์มีอยู่จริง
    if (file_exists($filepath)) {
        // ตั้งค่า headers สำหรับการดาวน์โหลดไฟล์
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "No file specified.";
}
?>
