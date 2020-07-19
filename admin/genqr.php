<?php
  header("Content-type: image/png");
  include 'src/phpqrcode/qrlib.php';
 

  $stock_link = 'https://assets.dekcom-chamnong.com/view_inventory?id='. $_REQUEST['stock_id'];
  $debugLog = ob_get_contents(); 
  ob_end_clean(); 
  QRcode::png($stock_link);
  
?>
