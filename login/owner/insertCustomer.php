<?php
    session_start();
    if($_SESSION["permission"] != '1'){
      Header("Location: ../");
    }
    // $ID = $_SESSION["id"] ;
    // $EMAIL= $_SESSION["email"] ;
    // $NAME = $_SESSION["name"] ;
    // $TEL = $_SESSION["tel"] ;
    $menu = "customer";
    include("header.php"); 
    include_once('functions.php');

    $insertCustomer = new DB_con(); 

    if(isset($_POST['insert'])){ 
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $tel  = $_POST['tel'];
        $permission = "3";

        $sql = $insertCustomer->insertCustomer($email, $password, $name, $tel, $permission);
        if($sql){
            echo "<script>alert('เพิ่มข้อมูลลูกค้าสำเร็จ ^^');</script>";
            echo "<script>window.location.href='index.php'</script>";
         }
        else{
            echo "<script>alert('ล้มเหลว.. เพิ่มข้อมูลลูกค้าไม่สำเร็จ!');</script>";
            echo "<script>window.location.href='insertCustomer.php'</script>";
        }
    }
 ?>

    
    <!-- Main content -->
    <section class="content">

     
          <div class="card">
          
            <div class="card-header">
              <strong class="card-title">เพิ่มข้อมูลลูกค้า</strong>
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
                 
                 <!-- 2 Radio-->
                 <!-- <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label class="col-form-label" > คำนำหน้าชื่อ</label>
                        <div class="form-check">
                          <input class="form-check-input" value="นาย" type="radio" name="Sex" required>
                          <label class="form-check-label">นาย</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="นาง" type="radio" name="Sex" required>
                          <label class="form-check-label">นาง</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="นางสาว" type="radio" name="Sex" required>
                          <label class="form-check-label">นางสาว</label>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <!--END 2 -->
                  
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

              <br>
              <br>
              <button type="submit" class="btn btn-success form-control" name="insert">บันทึกข้อมูล</button>
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


</body>
</html>
<!-- http://fordev22.com/ -->
