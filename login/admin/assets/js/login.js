// กำหนดเวลาที่คำนวณเป็นมิลลิวินาที (30 นาที)
const timeoutMilliseconds = 30 * 60 * 1000; // 30 นาที

// ตั้งค่าให้ระบบนับเวลาอัตโนมัติ
const timeoutId = setTimeout(() => {
    // เมื่อคำนวณเวลาสิ้นสุดแล้ว ให้เปลี่ยนเส้นทาง URL ไปยังหน้า login
    window.location.href = "../../form_login.php"; // แทนที่ "หน้า login" ด้วย URL ของหน้า login ของคุณ
}, timeoutMilliseconds);

// เพิ่มการตรวจสอบเมื่อมีการกระทำใด ๆ ในหน้าเว็บ เช่น การคลิกปุ่มหรือการเลื่อนเมาส์
document.addEventListener("click", resetTimer);
document.addEventListener("mousemove", resetTimer);

// นับเวลาใหม่เมื่อมีการกระทำใด ๆ
function resetTimer() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => {
        window.location.href = "../../form_login.php"; // แทนที่ "หน้า login" ด้วย URL ของหน้า login ของคุณ
    }, timeoutMilliseconds);
}
