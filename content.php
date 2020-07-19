<style>
.cover{
    width: 100%;
    height: auto;
    position: relative;
    transform:translateY(-20%);
}
.carousel-inner{
    width:100%;
    max-height: 600px !important;
    overflow-y: hidden;
    position: relative;
}
</style>
<!--Carousel Wrapper-->
<div class="carousel slide carousel-fade" data-ride="carousel">
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    
    <div class="carousel-item active">
      <img class="d-block w-100 cover img-fluid" src="assets/img/1.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/3.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/4.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/5.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/6.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/7.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/8.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/9.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/10.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/11.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/12.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/13.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/14.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/15.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/16.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/17.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/18.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/20.jpg">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 cover img-fluid" src="assets/img/21.jpg">
    </div>
    

  </div>
  <!--/.Slides-->
</div>
<!--/.Carousel Wrapper-->
<br>
<div class="container">
      <div class="card card-cascade narrower z-depth-5">

  <div class="view view-cascade overlay">
  <div class="card warning-color-dark text-white text-center">
  <div class="card-body">
    <h4><i class="far fa-calendar-alt"></i> โปรแกรมเข้าค่ายลูกเสือ - เนตรนารี</h4>
  </div></div>
  </div>

  <div class="card-body card-body-cascade">
    <div class="container">
     
     <?php
      //search current edu year
      $sql_year = "select semester_year from semester group by semester_year order by id desc limit 1";
      $qry_year = mysqli_query($con2,$sql_year); $show_year = mysqli_fetch_array($qry_year);
      
      $semester_year = $show_year['semester_year'];
      
        
        $i = 1;
        $sql = "select * from camps where camp_year = '$semester_year' order by camp_start asc";
        $qry = mysqli_query($con,$sql);
      
        $count = mysqli_num_rows($qry);
      
        if($count != 0){
        
        while($show = mysqli_fetch_array($qry)){
     ?>
     <div class="row">
        <div class="col">
        
            <div class="card primary-color-dark">
                <div class="card-body text-center text-white">
                    <h4 class="card-title"><?php echo $show['camp_name']; ?></h4>
                    <p class="text-white text-center">
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
      </p>
                    <a href="javascript:void(0)" onclick="location.href='view_camp?id=<?php echo $show['id']; ?>'" class="btn btn-success btn-rounded"><i class="fas fa-search"></i> ดูรายละเอียดค่าย</a>

                </div>
            </div>
<!-- Card -->
        </div>
        </div>
        <br>
    <?php  
    /*if($i % $rowcount == 0){echo '</div><br><div class="row">';}*/ $i++; }
        }else{
          echo '<div class="card warning-color-dark text-white text-center">';
          echo '<div class="card-body">';
          echo 'ยังไม่มีข้อมูลค่ายในปีการศึกษานี้ กรุณารอการปรับปรุงข้อมูล';
          echo '</div>';
          echo '</div>';
        }
    ?>
    </div>
  </div>
</div>

</div>

<br>