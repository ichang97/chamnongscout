<?php
include '../functions.php';
header('Content-Type: text/html; charset=utf-8');

$uploaded_date = date("Y-m-d H:i:s");
$camp_id = $_POST['camp_id'];

if($show_max['id'] == null){$max_id = 1;}
else{$max_id = $show_max['id'] + 1;}


$path = "../docs/camps/";
$fullpath = $path . $camp_id . '/';

if (!file_exists($path . $camp_id)) {
    mkdir($path. $camp_id);
    
    $total = count($_FILES['docs']['name']);
    
  for($i = 0; $i < $total; $i++){
    if($_FILES["docs"]["name"][$i] != ""){
      move_uploaded_file($_FILES["docs"]["tmp_name"][$i], $fullpath . $_FILES["docs"]["name"][$i]);
      
      $filename = $_FILES['docs']['name'][$i];
      $sql_upload = "insert into camp_docs(camp_id,doc_name, uploaded_date) 
                    values('$camp_id','$filename','$uploaded_date')";
      $qry_upload = mysqli_query($con,$sql_upload);
    }
  }
}else{
  $total = count($_FILES['docs']['name']);
  for($i = 0; $i < $total; $i++){
    if($_FILES["docs"]["name"][$i] != ""){
      move_uploaded_file($_FILES["docs"]["tmp_name"][$i], $fullpath . $_FILES["docs"]["name"][$i]);
      
      $filename = $_FILES['docs']['name'][$i];
      $sql_upload = "insert into camp_docs(camp_id,doc_name, uploaded_date) 
                    values('$camp_id','$filename','$uploaded_date')";
      $qry_upload = mysqli_query($con,$sql_upload);
    }
  }

}

if($qry_upload){
  echo '<script>';
  echo 'alert("อัพโหลดไฟล์สำเร็จ");';
  echo 'window.location = "../view_camp?id=' . $camp_id . '";';
  echo '</script>';
}else{
  echo '<script>';
  echo 'alert("อัพโหลดไฟล์ไม่สำเร็จ");';
  echo 'window.location = "../view_camp?id=' . $camp_id . '";';
  echo '</script>';
}

mysqli_close($con);


?>