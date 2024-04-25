<?php 
/**
 **** AppzStory Admin Ajax ****
 * 
 * @link https://appzstory.dev
 * @author Yothin Sapsamran (Jame AppzStory Studio)
 */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Watchonglom Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/โลโก้วัดช่องลม (1).png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/โลโก้วัดช่องลม (1).png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/โลโก้วัดช่องลม (1).png">
  <link rel="manifest" href="assets/img/favicons/โลโก้วัดช่องลม (1).png">
  <link rel="mask-icon" href="assets/img/favicons/โลโก้วัดช่องลม (1).png" color="#5bbad5">
  <link rel="shortcut icon" href="assets/img/favicons/โลโก้วัดช่องลม (1).png">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="assets/img/favicons/โลโก้วัดช่องลม (1).png">
  <meta name="theme-color" content="#ffffff">

  <!-- stylesheet -->
  <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="bg"></div>
<div class="container h-100">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-md-6">
      <div class="card shadow p-3">
        <div class="card-header"> 
          <h3 class="text-center font-weight-bold"> เข้าสู่ระบบ </h3>
        </div>
        <div class="card-body">
          <form id="formData">
            <div class="form-group">
              <label for="username">ชื่อผู้ใช้งาน</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="username">
            </div>

            <div class="form-group">
              <label for="password">รหัสผ่าน</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="password">
            </div>

            <button name="submit" class="btn btn-primary btn-block" type="submit" name="LoginBT" id="LoginBT"> เข้าสู่ระบบ</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPTS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>

<script>
  $(document).ready(function(){
    /**
     * Form Login Ajax
     */
    $("#formData").submit(function(e){
      e.preventDefault()
      $.ajax({  
        type: "POST",  
        url: "../service/login.php",  
        data: $('#formData').serialize()
      }).done(function(resp) {
        /**
         * Authentication...
         */
        toastr.success('เข้าสู่ระบบเรียบร้อย')
        setTimeout(() => {
          window.location.href = 'pages/dashboard'
        }, 800)
      })
    })

  })
</script>

</body>
</html>
