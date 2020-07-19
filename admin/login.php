<style>
html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #ff4444;
}

.form-signin {
  width: 100%;
  max-width: 500px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.img-center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
<div class="container">
<div id="show_result"></div>
<form class="card p-5 form-signin danger-color-dark" id="frmLogin" name="frmLogin" method="post">
    <img class="mb-4 img-center" src="chamnong.png" width="200" height="200">
    <h3 class="text-center text-white">ระบบบริหารกองลูกเสือ<br>โรงเรียนจำนงค์วิทยา</h3><br>

    <input id="txt_user" name="txt_user" class="form-control mb-4" placeholder="Username" required>

    <input type="password" id="txt_pass" name="txt_pass" class="form-control mb-4" placeholder="Password" required>

    <button class="btn peach-gradient btn-block my-4 btn-rounded" type="submit" id="btnLogin"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>

</form>
  <br>
  <div class="text-center">
      <a class="btn btn-primary btn-rounded" href="https://scout.dekcom-chamnong.com"><i class="fas fa-arrow-left"></i> กลับสู่หน้าหลัก</a>
  </div>

  <script>
$(function(){
     
    $("#frmLogin").submit(function(){ // เมื่อมีการ submit ฟอร์ม ล็อกอิน
        // ส่งข้อมูลไปตรวจสอบที่ไฟล์ check_login.php แบบ post ด้วย ajax
        $.post("cmd/cmd_login.php",$("#frmLogin").serialize(),function(data){
            if(data==1){ // ตรวจสอบผลลัพธ์
                // ถ้าล็อกอินผ่าน ให้ลิ้งค์ไปที่หน้า main_page.php
                window.location='dashboard';
            }else if(data == 0){
                /// คำสั่งหรือแจ้งเตือนกรณีล็อกอินไม่ผ่าน
                alert("ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง");
            }else{
                alert("คุณเข้าสู่ระบบไปแล้ว");
                window.location='dashboard';
            }
        });
        return false;
    });
     
});

</script>
</div>