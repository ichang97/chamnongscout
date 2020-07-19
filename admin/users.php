<?php
  include 'functions.php';
  //include 'chk_session.php';
  $title = "ผู้ใช้งาน";
  include 'header.php';
  include 'menu.php';
  
?>
<br>

<script type="text/javascript">
$(document).ready( function () {
    $('#user_list').DataTable();
} );
</script>
<script type="text/javascript">
$('#test') .click(function() {
  alert( "Handler for .click() called." );
});
</script>
<?php
  $sql_users = "select * from users order by u_firstname";
  $qry_users = mysqli_query($con,$sql_users);
  $num_users = mysqli_num_rows($qry_users);
?>
<div class="container">
<button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#Adduser"><i class="fas fa-plus"></i> เพิ่มผู้ใช้งาน</button><br><br>
  <div id="deluser">
  </div><br>

  <div class="modal fade" id="Adduser" tabindex="-1" role="dialog" aria-labelledby="Adduser"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้งาน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="result_add"></div>
        <form id="Adduser" name="Adduser" class="was-validated">
          <div class="form-group">
            <label>ชื่อผู้ใช้งาน</label>
            <input class="form-control" id="username" name="username" type="text" required>
          </div>
          <div class="form-group">
    <label>รหัสผ่าน</label>
      <div class="input-group mb-3" id="show_hide_password">
        <input type="password" class="form-control" id="password" required>
          <div class="input-group-append">
            <a href="" class="btn btn-primary m-0 px-3 py-2 z-depth-0 waves-effect"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
          </div>
      </div>
  </div>
          <div class="form-group">
            <label>ชื่อ</label>
            <input class="form-control" id="u_firstname" name="u_firstname" type="text" required>
          </div>
          <div class="form-group">
            <label>นามสกุล</label>
            <input class="form-control" id="u_lastname" name="u_lastname" type="text" required>
          </div>
          <div class="form-group">
            <label>ลิงก์รูปภาพประจำตัว (สามารถคัดลอกจากเฟซบุ๊กหรือสื่ออื่นได้)</label>
            <input class="form-control" id="avatar_link" name="avatar_link" type="text" required>
          </div>
          <div class="form-group">
            <div class="text-center">
            <button type="reset" class="btn btn-info my-4 btn-rounded"><i class="fas fa-redo"></i> ล้างข้อมูล</button>
          </div>
            <button type="button" class="btn btn-success btn-block my-4 btn-rounded" id="BtnAdduser"><i class="fas fa-plus"></i> เพิ่มผู้ใช้งาน</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  
<?php if($num_users == 0): ?>
<div class="card danger-color-dark text-white text-center">
  <div class="card-body">
  <i class="fas fa-times"></i> ไม่มีผู้ใช้งาน
  </div></div>
