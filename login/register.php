<?php
    include_once('funcIns.php');
    $resgisterCustomer = new DB_con(); 

    if(isset($_POST['insert'])){ 

        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat = $_POST['repeat'];
        $name = $_POST['name'];
        $tel  = $_POST['tel'];
        $permission = "3";
        $check = strcmp($password, $repeat);
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          echo "<script>alert('รูปแบบ Email ไม่ถูกต้อง');</script>";
          echo "<script>window.location.href='register.php'</script>";
        }
        else{
          if(strlen($password) < 8 || strlen($repeat) < 8){
            echo "<script>alert('รหัสผ่านน้อยกว่า 8 ตัว');</script>";
            echo "<script>window.location.href='register.php'</script>";
          }
          else{
            $sql = $resgisterCustomer->resgisterCustomer($email, $password, $name, $tel, $permission);
            if($sql && $check == 0){
                echo "<script>alert('สมัครสมาชิกสำเร็จ ^^');</script>";
                echo "<script>window.location.href='customer.php?email=$email&password=$password&name=$name&tel=$tel'</script>";
             }
            else{
                echo "<script>alert('สมัครสมาชิกไม่สำเร็จ เนื่องจากข้อมูลรหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง');</script>";
                echo "<script>window.location.href='register.php'</script>";
            }
          }
        }      
        
    }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 50px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<!-- <form action="/action_page.php"> -->
<form role="form" action="" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>สมัครสมาชิกร้าน MB Car care.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" onblur='check_email(this)' required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="myInput" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="repeat" id="myInput2" required>

    <input type="checkbox" onclick="myFunction()">Show Password <br><br>

    <label for="psw-repeat"><b>Name - Lastname</b></label>
    <input type="text" placeholder="Enter Name - Lastname" name="name" id="name" required>

    <label for="psw-repeat"><b>Telephone Number</b></label>
    <input type="text" placeholder="Enter Telephone" name="tel" id="tel" required>

    <!-- <hr> -->
    <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->

    <button type="submit" name ="insert" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>เข้าสู่ระบบ <a href="index.php">Sign in</a>.</p>
  </div>
</form>


<script>
  function myFunction() {
    var x = document.getElementById("myInput");
    var y = document.getElementById("myInput2");
    if (x.type === "password" || y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }
</script>
<script type='text/javascript'>
function check_email(elm){
    var regex_email=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
    if(!elm.value.match(regex_email)){
        alert('รูปแบบ email ไม่ถูกต้อง');
    }
}
</script>

</body>
</html>
