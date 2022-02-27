<?php
session_start();
if($_SESSION["permission"] != '3'){
  Header("Location: ../");
}
$menu = "Customer";

?>
<?php include("header.php"); ?>
<!-- Content Header (Page header) --> 
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa fa-car"></i> รายการจอง </h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    
    
    
    <div class="card">
      <div class="card-header card-navy card-outline">
       
      <form action="booking.php" method="get" >
        <div align="right">

        <p>เลือกวันที่ล้างรถ : <input type="text" id="datepicker" name="dateWash"></p>
        <button type="submit" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> จองคิวล้างรถ</button></a>
        </div>
      </div>
      </form>
      <br>
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr align="center" role="row" class="info">
                  
                  <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ช่วงเวลาที่จอง</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">package_id</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">booking_date</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">booking_status</th> -->
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ลำดับ</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่ทำการจอง</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ลำดับคิว/ช่วงเวลาที่จอง</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">แพ็กเกจที่จอง</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะการจอง</th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">แก้ไขการจอง</th>
                </tr>
              </thead>
              <tbody>
              <?php
                include('functions.php');
                $fetchBooking = new DB_con(); 
                // $Query = $fetchBooking->fetchBooking($_SESSION["id"]);   
                $Query = $fetchBooking->fetchBookingNew($_SESSION["id"]);  
                $i = 0;
                while($row=mysqli_fetch_array($Query)){
                  $i++
              ?>
                <tr>
                  
                  <td align="center"><?php echo $i ?></td>
                  <td align="center"><?php echo $row['DateWash']; ?></td>
                  <td><?php echo $row['time_id']; ?></td>
                  <td><?php echo $row['packageName'].' '.$row['packagePrice'].' บาท' ?></td>
                  <td align="center"><?php echo $row['booking_status']; ?></td>
             
                  <td align="center">
                    
              <?php
        if($row['booking_status'] == "รอตรวจสอบ") { ?>
        <a class='btn btn-warning btn-ls' href='update_booking.php?booking_id=<?php echo $row['booking_id']?>&DateWash=<?php echo $row['DateWash']?>'>
                <i class="fas fa-pencil-alt">
                </i>
              </a>

              <a class='btn btn-danger btn-ls' href='delete_booking.php?del_id=<?php echo $row['booking_id']?>'>
                <i class="fas fa-trash-alt">
                </i>
              </a>
                
      <?php  } else{  echo "-";}?>
          
                    
<!-- echo '<input type="button" onClick="parent.location.href='index.php?module=User'" value="click here">'; -->

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