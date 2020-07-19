<?php
include 'admin/functions.php';
$id = $_REQUEST['id'];
$filename = $_REQUEST['file'];
$doc = $_REQUEST['doc'];
$fullpath = 'admin/docs/camps/' . $id . '/' . $filename;

$file_extension = strtolower(substr(strrchr($filename,"."),1));
           switch ($file_extension) {
               case "pdf": $ctype="application/pdf"; break;
               case "exe": $ctype="application/octet-stream"; break;
               case "zip": $ctype="application/zip"; break;
               case "doc": $ctype="application/msword"; break;
               case "xls": $ctype="application/vnd.ms-excel"; break;
               case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
               case "gif": $ctype="image/gif"; break;
               case "png": $ctype="image/png"; break;
               case "jpeg": case "jpg": $ctype="image/jpeg"; break;
               default: $ctype="application/force-download";
           }

header('Content-Description: File Transfer');
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=$filename");
header('Content-Length: ' . filesize($fullpath));
header('Expires: 0');
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
header("Content-Transfer-Encoding: Binary");
header('Pragma: public');
ob_clean();
flush();

readfile($fullpath);

date_default_timezone_set('Asia/Bangkok');
$stamp = date("Y-m-d H:i:s");
$sql = "insert into download_stat(doc_id, stamp) values('$doc','$stamp')";
$qry = mysqli_query($con,$sql);




?>