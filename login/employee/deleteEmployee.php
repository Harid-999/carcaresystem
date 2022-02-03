<?php

    session_start();
    if($_SESSION["permission"] != '2'){
    Header("Location: ../");
    }
    include_once('functions.php');

    if(isset($_GET['del_id'])){
        $del_id = $_GET['del_id'];
        $deleteEmployee = new DB_con();
        $sql = $deleteEmployee->deleteEmployee($del_id);

        if($sql){
            echo "<script>alert('ลบข้อมูลพนักงานสำเร็จ ^^');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }else{
            
        }
    }
    
?>