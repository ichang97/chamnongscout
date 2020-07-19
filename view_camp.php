<?php

  include 'admin/functions.php';
  $camp_id = $_REQUEST['id'];
  $sql = "select * from camps where id = '$camp_id'";
  $qry = mysqli_query($con,$sql);
  $show = mysqli_fetch_array($qry);

  $title = $show['camp_name'];

  $count = mysqli_num_rows($qry);


//For Facebook Share
$fb_url = "https://scout.dekcom-chamnong.com/view_camp?id=" . $camp_id;
$fb_title = $title;
       if($show['camp_start'] == $show['camp_end']){
         $fb_date .=  'วันที่ ' . datethaishortnotime($show['camp_start']);
       }else{
         $fb_date .=  'ระหว่างวันที่ ' . datethaishortnotime($show['camp_start']) . ' - ' . datethaishortnotime($show['camp_end']);
       }

       $fb_date.= ' | ภาคเรียนที่ ' . $show['camp_semester'] . ' ปีการศึกษา ' . $show['camp_year'];

$fb_desc = $fb_date;


  include 'header.php';
  include 'menu.php';

?>
<br>
<script type="text/javascript">
$('#test') .click(function() {
  alert( "Handler for .click() called." );
});
  
</script>
<?php
  
?>
<div class="container">
  <div class="text-center">
    <a class="btn btn-primary btn-rounded" href="javascript:void(0)" onclick="location.href='https://scout.dekcom-chamnong.com'"><i class="fas fa-arrow-left"></i> กลับ</a>
  </div><br>

<?php if($count == 0) { header("location:404");}else{?>
<div class="card card-cascade narrower">

  <div class="view view-cascade overlay">
  <div class="card blue-gradient text-white text-center">
  <div class="card-body">
    <h4><?php echo $show['camp_name']; ?></h4>
  </div></div>
  </div>

  <div class="card-body card-body-cascade">
    <div class="container">
      <p class="card-text text-center">
        <strong>
        <i class="fas fa-clock"></i> <?php 
       if($show['camp_start'] == $show['camp_end']){
         echo 'วันที่ ' . datethaishortnotime($show['camp_start']);
       }else{
         echo 'ระหว่างวันที่ ' . datethaishortnotime($show['camp_start']) . ' - ' . datethaishortnotime($show['camp_end']);
       }
       ?>
          <br>
          <i class="far fa-calendar-alt"></i> <?php 
       echo 'ภาคเรียนที่ ' . $show['camp_semester'] . ' ปีการศึกษา ' . $show['camp_year'];
       ?>
          
        </strong>
      </p>
      <br>
      
      <div class="card card-cascade narrower">

  <div class="view view-cascade overlay">
  <div class="card peach-gradient text-white text-center">
  <div class="card-body">
    <h4><i class="far fa-file-alt"></i> เอกสารประกอบ</h4>
  </div></div>
  </div>

  <div class="card-body card-body-cascade">
    <div class="container">
      <div id="result_del"></div><br>
      <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <th>#</th>
          <th>ชื่อเอกสาร</th>
          <th>วันที่อัพโหลด</th>
          <th>จำนวน Download</th>
          <th>Download</th>
        </thead>
        <tbody>
          <?php
          $j = 1;
          $sql_doc = "select * from camp_docs where camp_id = '$camp_id'";
          $qry_doc = mysqli_query($con,$sql_doc);
          
          while($show_doc = mysqli_fetch_array($qry_doc)){
          ?>
          <tr>
            <td width="50"><?php echo $j; ?></td>
            <td><?php echo $show_doc['doc_name']; ?></td>
            <td><?php echo datethaishort($show_doc['uploaded_date']); ?></td>
            <td>
            <?php 
              $doc_id = $show_doc['id'];
              $s_dlcount = "select * from download_stat where doc_id = '$doc_id'";
              $q_dlcount = mysqli_query($con,$s_dlcount);
              $show_dlcount = mysqli_num_rows($q_dlcount);
            
              if($show_dlcount != 0){echo $show_dlcount . " ครั้ง";}else{echo "-";}

            ?>
            </td>
            <td width="50">
              <a onclick="location.href='dl?id=<?php echo $show_doc['camp_id']; ?>&file=<?php echo $show_doc['doc_name']; ?>&doc=<?php echo $show_doc['id']; ?>'" href="javascript:void(0)" class="btn btn-success btn-rounded" download><i class="fas fa-download"></i></a>
              <!--a onclick="location.href='dl?id=<?php echo $show_doc['camp_id']; ?>&file=<?php echo $show_doc['doc_name']; ?>'" href="javascript:void(0)" class="btn btn-success btn-rounded" download><i class="fas fa-download"></i></a-->
            </td>
          </tr>
          <?php $j++; } ?>
        </tbody>
      </table>
      </div>
      
      <div id="fb-root"></div>
        <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1121389808053468";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
      แชร์ :  <div class="fb-share-button" 
        data-href="<?php echo $fb_url; ?>" 
        data-layout="button_count"
        data-size="large">
      </div>
    </div>
  </div>
</div>
    </div>
    
  </div>
</div>
<?php } ?>

</div>
<br>



<?php include 'footer.php'; ?>