<?php
  session_start();
  if($_SESSION["permission"] != '2'){
    Header("Location: ../");
  }
    $menu = "Employee";
    include("header.php"); 
    include_once('functions.php');

    $insertEmployee = new DB_con(); 

    if(isset($_POST['insertEmployee'])){ 
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $tel  = $_POST['tel'];
        $checkPermission = $_POST['permission'];
        if(!empty($checkPermission)){
          $permission = 1;
        }else{
          $permission = 2;
        }
        

        $sql = $insertEmployee->insertEmployee($email, $password, $name, $tel, $permission);
        if($sql){
            echo "<script>alert('เพิ่มข้อมูลพนักงานสำเร็จ ^^');</script>";
            echo "<script>window.location.href='index.php'</script>";
         }
        else{
            echo "<script>alert('ล้มเหลว.. เพิ่มข้อมูลพนักงานไม่สำเร็จ!');</script>";
            echo "<script>window.location.href='insertEmployee.php'</script>";
        }
    }
 ?>

    
    <!-- Main content -->
    <section class="content">

     
          <div class="card">
          
            <div class="card-header">
              <strong class="card-title">เพิ่มข้อมูลพนักงาน</strong>
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
                        <label>อีเมล์เข้าสู่ระบบ (Email)</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter ..." required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>รหัสผ่านเข้าสู่ระบบ (Password)</label>
                        <input type="text" class="form-control" name="password" placeholder="Enter ..." required>
                      </div>
                    </div>
                  </div>
                 
          
                  
                  <!-- 3 -->
                  <div class="form-group">
                    <label class="col-form-label" >ชื่อ-นามสกุล (Name-Lastname)</label>
                    <input type="text" class="form-control" id="inputSuccess" name="name" placeholder="Enter ..." required>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-form-label" >นามสกุล (Lastname)</label>
                    <input type="text" class="form-control" id="inputWarning" name="Lastname" placeholder="Enter ..." required>
                  </div> -->
                  <div class="form-group">
                    <label class="col-form-label" >โทรศัพท์ (Telephone)</label>
                    <input type="text" class="form-control" id="inputError" name="tel" placeholder="Enter ..." required>
                  </div>
                  <!--END 3 -->

                  Is Admin:  <input type="checkbox" name="permission" id="myCheck" onclick="myFunction()">
                  <!-- <p id="textAdmin" style="display:none">Aamin is CHECKED!</p> -->
                  <!-- <input type="text" class="form-control" id="textAdmin" style="display:none" name ="mb" placeholder="ยืนยันรหัสผ่านเพื่อสร้างพนักงานระดับ Admin" > -->

              <br>
              <br>
              <button type="submit" class="btn btn-success form-control" name="insertEmployee">บันทึกข้อมูล</button>
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
