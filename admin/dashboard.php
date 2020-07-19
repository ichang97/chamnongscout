<?php
  session_start();
  include 'functions.php';
  include 'chk_session.php';
  $title = "แดชบอร์ด";
  include 'header.php';
  include 'menu.php';
  

//แสดงชื่อ สกุล

?>
<br>
<?php
$j = 1;
$sql = "select * from camps";
$qry = mysqli_query($con,$sql);

while($show = mysqli_fetch_array($qry)){
  $camp_name = $show['camp_name'];
  $camp_start = $show['camp_start'];
  $camp_end = date("Y-m-d",strtotime($show['camp_end']. ' + 1 days'));
  
  if($camp_start == $camp_end){
    $forcal.= "{title  : '$camp_name',start  : '$camp_start',allDay : true},";
  }else{
    $forcal.= "{title  : '$camp_name',start  : '$camp_start', end : '$camp_end',allDay : true},";
  }
  
  ?>


<?php $j++; } ?>
<div class="modal fade" tabindex="-1" role="dialog" id="view_event">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">รายละเอียดค่าย</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="ebody_name">
        </div>
        <div class="ebody_date">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          eventClick: function(info) {
            $('#view_event').modal('show')
            $('#view_event').on('shown.bs.modal', function (e) {
              $(e.currentTarget).find('.ebody_name').text(info.event.title)
            })
          
            },
           locale: 'th',
          plugins: [ 'dayGrid' ],
          events: [<?php echo $forcal; ?>],
          eventColor: '#C70039',
          eventTextColor: 'white',
        });
        calendar.render();

      });

</script>


<div class="container">
<div class="card blue-gradient text-white text-center">
  <div class="card-body">
    <img class="img-fluid z-depth-1 rounded-circle" src="<?php echo $_SESSION['avatar']; ?>" style="width: 200px;"><br><br>
    <?php echo $_SESSION['u_fullname']; ?> เข้าสู่ระบบแล้ว
  </div></div><br>

  <?php
            $sql_mode = "select dev_mode from settings where id = 1";
            $qry_mode = mysqli_query($con,$sql_mode);
            $show_mode = mysqli_fetch_array($qry_mode);
  
            if($show_mode['dev_mode'] == 1){
              echo '<div class="card bg-success text-white text-center">
                    <div class="card-body">
                    ขณะนี้เว็บไซต์อยู่ในโหมดแสดงผลจริง';
            }else{
              echo '<div class="card mdb-color lighten-3 text-white text-center">
                    <div class="card-body">
                    ขณะนี้เว็บไซต์อยู่ในโหมดพัฒนาเว็บ';
            }
            
    ?>
  </div></div>
  
<br>
      <div class="card card-cascade narrower">

  <div class="view view-cascade overlay">
  <div class="card peach-gradient text-white text-center">
  <div class="card-body">
    <h4><i class="far fa-calendar-alt"></i> ปฏิทินค่าย</h4>
  </div></div>
  </div>

  <div class="card-body card-body-cascade">
    <div class="container">
     
      <div id="calendar"></div>
      
    
    </div>
  </div>
</div>





</div>
<br>

<?php include 'footer.php'; ?>