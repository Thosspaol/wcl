<?php
    session_start();
    include 'ga.php';
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    $class = $_POST["class"];
    $ID_code = $_POST["ID_code"];

    $sql = "INSERT INTO login (name, lastname, password, class, ID_code) VALUES ('$name','$lastname','$password','$class','$ID_code')";
   $hand=mysqli_query($conn,$sql);
   if($hand){
        echo "<script> window.location='singup.php'</script>";
        $_SESSION['success']="ยินดีต้อนรับโรงเรียนวัดช่องลมธรรมโชติ";
   }else{
    $_SESSION['error']="not insert";
   }
mysqli_close($conn);

?>