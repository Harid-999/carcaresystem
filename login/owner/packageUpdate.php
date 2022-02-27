<?php
session_start();
if($_SESSION["permission"] != '1'){
  Header("Location: ../");
}
$menu = "Services";
include("header.php"); 
include_once('functions.php');

$UpdatePackage = new DB_con(); 

    if(isset($_POST['UpdatePackage'])){ 

      $package_id  = $_GET['package_id'];
      $package_name = $_POST['package_name'];
      $package_price = $_POST['package_price'];

    
      $Script = $UpdatePackage->UpdatePackage($package_id, $package_name, $package_price);
      
      if($Script){
        echo "<script>alert('บันทึกสำเร็จ ^^');</script>";
        echo "<script>window.location.href='services.php'</script>";
      }else{
        echo "<script>alert('ล้มเหลว! กรุณาตรวจสอบข้อมูลอีกครั้ง');</script>";
        echo "<script>window.location.href='packageUpdate?package_id=$package_id'</script>";
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
            <h3 class="card-title">แก้ไขแพ็กเกจ (Packages)</h3>
          </div>
          <div class="card-body">
       
<!-- Tab -->
<div class="row">             
                <div class="col-md-1">
              </div>
              <!-- END Tab -->

                <div class="col-md-10">        
                  <form role="form" action="" method="POST">
                  <script language="JavaScript">
                    function chkNumber(ele)
                    {
                    var vchar = String.fromCharCode(event.keyCode);
                    if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
                    ele.onKeyPress=vchar;
                    }
                  </script>
                  <div class="row">
                    <div class="col-sm-6">
                      
                      <!-- 1-->
                      <div class="form-group">
                        <label>หมายเลขแพ็กเกจ
                          <?php
                           
                            if (isset($_GET['package_id'])) {
                              $package_id =  $_GET['package_id'];
                            } else {
                              $package_id = '';
                                if($package_id ==null){
                                  echo "...";
                                  exit();
                                }
                            }
                            $updatepackage = new DB_con();
                            $sql = $updatepackage->fetch_update_package($package_id);
                            while($row = mysqli_fetch_array($sql)){
                            echo $package_id;
                          ?>
                        </label>
                        <!-- <input type="text" class="form-control" name="email" placeholder="Enter ..." required> -->
                      </div>
                    </div>
                    
                  </div>

              <!-- Update Status -->
              <div class="form-group">

                    <div class="row">
                    <div class="col-sm-6">
                      <!-- 1-->
                      <div class="form-group">
                        <label>ชื่อแพ็กเกจ </label>
                        <input type="text" class="form-control" value=" <?php echo $row['package_name'] ?>" name="package_name" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ราคา </label>
                        <input type="text" class="form-control" value=" <?php echo $row['package_price'] ?>" name="package_price" OnKeyPress="return chkNumber(this)" required>
                      </div>
                    </div>
                  </div>
               

              <?php } ?>
              <br>
              <br>
              <?php  
              if( $package_id > 4 || $package_id <= 0 || $package_id == null ) { ?>
              <?php }else{ ?>
              <button type="submit" class="btn btn-warning form-control" name="UpdatePackage">บันทึกแก้ไขข้อมูล</button>
              <br>
              <br>
              <br>
              <?php  } ?>
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
