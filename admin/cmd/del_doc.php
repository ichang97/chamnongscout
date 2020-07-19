<?php
include '../functions.php';

$camp_id = $_POST['camp_id']; $doc_id = $_POST['doc_id'];

//search document filename
$sql_filename = "select doc_name from camp_docs where camp_id = '$camp_id' and id = '$doc_id'";
$qry_filename = mysqli_query($con,$sql_filename); $show_filename = mysqli_fetch_array($qry_filename);

$filename = $show_filename['doc_name'];
$path = $path = "../docs/camps/";
$fullpath = $path . $camp_id . '/' . $filename;

$del_file = unlink($fullpath);

$sql_deldb = "delete from camp_docs where camp_id = '$camp_id' and id = '$doc_id'";
$qry_deldb = mysqli_query($con,$sql_deldb);

if($qry_deldb == true && $del_file == true){
    echo '<div class="card success-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'ลบเอกสารเรียบร้อยแล้ว';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}else{
    echo '<div class="card danger-color-dark text-white text-center">';
    echo '<div class="card-body">';
    echo 'ลบเอกสารไม่สำเร็จ';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}

mysqli_close($con);

?>