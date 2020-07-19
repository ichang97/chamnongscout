<?php 
include '../functions.php';

$dev_mode = $_POST['dev_mode'];

$sql = "update settings set dev_mode = '$dev_mode' where id = 1";
$qry = mysqli_query($con,$sql);

if($qry){
    echo '<div class="card success-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'เปลี่ยนโหมดเรียบร้อยแล้ว';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}else{
    echo '<div class="card danger-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'เปลี่ยนโหมดไม่สำเร็จ mode : ' . $dev_mode;
    echo '</div>';
    echo '</div>';
    echo '<br>';
}

mysqli_close($con);

?>