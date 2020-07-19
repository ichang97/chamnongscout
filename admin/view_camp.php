<?php
  include 'functions.php';
  include 'chk_session.php';
  $title = "โปรแกรมค่าย";
  include 'header.php';
  include 'menu.php';

$camp_id = $_REQUEST['id'];
$sql = "select * from camps where id = '$camp_id'";
$qry = mysqli_query($con,$sql);
$show = mysqli_fetch_array($qry);

  
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
    <a class="btn btn-primary btn-rounded" href="javascript:void(0)" onclick="location.href='camps'"><i class="fas fa-arrow-left"></i> กลับ</a>
  </div><br>
  
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
      <form class="md-form" method="post" enctype="multipart/form-data" action="cmd/uploaddoc.php">
  <div class="file-field">
    <div class="btn btn-primary btn-sm float-left">
      <span>เลือกไฟล์</span>
      <input type="text" name="camp_id" value="<?php echo $show['id']; ?>" hidden required>
      <input type="file" name="docs[]" multiple required>
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text" placeholder="Filename">
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-success btn-rounded">
     <i class="fas fa-upload"></i> UPLOAD
    </button>
 </div>
</form>
      <br>
      <div id="result_del"></div><br>
      <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <th>#</th>
          <th>ชื่อเอกสาร</th>
          <th>วันที่อัพโหลด</th>
          <th>ลบ</th>
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
            <td width="50">
              <script>
  $(function () {
 $("#btnDeldoc<?php echo $j; ?>").click(function () {
   if(confirm("คุณต้องการลบเอกสารนี้หรือไม่ ?") == true){
     $.ajax({
 url: "cmd/del_doc.php",
 type: "post",
 data: {camp_id: $("#txt_campid<?php echo $j; ?>").val(),doc_id: $("#txt_docid<?php echo $j; ?>").val()},
 success: function (data) {
 $("#result_del").html(data);

window.setTimeout(function(){
window.location.href = "view_camp?id=<?php echo $camp_id; ?>";
}, 1500);

 }
 });
   }
     
 
 });
 });
  
</script>
              <form>
                <input hidden type="text" value="<?php echo $camp_id; ?>" id="txt_campid<?php echo $j; ?>">
                <input hidden type="text" value="<?php echo $show_doc['id']; ?>" id="txt_docid<?php echo $j; ?>">
              </form>
              <button class="btn btn-danger btn-rounded" type="button" id="btnDeldoc<?php echo $j; ?>"><i class="fas fa-trash-alt"></i></button>
            </td>
          </tr>
          <?php $j++; } ?>
        </tbody>
      </table>
      </div>
      
    
    </div>
  </div>
</div>
    </div>
    
  </div>
</div>

</div>
<br>



<?php include 'footer.php'; ?>