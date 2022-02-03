<?php require_once("../config/connection.php"); ?>

<?php
    #----------- ป้องกัน sql injection -----------#
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $remember = isset($_POST['remember']);
    $query_user = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password' ");
    if($query_user->num_rows >= 1){    
        if($remember){
            // ฝั่ง Cookie 
            setcookie("email", $_POST['email'], time()+3600*24*356);        
            setcookie("password", $_POST['password'], time()+3600*24*356);
        }else{
            setcookie("email",  "");
            setcookie("password", "");
        }
        session_start();
        $row = mysqli_fetch_array($query_user, MYSQLI_ASSOC);

        #---------- กำหนดค่า SESSION  ----------# 
        $_SESSION["id"] = $row["id"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["permission"] = $row["permission"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["tel"] = $row["tel"];

        // admin หรือ เจ้าของร้าน
        if($_SESSION["permission"] == 1){
            Header("Location: owner/");
        }
        // พนักงาน
        else if($_SESSION["permission"] == 2){
            Header("Location: employee/");
        }
        // ลูกค้า
        else if($_SESSION["permission"] == 3){
            Header("Location: customer/");
        }
    
    }
    else{
        Header("Location: index.php?login=login_fall");
    }
    
?>