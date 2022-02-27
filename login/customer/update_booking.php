<?php
  session_start();
  if($_SESSION["permission"] != '3'){
    Header("Location: ../");
  }
    $menu = "Customer";
    include("header.php"); 
    include_once('functions.php');

    $updateBooking = new DB_con(); 

    if(isset($_POST['updateBooking'])){ 
      $booking_id = $_GET['booking_id'] ;
        if(empty($_POST['time_id']) || empty($_POST['package_id'] || empty($_GET['DateWash']))){
          echo "<script>alert('ไม่สามารถจองคิวล้างรถได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');</script>";
        }
        else{
          $customerID = $_SESSION["id"];
          $dateWash = date('Y-m-d', strtotime(str_replace('-', '/', $_GET['DateWash'])));
          $time_id = $_POST['time_id'];
          $package_id = $_POST['package_id'];
          // echo "<script>alert('OK');</script>";
          $Script = $updateBooking->updateBooking($booking_id, $time_id, $package_id, $customerID);
          if($Script){
            echo "<script>alert('บันทึกจองคิวล้างรถสำเร็จ ^^');</script>";
            echo "<script>window.location.href='index.php'</script>";
          }else{
            echo "<script>alert('บันทึกจองคิวล้างรถสำเร็จ!! กรุณาตรวจสอบข้อมูลอีกครั้ง');</script>";
            echo "<script>window.location.href='update_booking?booking_id=$booking_id&DateWash=$dateWash '</script>";
          }
        }
    }
 ?>

    
    <!-- Main content -->
    <section class="content">

     
          <div class="card">
          
            <div class="card-header">
              <strong class="card-title">แก้ไขคิวล้างรถ</strong>
              <div align="right"> 
                <a href="index.php">      
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"> ย้อนกลับ</button></a>          
            </div>
            </div>
            
            <br>

            <div class="card-body p-1">
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
                        <label>วันที่จองคิว 
                          <?php
                            $booking_id =  $_GET['booking_id'];
                            echo $_GET['DateWash'];

                            // select ก่อน update
                            $update = new DB_con();
                            $sql = $update->fetch_update_booking($_SESSION["id"], $booking_id);
                            while($row = mysqli_fetch_array($sql)){
                            
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
              
                  <!-- 3 -->
                  <div class="form-group">
                    <label class="col-form-label" >เปลี่ยนแปลงเวลาเข้ารับบริการ</label>
                    <!-- <input type="text" class="form-control" id="inputSuccess" name="name" placeholder="Enter ..." required> -->
                    <div class="col-4">
                    <select name="time_id" id="" class="form-control select2">
                        <option value="" selected>-- เลือกเวลาเข้ารับบริการ --</option>
                        <option value="1"<?php if($row['time_id'] == '1') { echo 'selected'; }?>>คิวที่ 1 เวลา 09.00 - 10.30 </option>
                        <option value="2"<?php if($row['time_id'] == '2') { echo 'selected'; }?>>คิวที่ 2 เวลา 10.30 - 12.00 </option>
                        <option value="3"<?php if($row['time_id'] == '3') { echo 'selected'; }?>>คิวที่ 3 เวลา 13.00 - 14.30 </option>
                        <option value="4"<?php if($row['time_id'] == '4') { echo 'selected'; }?>>คิวที่ 4 เวลา 14.30 - 16.00 </option>
                        <option value="5"<?php if($row['time_id'] == '5') { echo 'selected'; }?>>คิวที่ 5 เวลา 16.00 - 17.30 </option>
                    </select>
                    </div>
                  </div>
               

                  <div class="form-group">
                    <label class="col-form-label" >เปลี่ยนแปลงแพ็กเกจบริการ</label>
                    <!-- <input type="text" class="form-control" id="inputError" name="tel" placeholder="Enter ..." required> -->
                    <div class="col-4">
                    <select name="package_id" id="" class="form-control select2">
                          <!--<option value="" selected>-- เลือกแพ็กเกจบริการ --</option>
                       <option value="1"<?php if($row['package_id'] == '1') { echo 'selected'; }?>><?php echo $row['packName'] ?></option>
                        <option value="2"<?php if($row['package_id'] == '2') { echo 'selected'; }?>><?php echo $row['packName'] ?></option>
                        <option value="3"<?php if($row['package_id'] == '3') { echo 'selected'; }?>><?php echo $row['packName'] ?></option>
                        <option value="4"<?php if($row['package_id'] == '4') { echo 'selected'; }?>><?php echo $row['packName'] ?></option> -->

                        <?php
                        
                        echo '<option value="'.$row['package_id'].'" selected="selected">'.$row['packName'].'</option>';
                        if ($row['package_id'] == 'N') echo '<option value="Y">Y</option>';
                        
                        else 
                        
                        
                        $Package = $update->UpsPackage($row['package_id']);
                        $packageName = array();
                        $packageID = array();
                        $i=0;
                        while($row=mysqli_fetch_array($Package)){
                          $packageID[$i] =  $row['package_id'];
                          $packageName[$i] = $row['package_name'];
                          $i++;
                        }
                        echo '<option value="'.$packageID[0].'">'.$packageName[0].'</option>';
                        echo '<option value="'.$packageID[1].'">'.$packageName[1].'</option>';
                        echo '<option value="'.$packageID[2].'">'.$packageName[2].'</option>';
                        // echo '<option value="'.$packageID[3].'">'.$packageName[3].'</option>';
                        echo '</select>';
                        ?>      
                    <!-- </select> -->
                    </div>
                  </div>
                  <!--END 3 -->

                  <!-- Is Admin:  <input type="checkbox" name="permission" id="myCheck" onclick="myFunction()"> -->
                  <!-- <p id="textAdmin" style="display:none">Aamin is CHECKED!</p> -->
                  <!-- <input type="text" class="form-control" id="textAdmin" style="display:none" name ="mb" placeholder="ยืนยันรหัสผ่านเพื่อสร้างพนักงานระดับ Admin" > -->
              <?php } ?>
              <br>
              <br>
              <button type="submit" class="btn btn-warning form-control" name="updateBooking">บันทึกแก้ไขข้อมูล</button>
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

    
<?php include('footer.php'); ?>
<script>
  function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var text = document.getElementById("textAdmin");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }
</script>

</body>
</html>
<!-- http://fordev22.com/ -->
