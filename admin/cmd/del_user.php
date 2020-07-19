<?php
include '../functions.php';

$u_id = $_POST['u_id'];

$sql = "delete from users where u_id = '$u_id'";
$qry = mysqli_query($con,$sql);

if($qry){
    echo '<div class="card success-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'ลบผู้ใช้งานเรียบร้อยแล้ว';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}else{
    echo '<div class="card danger-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'ลบผู้ใช้งานไม่สำเร็จ';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}

mysqli_close($con);

?>