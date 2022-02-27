<?php
  session_start();
  if($_SESSION["permission"] != '3'){
    Header("Location: ../");
  }
    $menu = "Customer";
    include("header.php"); 
    include_once('functions.php');

    $enterBooking = new DB_con(); 
    $confirm = true; 
    if(isset($_POST['enterBooking'])){ 

        if(empty($_POST['time_id'])){
          echo "<script>alert('ไม่สามารถจองคิวล้างรถได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');</script>";
        }
        else if( empty($_POST['package_id'])){
          echo "<script>alert('ไม่สามารถจองคิวล้างรถได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');</script>";
        }
        else if(empty($_GET['dateWash'])){
          echo "<script>alert('ไม่สามารถจองคิวล้างรถได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');</script>";
        }
        else{
          $customerID = $_SESSION["id"];
          $dateWash = date('Y-m-d', strtotime(str_replace('-', '/', $_GET['dateWash'])));
          $time_id = $_POST['time_id'];
          $package_id = $_POST['package_id'];
          $tamp  = $enterBooking->checkRepeate($dateWash,  $time_id);
          
           while($row=mysqli_fetch_array($tamp)){
              if($row['test']==$time_id){
                $confirm = false; 
                echo "<script>alert('ไม่สามารถจองคิวนี้ได้.. เนื่องจากคิวถูกจองแล้ว');</script>";
                echo "<script>window.location.href='index.php'</script>";
              }
           }  
           if($confirm){
            $Query = $enterBooking->InsertBooking($dateWash, $time_id, $package_id,  $customerID);
            if($Query){
              echo "<script>alert('จองคิวล้างรถสำเร็จ^^ โปรดรอพนักงานยืนยันการจองคิว');</script>";
              echo "<script>window.location.href='index.php'</script>";
            }else{
              echo "<script>alert('เกิดข้อผิดพลาดบางอย่างข้างในระบบ');</script>";
              echo "<script>window.location.href='index.php'</script>";
            }
          }

          //  else{
          //     // $Query = $enterBooking->InsertBooking($dateWash, $time_id, $package_id,  $customerID);
          //     // if($Query){
          //       echo "<script>alert('จองคิวล้างรถสำเร็จครับ^^ รอพนักงานยืนยันการจองคิวนี้');</script>";
          //     //   echo "<script>window.location.href='index.php'</script>";
          //     // }
          //  }
        }
    }

 ?>

    
    <!-- Main content -->
    <section class="content">

     
          <div class="card">
          
            <div class="card-header">
              <strong class="card-title">จองคิวล้างรถ</strong>
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
                          // include('functions.php');
                            if($_GET['dateWash'] == null){
                              echo "<h3>กรุณาย้อนกลับเพื่อเลือกวันที่รับบริการ</h3>";
                              echo "<script>alert('กรุณาย้อนกลับเพื่อเลือกวันที่รับบริการ');</script>";
                              echo "<script>window.location.href='index.php'</script>";
                            } 
                            else{
                            echo $_GET['dateWash'];
                            }
                          ?>
                        </label>
                        
                        <?php
                        // include('functions.php');
                        $ObjectDB = new DB_con();
                        $QuerycheckMax = $ObjectDB->checkMax(isset($_GET['dateWash']));  
                            while($row=mysqli_fetch_array($QuerycheckMax)){ 
                        ?>
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
              <?php if($_GET['dateWash'] != null){  ?>
                  <!-- 3 -->
                  <div class="form-group">
                    <label class="col-form-label" >เลือกเวลาเข้ารับบริการ</label>
                    <!-- <input type="text" class="form-control" id="inputSuccess" name="name" placeholder="Enter ..." required> -->
                    <div class="col-4">
                    <select name="time_id" id="" class="form-control select2">
                        <option value="" selected>-- เลือกเวลาเข้ารับบริการ --</option>
                        <option value="1" >คิวที่ 1 เวลา 09.00 - 10.30 </option>
                        <option value="2" >คิวที่ 2 เวลา 10.30 - 12.00 </option>
                        <option value="3" >คิวที่ 3 เวลา 13.00 - 14.30 </option>
                        <option value="4" >คิวที่ 4 เวลา 14.30 - 16.00 </option>
                        <option value="5" >คิวที่ 5 เวลา 16.00 - 17.30 </option>
                    </select>
                    </div>
                  </div>
                  <?php 
                    $QueryPackage = $ObjectDB->Package();
                    $packageName = array();
                    $i=0;
                    while($row=mysqli_fetch_array($QueryPackage)){ 
                      $packageName[$i] = $row['package_name'];
                      $i++;
                    }
                    ?>
                 
                  <div class="form-group">
                    <label class="col-form-label" >เลือกแพ็กเกจบริการ</label>
                    <div class="col-4">
                    <select name="package_id" id="" class="form-control select2">
                        <option value="" selected>-- เลือกแพ็กเกจบริการ --</option>
                        <option value="1" ><?php echo $packageName[0]; ?></option>
                        <option value="2" ><?php echo $packageName[1]; ?></option>
                        <option value="3" ><?php echo $packageName[2]; ?></option>
                        <option value="4" ><?php echo $packageName[3]; ?></option>
                    </select>
                    </div>
                  </div>
                  <!--END 3 -->
                   <?php  ?>           
                  <!-- Is Admin:  <input type="checkbox" name="permission" id="myCheck" onclick="myFunction()"> -->
                  <!-- <p id="textAdmin" style="display:none">Aamin is CHECKED!</p> -->
                  <!-- <input type="text" class="form-control" id="textAdmin" style="display:none" name ="mb" placeholder="ยืนยันรหัสผ่านเพื่อสร้างพนักงานระดับ Admin" > -->

              <br>
              <br>
              <button type="submit" class="btn btn-success form-control" name="enterBooking">บันทึกข้อมูล</button>
              <br>
              <br>
              <br>
              <?php }else{echo '';}} ?>             
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
