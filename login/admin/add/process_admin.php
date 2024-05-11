<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

$open_connect = 1;
require('../../connect.php');
                // Display retrieved data
                if(!empty($_POST['id_card']) and !empty($_POST['firstname']) and !empty($_POST['lastname']) and !empty($_POST['pre']) and !empty($_POST['brithday']) and !empty($_POST['role_account']) and !empty($_POST['password_account1']) and !empty($_POST['password_account2'])){
                    $id_card = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['id_card']));
                    $pre = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['pre']));
                    $firstname = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['firstname']));
                    $lastname = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['lastname']));
                    $birthday = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['birthday']));
                 
                    $password_account1 = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password_account1']));
                    $password_account2 = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password_account2']));
                    if ($password_account1 !== $password_account2) {
                        echo "<script>
                            $(document).ready(function() {
                                Swal.fire({
                                    title: 'รหัสผ่านไม่ตรงกัน!!',
                                    text: 'SENATE',
                                    icon: 'error',
                                    timer: 5000,
                                    showConfirmButton: false
                                });
                            })
                        </script>";
                        header("refresh:2.5; url=form_register.php"); // รหัสผ่านไม่ตรงกัน
                        exit; // เพื่อหยุดการทำงานของสคริปต์ทันที
                    }
                  
                    $query_check_email_account = "SELECT birthday FROM account WHERE birthday = '$birthday'";
                    $call_back_query_check_birthday = mysqli_query($connect, $query_check_birthday);
                     if(mysqli_num_rows($call_back_query_check_birthday) > 0){
                            echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'มีผู้ใช้อีเมลนี้แล้ว!!',
                            text: 'SENATE',
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: false
                        });
                    })
                    </script>";
                    header("refresh:2.5; url=form_register.php"); //มีผู้ใช้อีเมลนี้แล้ว
                         }else{
                             $length = random_int(97, 128);
                             $salt_account = bin2hex(random_bytes($length)); //สร้างค่าเกลือ
                             $password_account1 = $password_account1 . $salt_account; //เอารหัสผ่านต่อกับค่าเกลือ
                             $algo = PASSWORD_ARGON2ID;
                             $options = [
                                'cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
                                'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
                                'threads' => PASSWORD_ARGON2_DEFAULT_THREADS
                             ];
                
                             $password_account = $password_account1; //นำรหัสผ่านที่ต่อกับค่าเกลือแล้ว เข้ารหัสด้วยวิธี ARGON2ID
                             $query_create_account = "INSERT INTO account VALUES (NULL, '$pre','$firstname','$lastname','$id_card', '$email_account', '$password_account', 'users', 'default_images_account.jpg',0 , 0, NULL)";
                             $call_back_create_account = mysqli_query($connect, $query_create_account);
                             if($call_back_create_account){
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
                            header("refresh:2.5; url=form_login.php");//สร้างบัญชีสำเร็จ
                             }else{
                               echo $query_create_account;
                               echo "<script>
                               $(document).ready(function() {
                                   Swal.fire({
                                       title: 'สร้างบัญชีล้มเหลว!!',
                                       text: 'SENATE',
                                       icon: 'error',
                                       timer: 5000,
                                       showConfirmButton: false
                                   });
                               })
                               </script>";
                               header("refresh:2.5; url=form_register.php");; //สร้างบัญชีล้มเหลว
                             }
                             
                         }
                     
                
                }



?>