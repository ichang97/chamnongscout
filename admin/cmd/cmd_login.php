<?php
session_start();
include '../functions.php';

$txt_user = mysqli_real_escape_string($con, $_POST['txt_user']);
$txt_pass = mysqli_real_escape_string($con, $_POST['txt_pass']);

$sql = "SELECT * FROM users WHERE username = '$txt_user'";
$qry = mysqli_query($con,$sql);
$result = mysqli_fetch_array($qry);
$user_hash = $result['password'];
$chk_pass = password_verify($txt_pass, $user_hash);
$chk_login = $result['chk_login'];

/*
ความหมาย echo ในการล็อคอิน
0 ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
1 เข้าสู่ระบบสำเร็จ
2 เคยมีการเข้าสู่ระบบมาแล้ว
*/
if($chk_login != 1){
  if($result == true && $chk_pass == true){
    $_SESSION['u_id'] = $result['u_id'];
    $_SESSION['u_fullname'] = $result['u_firstname'] . ' ' . $result['u_lastname'];
    $_SESSION['avatar'] = $result['avatar_link'];
    session_write_close();
    echo '1';
    
  }else{
    echo '0';
  }
}else{
    echo '2';
}

  

mysqli_close();
?>