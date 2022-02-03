<?php
    session_start();
    if($_SESSION["permission"] != '1'){
      Header("Location: ../");
    }
    $menu = "Employee";
    include("header.php"); 

    include_once('functions.php');
    
    $updateEmployee= new DB_con();
    if(isset($_POST['updateEmployee'])){
        $id = $_GET['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $tel  = $_POST['tel'];    

        $sql = $updateEmployee->updateEmployee($id, $email, $password, $name, $tel);
        if($sql){
            echo "<script>alert('บันทึกแก้ไขข้อมูลพนักงาสำเร็จ ^^');</script>";
            echo "<script>window.location.href='employee.php'</script>";
         }
        else{
            echo "<script>alert('ล้มมเหลว.. บันทึกแก้ไขข้อมูลพนักงานไม่สำเร็จ!');</script>";
            echo "<script>window.location.href='updateEmployee.php?id=$id'</script>";
        }
    }
 ?>

    
    <!-- Main content -->
    <section class="content">

     
          <div class="card">
          
            <div class="card-header">
              <strong class="card-title">แก้ไขข้อมูลพนักงาน</strong>
              <div align="right"> 
                <a href="employee.php">      
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"> ย้อนกลับ</button></a>          
            </div>
            <?php

              $id = $_GET['id'];
              $fetchEmployee_Update = new DB_con();
              $sql = $fetchEmployee_Update->fetchEmployee_Update($id);
              while($row = mysqli_fetch_array($sql)){
            ?>
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
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" placeholder="Enter ..." required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>รหัสผ่านเข้าสู่ระบบ (Password)</label>
                        <input type="text" class="form-control" name="password" value="<?php echo $row['password'] ?>" placeholder="Enter ..." required>
                      </div>
                    </div>
                  </div>
                 

                 <!-- 2 -->
                 <!-- <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label class="col-form-label" > คำนำหน้าชื่อ</label>
                        <div class="form-check">
                          <input class="form-check-input" value="นาย"<?php if($row['Sex'] == 'นาย'){ echo 'checked'; } ?> type="radio" name="Sex" required>
                          <label class="form-check-label">นาย</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="นาง"<?php if($row['Sex'] == 'นาง'){ echo 'checked'; } ?> type="radio" name="Sex" required>
                          <label class="form-check-label">นาง</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="นางสาว"<?php if($row['Sex'] == 'นางสาว'){ echo 'checked'; } ?> type="radio" name="Sex" required>
                          <label class="form-check-label">นางสาว</label>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <!--END 2 -->

                  
                  <!-- 3 -->
                  <div class="form-group">
                    <label class="col-form-label" >ชื่อ-นามสกุล (Name-Lastname)</label>
                    <input type="text" class="form-control" id="inputSuccess" name="name" value="<?php echo $row['name'] ?>" placeholder="Enter ..." required>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-form-label" >นามสกุล (Lastname)</label>
                    <input type="text" class="form-control" id="inputWarning" name="Lastname" value="<?php echo $row['Lastname'] ?>" placeholder="Enter ..." required>
                  </div> -->
                  <div class="form-group">
                    <label class="col-form-label" >โทรศัพท์ (Telephone)</label>
                    <input type="text" class="form-control" id="inputError" name="tel" value="<?php echo $row['tel'] ?>" placeholder="Enter ..." required>
                  </div>
                  <!--END 3 -->
              <?php } ?>
              <br>
              <br>
              <button type="submit" class="btn btn-warning form-control" name="updateEmployee">บันทึกแก้ไขข้อมูลพนักงาน</button>
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
