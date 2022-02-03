<?php
    session_start();
    if($_SESSION["permission"] != '1'){
      Header("Location: ../");
    }
    
    include_once('functions.php');
    if(isset($_GET['del_id'])){
        $del_id = $_GET['del_id'];
        $deleteCustomer = new DB_con();
        $sql = $deleteCustomer->deleteCustomer($del_id);

        if($sql){
            echo "<script>alert('ลบข้อมูลลูกค้าสำเร็จ ^^');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }else{
            
        }
    }
    
?>