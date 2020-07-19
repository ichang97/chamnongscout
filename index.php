<?php
session_start();
include 'admin/functions.php';
$sql_mode = "select dev_mode from settings where id = 1";
$qry_mode = mysqli_query($con,$sql_mode);
$show_mode = mysqli_fetch_array($qry_mode);

if($show_mode['dev_mode'] == 1){
  $title = "กองลูกเสือโรงเรียนจำนงค์วิทยา";

    //For Facebook Share
    $fb_url = "https://scout.dekcom-chamnong.com";
    $fb_title = $title;
    $fb_desc = "รับข่าวสารจากกองลูกเสือโรงเรียนจำนงค์วิทยาได้ที่นี่";

    include 'header.php';
    
    include 'menu.php';
    include 'content.php';
    include 'footer.php';
}elseif($show_mode['dev_mode'] == 2 && $_SESSION['u_id'] != ""){
  $title = "กองลูกเสือโรงเรียนจำนงค์วิทยา";

    //For Facebook Share
    $fb_url = "https://scout.dekcom-chamnong.com";
    $fb_title = $title;
    $fb_desc = "รับข่าวสารจากกองลูกเสือโรงเรียนจำนงค์วิทยาได้ที่นี่";

    include 'header.php';
    include 'menu.php';
    include 'content.php';
    include 'footer.php';
}else{
   header("location: https://dekcom-chamnong.com/maintenance.html");
}
 
    
?>