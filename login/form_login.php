<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="admin/assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="32x32" href="admin/assets/img/favicons/senate.png">
    <link rel="icon" type="image/png" sizes="16x16" href="admin/assets/img/favicons/senate.png">
    <link rel="manifest" href="admin/assets/img/favicons/senate.png">
    <link rel="mask-icon" href="admin/assets/img/favicons/senate.png" color="#5bbad5">
    <link rel="shortcut icon" href="admin/assets/img/favicons/senate.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="admin/assets/img/favicons/senate.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  
    <title>โรงเรียนวัดช่องลมธรรมโชติ</title>
</head>
<body>
    <div class="bg"></div>
    <div class="b"></div>
    <div class="a"></div>
    <div class="container h-100">
        <div class="row justify-content-center align-item-center h-100">
            <div class="col-md-6">
                <div class="card shadow p-3">
                    <div class="card-header">
                        <h3 class="text-center font-weight-bold">เข้าสู่ระบบ</h3>
                    </div>
                    <div class="card-body">
                        <form action="process_login.php" method="POST">
                            <div class="form-group">
                                <label for="id_account">วันเ/เดือน/ปีเกิด <font style="color: red; margin-left: 1px">ตัวอย่าง 07072544 *</font></label>
                                <input class="form-control" name="birthday" type="text" placeholder="วัน/เดือน/ปีเกิด" required>
                            </div>
                            <div class="form-group">
                                <label for="password_account">รหัสผ่าน <font style="color: red; margin-left: 1px">*</font></label>
                                <div class="input-group">
                                    <input class="form-control" name="password_account" id="password" type="password" placeholder="รหัสผ่าน" required>
                                    <span class="input-group-text" id="togglePassword">
                                        <i class="fas fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><i class='fas fa-sign-in-alt'></i> เข้าสู่ระบบ</button><br>
                        </form>      
                       <p>หากไม่มีข้อมูลโปรดติดต่อเจ้าหน้าที่ <a href="../index.php">ย้อนกลับ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#togglePassword").click(function() {
                var passwordField = $("#password");
                var passwordFieldType = passwordField.attr("type");
                if (passwordFieldType == "password") {
                    passwordField.attr("type", "text");
                    $(this).html('<i class="fas fa-eye"></i>');
                } else {
                    passwordField.attr("type", "password");
                    $(this).html('<i class="fas fa-eye-slash"></i>');
                }
            });
        });
    </script>
</body>
</html>
