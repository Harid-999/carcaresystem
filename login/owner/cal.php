<?php
session_start();
if($_SESSION["permission"] != '1'){
  Header("Location: ../");
}
$menu = "Cal";
 include("header.php"); ?>

<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>รายรับประจำ</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- <div class="row">
        <div class="col-12">

          <div class="card card-body p-1"> -->

           <!-- <div class="row">
              <div class="col-4">
                 <select name="a1" id="a1" class="form-control select2">
                              <option value="" selected>-- เลือก --</option>
                                   
                               <option value="" >fordev22</option>
                               <option value="" >devbanban</option>
                               <option value="" >devtai</option>
                               <option value="" >ไม่เลือก</option>
                             
                    </select>
              </div>


              <div class="col-4">
                 <select name="a2" id="a2" class="form-control select2">
                              <option value="" selected>-- เลือก --</option>
                                   
                               <option value="" >fordev22</option>
                               <option value="" >devbanban</option>
                               <option value="" >devtai</option>
                               <option value="" >ไม่เลือก</option>
                             
                    </select>
              </div>


              <div class="col-4">
                 <select name="a3" id="a3" class="form-control select2">
                              <option value="" selected>-- เลือก --</option>
                                   
                               <option value="" >fordev22</option>
                               <option value="" >devbanban</option>
                               <option value="" >devtai</option>
                               <option value="" >ไม่เลือก</option>
                             
                    </select>
              </div>
           </div> -->
              
          <!-- </div> -->





          <div class="card">
            <div class="card-header">
              <h3 class="card-title">เลือกรูปแบบคำนวณรายได้ประจำวัน/เดือน/ปี</h3>
            </div>
            <br>
            <div class="card-body p-1">

              <div class="row">
                <div class="col-md-1">
                  
                </div>


                <div class="col-md-10">
                  <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <!-- <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Text Disabled</label>
                        <input type="text" class="form-control" placeholder="Enter ..." disabled="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12"> -->
                      <!-- textarea -->
                      <!-- <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="ckeditor" cols="" rows="3"  name="mc_profile" id="exampleFormControlTextarea1" rows="3"></textarea>  
                      </div>
                    </div>
                    
                  </div> -->

                  <!-- input states -->
                  <!-- <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                      success</label>
                    <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Input with
                      warning</label>
                    <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Input with
                      error</label>
                    <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
                  </div> -->

                  <div class="row">
                    <div class="col-sm-8">
                      
                      <div class="form-group">
                        <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label">Checkbox</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="">
                          <label class="form-check-label">Checkbox checked</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" disabled="">
                          <label class="form-check-label">Checkbox disabled</label>
                        </div> -->
                       
                        <!-- <div class="form-check">
                          <input class="form-check-input" type="radio" name="day">
                          <label class="form-check-label">คำนวณรายได้ประจำวัน</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="month">
                          <label class="form-check-label">คำนวณรายได้ประจำเดือน</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="year" >
                          <label class="form-check-label">คำนวณรายได้ประจำปี</label>
                        </div> -->
                        <!-- radio -->
                      <div class="form-group">
                      <label class="col-form-label" > กรณีคำนวณรายได้ประจำวันต้องเลือกวันที่คำนวณ </label>
                        <div class="form-check">
                          <input class="form-check-input" value="day" type="radio" name="day" required>
                          <label class="form-check-label">คำนวณรายได้ประจำวัน</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="month" type="radio" name="month" required>
                          <label class="form-check-label">คำนวณรายได้ประจำเดือน</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="year" type="radio" name="year" required>
                          <label class="form-check-label">คำนวณรายได้ประจำปี</label>
                        </div>
                      </div>
                      <!--END radio -->
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <!-- <div class="form-check">
                          <input class="form-check-input" type="radio" disabled="">
                          <label class="form-check-label">รายได้ประจำปี</label>
                        </div> -->
                      <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label">บาท</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="">
                          <label class="form-check-label">บาท</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" disabled="">
                          <label class="form-check-label">บาท</label>
                        </div> -->

                        <!-- <select name="booking_status" id="" class="form-control select2">
                        <option value="0"<?php if($row['booking_status'] == '0') { echo 'selected'; }?>>รออนุมัติ  </option>
                        <option value="1"<?php if($row['booking_status'] == '1') { echo 'selected'; }?>>ยืนยันแล้ว </option>
                        <option value="2"<?php if($row['booking_status'] == '2') { echo 'selected'; }?>>กำลังเข้ารับบริการ </option>
                        <option value="3"<?php if($row['booking_status'] == '3') { echo 'selected'; }?>>สำเร็จ </option>
                       </select> -->
                       
                        <!-- <select name="a3" id="a3" class="form-control select2">
                          <option value="" selected>DATE</option>
                          <option value="" >fordev22</option>
                          <option value="" >devbanban</option>
                          <option value="" >devtai</option>
                          <option value="" >ไม่เลือก</option>
                        </select> -->
                      </div>
                    </div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label>Select</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Disabled</label>
                        <select class="form-control" disabled="">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      
                      <div class="form-group">
                        <label>Select Multiple</label>
                        <select multiple="" class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Multiple Disabled</label>
                        <select multiple="" class="form-control" disabled="">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>

                  </div> -->

                  <!-- <div class="col-sm-6">
                  <div class="custom-file">

                      <label for="" >รูปภาพ</label><label style="color: red;">*</label>
                      
                      <input type="file" class="form-control" name="mc_img" id="mc_img" onchange="readURL(this);" /><br>
                      <img id="blah" src="#" alt="your image" width="50%" />
                  </div>
                </div> -->
              <br>
              <br>
               <br>
                <br>




              <button type="submit" class="btn btn-success form-control" name='cal'>Calulate</button>
              <br>
              <br>


                </form>
                </div>


                <div class="col-md-1">
                  
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
<!-- http://fordev22.com/ -->
