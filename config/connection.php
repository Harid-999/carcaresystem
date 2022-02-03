<?php

    // $con = mysqli_connect("127.0.0.1", "root", "", "mbCarcare");
    $con = mysqli_connect("dns.komkawila.com", "carcaresystem", "P@ssw0rd", "mbCarcare");
    mysqli_query($conn,'SET NAMES UTF8');
    if(mysqli_connect_error($con)){
        //echo "เชื่อมต่อฐานข้อมูลล้มเหลว.";
        echo json_decode("connect failed");
    } 
    else{
        //echo "เชื่อมต่อฐานข้อมูลสำเร็จ.";
        mysqli_query($con, "SET NAMES 'utf8' ");
    }
        
?>