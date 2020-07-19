<?php
include '../functions.php';

$u_id = $_POST['u_id'];
$firstname = $_POST['u_firstname'];
$lastname = $_POST['u_lastname'];
$username = $_POST['username'];
$avatar = $_POST['avatar_link'];
$prepass = $_POST['password'];

//search hash & check
$sql_chk = "select username,password from users where u_id = '$u_id'";
$qry_chk = mysqli_query($con,$sql_chk); $show_pass = mysqli_fetch_array($qry_chk);

$password = $show_pass['password'];

$hash = password_hash($prepass, PASSWORD_DEFAULT);

//ตรวจสอบรหัสผ่านว่า ถ้าไมได้เปลี่ยนรหัสผ่าน ก็ให้บันทึกตัว hash เดิม ถ้ามีการเปลี่ยนให้ทำการเปลี่ยนค่า password เป็น hash ใหม่
if($prepass == ""){$password = $password;}else{$password = $hash;}

$sql_update = "update users set u_firstname = '$firstname', u_lastname = '$lastname', password = '$password', avatar_link = '$avatar'  
              where u_id = '$u_id'";
$qry_update = mysqli_query($con,$sql_update);

  if($qry_update){
    echo '<div class="card success-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'แก้ไขผู้ใช้งานเรียบร้อยแล้ว';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}else{
    echo '<div class="card danger-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'แก้ไขผู้ใช้งานไม่สำเร็จ';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}



mysqli_close($con);



?>