<?php
session_start();
if($_SESSION["permission"] != '2'){
  Header("Location: ../");
}
$menu = "Services";


?>

<?php include("header.php"); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1><i class="nav-icon fas fa-car"></i> บริการ (Services)</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">แพ็กเกจ (Packages)</h3>
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
          <div class="col-md-5">
            <table class="table table-bordered " role="grid">
              <thead>
                <tr role="row" class="info">
                  <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ลำดับ</th> -->
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">หมายเลขแพ็กเกจ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อแพ็กเกจ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ราคา/บาท</th>
                  <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่เพิ่มเข้าสู่ระบบ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">Management</th> -->
                  
                </tr>
              </thead>
              <tbody>
              <?php
                include('functions.php');
                $fetchPackages = new DB_con(); 
                $sql = $fetchPackages->fetchPackages();   
                while($row=mysqli_fetch_array($sql)){
              ?>
                <tr>
                  <td><?php echo $row['package_id']; ?></td>
                  <td><?php echo $row['package_name']; ?></td>
                  <td><?php echo $row['package_price']; ?></td>

                  <!-- <td><?php echo $row['created']; ?></td> -->
             
                  <!-- <td>
                    <a class="btn btn-warning btn-ls" href="updateEmployee.php?id=<?php echo $row['id']?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                    </a>
                    <a class="btn btn-danger btn-ls" href="deleteEmployee.php?del_id=<?php echo $row['id']?>">
                      <i class="fas fa-trash-alt">
                      </i>
                    </a>
                  </td> -->
                  
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
            <h3 class="card-title">รายการจอง (Booking)</h3>
          </div> 

          <div class="card-body">
           <!--  -->
           <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered " role="grid">
              <thead>
                <tr role="row" class="info">
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>

                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อ-นามสกุล ลูกค้า</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เบอร์โทรลูกค้า</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่จอง</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ลำดับคิว/ช่วงเวลาที่จอง</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">หมายเลขแพ็กเกจ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานะการจอง</th>
                  <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่เพิ่มเข้าสู่ระบบ</th> -->
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">Management</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php
                // include('functions.php');
                $fetchBooking = new DB_con(); 
                $no = 0;
                $sql = $fetchBooking->fetchBooking();   
                while($row=mysqli_fetch_array($sql)){
                  $no++;
              ?>
                <tr>
                  <td><?php echo /*$row['booking_id'];*/$no ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['tel']; ?></td>
                  <td><?php echo $row['booking_date']; ?></td>
                  <td><?php echo $row['time_id']; ?></td>
                  <td><?php echo $row['package_id']; ?></td>
                  <td><?php echo $row['booking_status']; ?></td>
                  
                  <!-- fa-commenting  -->
                  <!-- fa-info-circle  -->
                  <!-- fa-spinner fa-pulse -->
                  <!-- fa fa-check -->
                  <td>

                  <!-- <a class="btn btn-info btn-sm" href="#update.php?id=<?php echo $row['id']?>">
                      <i class="fas fa-commenting-alt">
                      </i>
                    </a> -->

                    <a class="btn btn-warning btn-sm" href="servicesUpdate.php?booking_id=<?php echo $row['booking_id'] ?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                    </a>

                    <a class="btn btn-danger btn-sm" href="deleteServices.php?booking_id=<?php echo $row['booking_id'] ?> ">
                      <i class="fas fa-trash-alt">
                      </i>
                    </a>

                  </td>
              
           

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
