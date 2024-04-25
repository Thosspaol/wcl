<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="d.css">
  <script src="dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <div class="login-box">
    <h2>ลงทะเบียน</h2>
    <form action="data.php" method="post">
    <div class="user-box">
        <input type="text" name="ID_code" required>
        <label>รหัสนักเรียน</label>
      </div>
      <div class="user-box">
        <input type="text" name="name" required>
        <label>ชื่อ</label>
      </div>
      <div class="user-box">
        <input type="text" name="lastname" required>
        <label>นามสกุล</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required>
        <label>รหัสผ่าน</label>
      </div>
      <div class="class-box">
        <select name="class" class="form-select">
          <option value="0">ระดับชั้น</option>
          <option value="1">ป.1</option>
          <option value="2">ป.2</option>
          <option value="4">ป.3</option>
          <option value="4">ป.4</option>
          <option value="4">ป.5</option>
          <option value="4">ป.6</option>
        </select>
      </div>
      <input class="a" type="submit" value="เสร็จสิ้น">
      <a  class="b btn-right" href="login.php">
        ย้อนกลับ
      </a>
    </form>
  </div>

</body>

</html>
<?php 
if (isset($_SESSION['success'])){?>
<script>
Swal.fire({
  icon:'success',
  title:'สำเร็จ',
  text:'<?php echo $_SESSION['success'] ?>',
})
</script>

<?php
unset($_SESSION['success']);
}
?>
