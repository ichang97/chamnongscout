<?php
include '../functions.php';

$firstname = $_POST['u_firstname'];
$lastname = $_POST['u_lastname'];
$username = $_POST['username'];
$avatar = $_POST['avatar_link'];
$prepass = $_POST['password'];

$password = password_hash($prepass, PASSWORD_DEFAULT);


if($firstname != "" and $lastname != "" and $username != "" and $prepass != "" and $avatar !=""){
  
  $sql = "insert into users(u_firstname, u_lastname, username, password, avatar_link) 
        values('$firstname', '$lastname', '$username', '$password','$avatar')";
  $qry = mysqli_query($con,$sql);
  if($qry){
    echo '<div class="card success-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'เพิ่มผู้ใช้งานเรียบร้อยแล้ว';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}else{
    echo '<div class="card danger-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'เพิ่มผู้ใช้งานไม่สำเร็จ';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}
}else{
    echo '<div class="card warning-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'กรุณาระบุข้อมูลให้ครบถ้วน';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}


mysqli_close($con);



?>