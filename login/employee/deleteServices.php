<?php

    session_start();
    if($_SESSION["permission"] != '2'){
    Header("Location: ../");
    }
    include_once('functions.php');

    if(isset($_GET['booking_id'])){
        $booking_id = $_GET['booking_id'];
        $deleteBooking = new DB_con();
        $sql = $deleteBooking->deleteBooking($booking_id);

        if($sql){
            echo "<script>alert('ลบรายการสำเร็จ ^^');</script>";
            echo "<script>window.location.href='services.php'</script>";
        }else{
            
        }
    }
    
?>