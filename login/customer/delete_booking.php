<?php
    session_start();
    if($_SESSION["permission"] != '3'){
      Header("Location: ../");
    }
    
    include_once('functions.php');
    if(isset($_GET['del_id'])){

        $del_id = $_GET['del_id'];
        $delBooking = new DB_con();
        $sql = $delBooking->delBooking($del_id);

        if($sql){
            echo "<script>alert('ลบข้อมูลจากจอง ^^');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
    
?>