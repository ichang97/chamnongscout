<?php
include '../functions.php';

$camp_name = $_POST['camp_name'];
$camp_start = $_POST['camp_start'];
$camp_end = $_POST['camp_end'];
$camp_semester = $_POST['camp_semester'];
$camp_year = $_POST['camp_year'];

$camp_start = date("Y-m-d",strtotime($camp_start));
$camp_end = date("Y-m-d",strtotime($camp_end));

$created_date = date("Y-m-d H:i:s");

$sql = "insert into camps(camp_name, camp_start, camp_end, created_date, camp_semester, camp_year) 
        values('$camp_name','$camp_start','$camp_end','$created_date', '$camp_semester','$camp_year')";
$qry = mysqli_query($con,$sql);

if($qry){
    echo '<div class="card success-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'เพิ่มโปรแกรมค่ายเรียบร้อยแล้ว';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}else{
    echo '<div class="card danger-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'เพิ่มโปรแกรมค่ายไม่สำเร็จ';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}

mysqli_close($con);

?>