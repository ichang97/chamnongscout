<?php
  include 'functions.php';
  include 'chk_session.php';
  $title = "โปรแกรมค่าย";
  include 'header.php';
  include 'menu.php';
  
?>
<br>

<script type="text/javascript">
$(document).ready( function () {
    $('#viewcamps').DataTable();
} );
</script>
<script type="text/javascript">
$('#test') .click(function() {
  alert( "Handler for .click() called." );
});
</script>
<?php
  
?>
<div class="container">
<button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#addcamp"><i class="fas fa-plus"></i> เพิ่มโปรแกรมค่าย</button><br><br>
  <div id="deluser">
  </div><br>

  <div class="modal fade" id="addcamp" tabindex="-1" role="dialog" aria-labelledby="Adduser"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มโปรแกรมค่าย</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="result_add"></div>
        <form id="Addcamp" class="was-validated">
        <div class="form-group">
            <label>ชื่อค่าย</label>
            <input type="text" class="form-control" id="txt_campname" name="txt_campname" required>
        </div>
        <div class="form-group">
            <label>วันที่เริ่มค่าย</label>
            <input type="date" class="form-control" id="txt_start" name="txt_start" required>
        </div>
        <div class="form-group">
            <label>วันที่จบค่าย</label>
            <input type="date" class="form-control" id="txt_end" name="txt_end" required>
        </div>
        <div class="form-group">
            <label>ภาคเรียน</label>
            <select type="text" class="browser-default custom-select" id="txt_campsemester" name="txt_campsemester" required>
            <option disabled selected>เลือกภาคเรียน</option>
            <option value="1">ภาคเรียนที่ 1</option>
            <option value="2">ภาคเรียนที่ 2</option>
            </select>
        </div>
        <div class="form-group">
            <label>ปีการศึกษา</label>
            <input type="text" class="form-control" id="txt_campyear" name="txt_campyear" required>
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block btn-rounded" type="button" id="btnAddcamp"><i class="fas fa-plus"></i> เพิ่มโปรแกรมค่าย</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
    $sql = "select * from camps";
    $qry = mysqli_query($con,$sql);

    $count = mysqli_num_rows($qry);

    ?>
  
<?php if($count == 0): ?>
<div class="card danger-color-dark text-white text-center">
  <div class="card-body">
  <i class="fas fa-times"></i> ไม่มีโปรแกรมค่าย
  </div></div>
<?php else: ?>
  <div class="table-responsive">
<table class="table" id="viewcamps">
    <thead class="text-center">
        <th>ค่าย</th>
        <th>ดูข้อมูลค่าย</th>
    </thead>
    <tbody>
    <?php  while($show = mysqli_fetch_array($qry)){ ?>
        <tr>
            <td class="text-center"><?php echo $show['camp_name']; ?></td>
            <td class="text-center"><a class="btn btn-primary btn-rounded" href="javascript:void(0)" onclick="location.href='view_camp?id=<?php echo $show['id']; ?>'"><i class="fas fa-eye"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
  </div>
<?php endif ?>

</div>
<script>
  $(function () {
 $("#btnAddcamp").click(function () {
     $.ajax({
 url: "cmd/add_camp.php",
 type: "post",
 data: {camp_name: $("#txt_campname").val(),camp_start: $("#txt_start").val(),
        camp_end: $("#txt_end").val(),camp_semester: $("#txt_campsemester").val(),camp_year: $("#txt_campyear").val()},
 success: function (data) {
 $("#result_add").html(data);

window.setTimeout(function(){
window.location.href = "camps";
}, 1500);

 }
 });
 
 });
 });
  
</script>
<?php include 'footer.php'; ?>