<?php else: ?>
  <div class="table-responsive">
  <table id="user_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr class="text-center">
      <th class="th-sm">ชื่อ - สกุล
      </th>
      <th class="th-sm" width="150">Username
      </th>
      <th class="th-sm" width="300">การดำเนินการ
      </th>
    </tr>
  </thead>
  <tbody>
  <?php
      while ($show_users = mysqli_fetch_array($qry_users)) {
  ?>
    <tr>
      <td class="text-center">
        <img class="img-fluid z-depth-1 rounded-circle" src="<?php echo $show_users['avatar_link']; ?>" style="width: 80px;">&nbsp;&nbsp;&nbsp;
        <?php echo $show_users["u_firstname"]; ?> <?php echo $show_users["u_lastname"]; ?>
      </td>
      <td class="text-center"><?php echo $show_users["username"]; ?></td>
      <td>
        <div class="text-center">
          <button type="button" class="btn btn-warning btn-rounded" data-toggle="modal" data-target="#Edituser<?php echo $show_users['u_id']; ?>"><i class="fas fa-pencil-alt"></i></button>
          <button type="button" class="btn btn-danger btn-rounded" id="BtnDeluser<?php echo $show_users['u_id']; ?>"><i class="fas fa-trash-alt"></i></button>
        </div>
      
        
      <div class="modal fade" id="Edituser<?php echo $show_users['u_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Edituser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="result_edit<?php echo $show_users['u_id']; ?>"></div>
        <script>
        $(function () {
 $("#BtnEdituser<?php echo $show_users['u_id']; ?>").click(function () {
     $.ajax({
 url: "cmd/edit_user.php",
 type: "post",
 data: {u_id: $("#u_id<?php echo $show_users['u_id']; ?>").val(),u_firstname: $("#u_firstname<?php echo $show_users['u_id']; ?>").val(),
       u_lastname: $("#u_lastname<?php echo $show_users['u_id']; ?>").val(),password: $("#password<?php echo $show_users['u_id']; ?>").val(),
       avatar_link: $("#avatar_link<?php echo $show_users['u_id']; ?>").val()},
 success: function (data) {
 $("#result_edit<?php echo $show_users['u_id']; ?>").html(data);

window.setTimeout(function(){
window.location.href = "users";
}, 1500);

 }
 });
 
 });
 });
          
          $(function () {
 $("#BtnDeluser<?php echo $show_users['u_id']; ?>").click(function () {
   if(confirm("คุณต้องการลบผู้ใช้งานหรือไม่ ?") == true){
     $.ajax({
 url: "cmd/del_user.php",
 type: "post",
 data: {u_id: $("#u_id<?php echo $show_users['u_id']; ?>").val()},
 success: function (data) {
 $("#deluser").html(data);

window.setTimeout(function(){
window.location.href = "users";
}, 1500);

 }
 });
   }
     
 
 });
 });
        </script>
        <form id="Edituser" name="Edituser">
          <div class="form-group">
            <label>ชื่อ</label>
            <input class="form-control" id="u_firstname<?php echo $show_users['u_id']; ?>" name="u_firstname" type="text" value="<?php echo $show_users['u_firstname']; ?>">
            <input class="form-control" id="u_id<?php echo $show_users['u_id']; ?>" name="u_id" type="text" value="<?php echo $show_users['u_id']; ?>" hidden>
          </div>
          <div class="form-group">
            <label>นามสกุล</label>
            <input class="form-control" id="u_lastname<?php echo $show_users['u_id']; ?>" name="u_lastname" type="text" value="<?php echo $show_users['u_lastname']; ?>">
          </div>
          <div class="form-group">
            <label>ลิงก์รูปภาพประจำตัว (สามารถคัดลอกจากเฟซบุ๊กหรือสื่ออื่นได้)</label>
            <input class="form-control" id="avatar_link<?php echo $show_users['u_id']; ?>" name="avatar_link" type="text" value="<?php echo $show_users['avatar_link']; ?>">
          </div>
          <div class="form-group">
    <label>เปลี่ยนรหัสผ่าน</label>
      <div class="input-group mb-3" id="show_hide_password">
        <input type="password" class="form-control" id="password<?php echo $show_users['u_id']; ?>">
          <div class="input-group-append">
            <a href="" class="btn btn-primary m-0 px-3 py-2 z-depth-0 waves-effect"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
          </div>
      </div>
  </div>
          <div class="form-group">
            <button type="button" class="btn btn-warning btn-block my-4 btn-rounded" id="BtnEdituser<?php echo $show_users['u_id']; ?>"><i class="fas fa-pencil-alt"></i> แก้ไขข้อมูล</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
<?php endif ?>

</div>
<script>
  $(function () {
 $("#BtnAdduser").click(function () {
     $.ajax({
 url: "cmd/add_user.php",
 type: "post",
 data: {u_firstname: $("#u_firstname").val(),u_lastname: $("#u_lastname").val(), 
        username: $("#username").val(),password: $("#password").val(),
        avatar_link: $("#avatar_link").val()},
 success: function (data) {
 $("#result_add").html(data);

window.setTimeout(function(){
window.location.href = "users";
}, 1500);

 }
 });
 
 });
 });
  
	$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});

</script>
<?php include 'footer.php'; ?>