<?php
session_start();
if($_SESSION["permission"] != '2'){
  Header("Location: ../");
}
$menu = "Services";
include("header.php"); 
include_once('functions.php');

$UpdateService = new DB_con(); 

    if(isset($_POST['EnterUpdate'])){ 

      $booking_id = $_GET['booking_id'] ;
      $time_id = $_POST['time_id'];
      $package_id = $_POST['package_id'];
      $booking_status = $_POST['booking_status'];

    
      $Script = $UpdateService->UpdateService($booking_id, $time_id, $package_id, $booking_status);
      
      if($Script){
        echo "<script>alert('บันทึกสำเร็จ ^^');</script>";
        echo "<script>window.location.href='services.php'</script>";
      }else{
        echo "<script>alert('ล้มเหลว! กรุณาตรวจสอบข้อมูลอีกครั้ง');</script>";
        echo "<script>window.location.href='servicesUpdate?booking_id=$booking_id'</script>";
      }

    }

?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1><i class="nav-icon fas fa-car"></i> บริการ (Services)</h1>
      </div><!-- /.container-fluid -->
      <div align="right"> 
        <a href="services.php">      
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"> ย้อนกลับ</button></a>          
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">ปรับรายการจองลูกค้า</h3>
          </div>
          <div class="card-body">
       
<!-- Tab -->
<div class="row">             
                <div class="col-md-1">
              </div>
              <!-- END Tab -->

                <div class="col-md-10">        
                  <form role="form" action="" method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      
                      <!-- 1-->
                      <div class="form-group">
                        <label>วันที่ลูกค้าจองคิว 
                          <?php
                            $booking_id =  $_GET['booking_id'];
                            $update = new DB_con();
                            $sql = $update->fetch_update_booking($booking_id);
                            while($row = mysqli_fetch_array($sql)){
                              echo $row['booking_date'];
                          ?>
                        </label>
                        <!-- <input type="text" class="form-control" name="email" placeholder="Enter ..." required> -->
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- <div class="form-group">
                        <label>รหัสผ่านเข้าสู่ระบบ (Password)</label>
                        <input type="text" class="form-control" name="password" placeholder="Enter ..." required>
                      </div> -->
                    </div>
                  </div>


              <!-- Update Status -->
              <div class="form-group">
                    <label class="col-form-label" >ปรับสถานะการจอง</label>
                    <!-- <input type="text" class="form-control" id="inputSuccess" name="name" placeholder="Enter ..." required> -->
                    <div class="col-4">
                    <select name="booking_status" id="" class="form-control select2">
                        <!-- <option value="" selected>-- ปรับสถานะ --</option> -->
                        <option value="0"<?php if($row['booking_status'] == '0') { echo 'selected'; }?>>รออนุมัติ  </option>
                        <option value="1"<?php if($row['booking_status'] == '1') { echo 'selected'; }?>>ยืนยันแล้ว </option>
                        <option value="2"<?php if($row['booking_status'] == '2') { echo 'selected'; }?>>กำลังเข้ารับบริการ </option>
                        <option value="3 "<?php if($row['booking_status'] == '3') { echo 'selected'; }?>>สำเร็จ </option>
                    </select>
                    </div>
                  </div>



                  <!-- 3 -->
                  <div class="form-group">
                    <label class="col-form-label" >ปรับเวลาเข้ารับบริการ</label>
                    <!-- <input type="text" class="form-control" id="inputSuccess" name="name" placeholder="Enter ..." required> -->
                    <div class="col-4">
                    <select name="time_id" id="" class="form-control select2">
                        <!-- <option value="" selected>-- ปรับเวลาเข้ารับบริการ --</option> -->
                        <option value="1"<?php if($row['time_id'] == '1') { echo 'selected'; }?>>คิวที่ 1 เวลา 09.00 - 10.30 </option>
                        <option value="2"<?php if($row['time_id'] == '2') { echo 'selected'; }?>>คิวที่ 2 เวลา 10.30 - 12.00 </option>
                        <option value="3"<?php if($row['time_id'] == '3') { echo 'selected'; }?>>คิวที่ 3 เวลา 13.00 - 14.30 </option>
                        <option value="4"<?php if($row['time_id'] == '4') { echo 'selected'; }?>>คิวที่ 4 เวลา 14.30 - 16.00 </option>
                        <option value="5"<?php if($row['time_id'] == '5') { echo 'selected'; }?>>คิวที่ 5 เวลา 16.00 - 17.30 </option>
                    </select>
                    </div>
                  </div>
               

                  <div class="form-group">
                    <label class="col-form-label" >ปรับแพ็กเกจบริการ</label>
                    <!-- <input type="text" class="form-control" id="inputError" name="tel" placeholder="Enter ..." required> -->
                    <div class="col-4">
                    <select name="package_id" id="" class="form-control select2">
                        <!-- <option value="" selected>-- ปรับแพ็กเกจบริการ --</option> -->

                        <option value="1"<?php if($row['package_id'] == '1') { echo 'selected'; }?>>รถเก๋ง 200 บาท</option>
                        <option value="2"<?php if($row['package_id'] == '2') { echo 'selected'; }?>>รถกระบะ 2 ประตู 220 บาท</option>
                        <option value="3"<?php if($row['package_id'] == '3') { echo 'selected'; }?>>รถกระบะ 4 ประตู 250 บาท</option>
                        <option value="4"<?php if($row['package_id'] == '4') { echo 'selected'; }?>>รถตู้ 300 บาท</option>
                    </select>
                    </div>
                  </div>
                  <!--END 3 -->

                  <!-- Is Admin:  <input type="checkbox" name="permission" id="myCheck" onclick="myFunction()"> -->
                  <!-- <p id="textAdmin" style="display:none">Aamin is CHECKED!</p> -->
                  <!-- <input type="text" class="form-control" id="textAdmin" style="display:none" name ="mb" placeholder="ยืนยันรหัสผ่านเพื่อสร้างพนักงานระดับ Admin" > -->
              <?php } ?>
              <br>
              <br>
              <button type="submit" class="btn btn-warning form-control" name="EnterUpdate">บันทึกแก้ไขข้อมูล</button>
              <br>
              <br>
              <br>
               
                </form>
              </div>
            </div>
      </div>
      <!-- END Card -->
    </section>
    <!-- /.content -->

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
