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

?>
<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-address-card"></i> จัดการข้อมูลลูกค้า (Customer) </h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    
    
    
    <div class="card">
      <div class="card-header card-navy card-outline">
       
    
        <div align="right"> 
        <a href="insertCustomer.php">      
        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user-plus"></i> เพิ่มข้อมูลลูกค้า</button></a>
          
        </div>
      </div>
      <br>
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row" class="info">
                  <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ลำดับ</th> -->
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">อีเมล์</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อ-นามสกุล</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">เบอร์โทร</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่สมัครสมาชิก</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">Management</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php
                include('functions.php');
                $fetchCustomer = new DB_con(); 
                $sql = $fetchCustomer->fetchCustomer();   
                while($row=mysqli_fetch_array($sql)){
              ?>
                <tr>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['tel']; ?></td>
                  <td><?php echo $row['created']; ?></td>
             
                  <td>
                    
                    <!-- <a class="btn btn-info btn-ls" href="#">
                      <i class="fas fa-eye">
                      </i>
                    </a> -->

                    <a class="btn btn-warning btn-ls" href="updateCustomer.php?id=<?php echo $row['id']?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                    </a>

                    <a class="btn btn-danger btn-ls" href="deleteCustomer.php?del_id=<?php echo $row['id']?>">
                      <i class="fas fa-trash-alt">
                      </i>
                    </a>
                    

                  </td>
                  
                </tr>
              <?php } ?>
              </tbody>
            </table>
            
          </div>
          <div class="col-md-1" >
            
          </div>
        </div>
      </div>
      
    </div>
    
    
    
  </div>
  <!-- /.col -->
</div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>
<script>
$(function () {
$(".datatable").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
http://fordev22.com/
"ordering": true,
"info": true,
"autoWidth": false,
});
});
</script>
</body>
</html>