<?php
session_start();
if($_SESSION["permission"] != '1'){
  Header("Location: ../");
}
$menu = "Cal";
include_once('functions.php');

?>

<?php include("header.php"); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1><i class="nav-icon fas fa-money-check-alt"></i> รายรับประจำ (Income)</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">รายได้ประจำเดือน/ปี</h3>
          </div>
          <div class="card-body">
            <!-- <p>แพ็กเกจล้างรถปัจจุบัน 2565</p> -->
            <!-- <strong>Recommendations</strong> -->
            <!-- <div>
              <a href="#https://fontawesome.com/" target="_bank">Font Awesome</a><br>
              <a href="#https://useiconic.com/open/" target="_bank">Iconic Icons</a><br>
              <a href="#http://ionicons.com/" target="_bank">Ion Icons</a><br>
            </div> -->

        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered " role="grid">
              <thead>
                <tr role="row" class="info">
                  <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ลำดับ</th> -->
                  <th align="center" tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ลำดับ</th>
                  <th align="center" tabindex="0" rowspan="1" colspan="1" style="width: 20%;">เดือน/ปี</th>
                  <th align="center" tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รายได้ประจำเดือน/ปี</th>
                  <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่เพิ่มเข้าสู่ระบบ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">Management</th> -->
                  
                </tr>
              </thead>
              <tbody>
              <?php

                $fetchcalDay1 = new DB_con(); 
                $no = 0;
                $sql = $fetchcalDay1->calMonthPerYear();   
                while($row=mysqli_fetch_array($sql)){
                  $no++;
                ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['MonthPerYear']; ?></td>
                  <td><?php echo $row['income']; ?></td>

                  <!-- fa-commenting  -->
                  <!-- fa-info-circle  -->
                  <!-- fa-spinner fa-pulse -->
                  <!-- fa fa-check -->


                </tr>
                <?php } ?>
              </tbody>
            </table>
            
          </div>
          <!-- <div class="col-md-1" > -->
        </div>
    <!-- end test -->


          </div><!-- /.card-body -->
        </div>
      </div>  


      <div class="container-fluid">
        <div class="card card-primary card-outline">

          <div class="card-header">
            <h3 class="card-title">รายได้ประจำวัน</h3>
          </div> 

          <div class="card-body">
           <!--  -->
           <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered " role="grid">
              <thead>
                <tr role="row" class="info">
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รายได้ประจำวัน</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php

                $fetchcalDay = new DB_con(); 
                $no = 0;
                $sql = $fetchcalDay->calDay();   
                while($row=mysqli_fetch_array($sql)){
                  $no++;
              ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['income']; ?></td>
                
                  <!-- fa-commenting  -->
                  <!-- fa-info-circle  -->
                  <!-- fa-spinner fa-pulse -->
                  <!-- fa fa-check -->


                </tr>
              <?php } ?>
              </tbody>
            </table>
            
          </div>
          <!-- <div class="col-md-1" > -->
        </div>
    <!-- end test -->
          


          <!--  -->
          </div>
          <!-- /.card-body -->
        </div>
      </div>    




          
        

          


       
      
      

    </section>
    <!-- /.content -->

    
<?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // http://fordev22.com/
    // });
  });
</script>
  
</body>
</html>
