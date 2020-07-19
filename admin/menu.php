<!--Main Navigation-->
<header>

  <nav class="navbar navbar-expand-lg navbar-dark danger-color-dark">
  <a class="navbar-brand" href="javascript:void(0)" onclick="location.href='dashboard'">
    <img src="chamnong.png" width="30" height="30"> ระบบบริหารกองลูกเสือ จนว.
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-rounded blue-gradient" href="javascript:void(0)" onclick="location.href='camps'"><i class="fas fa-campground"></i> โปรแกรมค่าย</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-rounded blue-gradient" href="#"><i class="far fa-newspaper"></i> ข่าวสาร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-rounded blue-gradient" href="javascript:void(0)" onclick="location.href='users'"><i class="fas fa-users"></i> ผู้ใช้งาน</a>
        </li>
        <li class="nav-item">
          <!-- Button trigger modal -->
<button type="button" class="nav-link btn btn-rounded peach-gradient" data-toggle="modal" data-target="#dev_mode">
  <i class="fas fa-tools"></i> เปลี่ยนโหมดแสดงผลเว็บไซต์
</button>

        </li>
        
<!-- Modal -->
<div class="modal fade" id="dev_mode" tabindex="-1" role="dialog" aria-labelledby="dev_modelb"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dev_modelb">เปลี่ยนโหมดแสดงผลเว็บไซต์</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="result"></div>
        <form>
          <div class="form-group">
            <label>เลือกโหมดการแสดงผล</label>
            <select type="text" class="browser-default custom-select" id="txt_dev_mode" name="txt_dev_mode">
                <option value="" disabled selected>---</option>
                <option value="1">โหมดแสดงผลจริง</option>
                <option value="2">โหมดพัฒนาเว็บ</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-success btn-rounded btn-block" id="btnDevmode" type="button"><i class="fas fa-sync-alt"></i> เปลี่ยนโหมด</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
        
      </ul>
      <ul class="navbar-nav nav-flex">
      <li class="nav-item">
          <button class="nav-link btn btn-rounded red darken-2" onclick="logout()"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
        <script>
        function logout(){  

        $.post("cmd/cmd_logout.php",function(data){
           if(data==1){
                window.location="https://scout.dekcom-chamnong.com/admin"; 
           }
        });
        }
    
        </script>
        </li>
      </ul>
    </div>
  </nav>
  <script>
  $(function () {
 $("#btnDevmode").click(function () {
   if(confirm("ยืนยันการเปลี่ยนโหมดการแสดงผลหรือไม่ ? (โปรดใช้ความระมัดระวัง มีผลต่อการแสดงผลเว็บไซต์)") == true){
     $.ajax({
 url: "cmd/dev_mode.php",
 type: "post",
 data: {dev_mode: $("#txt_dev_mode").val()},
 success: function (data) {
 $("#result").html(data);

window.setTimeout(function(){
location.reload();
}, 1500);

 }
 });
   }
     
 
 });
 });
  
</script>

</header>
<!--Main Navigation-->