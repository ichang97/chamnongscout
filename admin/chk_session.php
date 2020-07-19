<?php
session_start();

$s_uid = $_SESSION['u_id'];

if($s_uid == ""){
  echo "<script>";
  echo "alert('กรุณาเข้าสู่ระบบ');";
  echo "window.location='https://scout.dekcom-chamnong.com/admin';";
  echo "</script>";
}


?>