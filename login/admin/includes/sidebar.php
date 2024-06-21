<?php 
        function isActive($data) {
            $array = explode('/', $_SERVER['REQUEST_URI']);
            $key = array_search("pages", $array);
            $name = $array[$key + 1];
            return $name === $data ? 'active' : '';
        }
require('../../connect.php');

if(!isset($_SESSION['id_account']) || !isset($_SESSION['role_account'])){//ถ้าไม่มีเซสชัน id_account หรือเซสชัน role_account จะถูกส่งไปหน้า login
    die(header('Location: ../form_login.php'));
}elseif(isset($_GET['logout'])){ //ถ้ามีการกดปุ่มออกจากระบบให้ทำการทำลายเซสชันและส่งไปหน้า login
    session_destroy();
    die(header('Location: ../form_login.php'));
}else{
    $id_account = $_SESSION['id_account'];
    $query_show = "SELECT * FROM account WHERE id_account = '$id_account'";
    $call_back_show = mysqli_query($connect, $query_show);
    $result_show = mysqli_fetch_assoc($call_back_show);
    $directory = '../../images_account/';
    $image_name = $directory . $result_show['images_account'];
    $clear_cache = '?' . filemtime($image_name);
    $image_account = $image_name . $clear_cache;
}
    

        
    ?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <p>โรงเรียนวัดช่องลมธรรมโชติ</p>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link"  href="../../form_login.php"><i class="fas fa-solid fa-power-off"></i> ออกจากระบบ</a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../admin.php" class="brand-link">
        <img src="../../images_account/โลโก้วัดช่องลม.png" 
             alt="Admin Logo" 
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">ผู้ดูแลระบบ</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $image_account; ?>" class="img-circle elevation-2" alt="Admin Image">
            </div>
           
            <div class="info">
                <a href="../profile/index.php" class="d-block"><?php echo $result_show['pre']; ?>  <?php echo $result_show['firstname']; ?>  <?php echo $result_show['lastname']; ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../dashboard/home.php" class="nav-link ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>หน้าหลัก</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../profile/index.php" class="nav-link ">
                    &nbsp;<i class='fas fa-id-badge'  style='font-size:17px'></i> &nbsp;
                        <p>โปรไฟล์</p>
                    </a>
                </li>                
                <li class="nav-item">
                    <a href="../manager/index.php" class="nav-link">
                    &nbsp;<i class='fas fa-user-cog'></i>&nbsp; 
                        <p>ผู้ดูแลระบบ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../calendar/index.php" class="nav-link">
                        &nbsp;<i class='fas fa-calendar-alt'></i>&nbsp;
                            <p>ปฏิทินกิจกรรม</p>
                    </a>
                </li>   
                <li  class="nav-item">
                    <a href="../line_notify/index.php" class="nav-link">
                    &nbsp;<i class='fab fa-line'></i> &nbsp;
                    <p>Line notify</p>
                    </a>                    
                </li>             
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="../../form_login.php" id="logout" class="nav-link">
                    &nbsp;<i class="fas fa-sign-out-alt" style='font-size:17px'></i>&nbsp;
                        <p>ออกจากระบบ</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

