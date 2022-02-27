<?php
    // define("DB_SERVER", "localhost");
    // define("DB_USER", "root");
    // define("DB_PASS", "");
    // define("DB_NAME", "mbcarcare");
    define("DB_SERVER", "dns.komkawila.com");
    define("DB_USER", "carcaresystem");
    define("DB_PASS", "P@ssw0rd");
    define("DB_NAME", "mbCarcare");

class DB_con{
    function __construct(){ 
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $con ;
        mysqli_query($con,'SET NAMES UTF8');
        if(mysqli_connect_errno()){
            echo "เชื่อมต่อฐานข้อมูลล้มเหลว" . mysqli_connect_error();
        }
    }

    // fetchBooking..
    public function fetchBooking($user_id){
        $resultSelectBooking= mysqli_query($this->dbcon, "SELECT * FROM booking where user_id like $user_id");
        return $resultSelectBooking;
    }

    public function fetchBookingNew($user_id){
        $resultSelectBookingNew = mysqli_query($this->dbcon, 
        "SELECT booking.booking_id,
        CASE
            WHEN booking.time_id = 1 THEN 'คิวที่ 1 เวลา 9.00 - 10.30'
            WHEN booking.time_id = 2 THEN 'คิวที่ 2 เวลา 10.30 - 12.00'
            WHEN booking.time_id = 3 THEN 'คิวที่ 3 เวลา 13.00 - 14.30'
            WHEN booking.time_id = 4 THEN 'คิวที่ 4 เวลา 14.30 - 16.00'
            WHEN booking.time_id = 5 THEN 'คิวที่ 5 เวลา 16.00 - 17.30'
            ELSE 'ยังไม่ระบุคิวที่รับบริการ'
        END as time_id,
        CASE
            WHEN booking.package_id = 1 THEN 'รถเก๋ง ราคา 200 บาท'
            WHEN booking.package_id = 2 THEN 'รถกระบะ 2 ประตู ราคา 220 บาท'
            WHEN booking.package_id = 3 THEN 'รถกระบะ 4 ประตู ราคา 250 บาท'
            WHEN booking.package_id = 4 THEN 'รถตู้ ราคา 300 บาท'
            ELSE 'ยังไม่ระบุชนิดรถที่รับบริการ'
        END as CarType, 
        booking.booking_date as DateWash,
        CASE
            WHEN booking.booking_status = 0 THEN 'รอตรวจสอบ'
            WHEN booking.booking_status = 1 THEN 'ยืนยัน'
            WHEN booking.booking_status = 2 THEN 'กำลังเข้ารับบริการ'
            WHEN booking.booking_status = 3 THEN 'สำเร็จ'
            ELSE 'ยังไม่ระบุชนิดรถที่รับบริการ'
        END as booking_status
        ,package.package_name as packageName
        ,package.package_price as packagePrice
        FROM booking
        left join package
        on package.package_id = booking.package_id
        where user_id = $user_id
        and IsCancel != '1' and IsDelete != '1' ");
        return $resultSelectBookingNew ;
    }

    // ------------ InsertBooking ------------
    public function InsertBooking($dateWash, $time_id, $package_id,  $user_id){
        $resultInsertBooking = mysqli_query($this->dbcon, "INSERT INTO booking
        (user_id, booking_date, time_id, package_id) 
        VALUE ('$user_id', '$dateWash', '$time_id', '$package_id')");
        return $resultInsertBooking;
    }

    // select ก่อน update    :   fetch_update_booking
    public function fetch_update_booking($user_id, $booking_id){
        $resultfetchBooking= mysqli_query($this->dbcon, "SELECT *,package.package_name as packName  FROM booking
        left join package 
        on package.package_id = booking.package_id
        where user_id = $user_id and booking_id = $booking_id");
        return $resultfetchBooking;
    }
    // ------------ Update Booking ------------
    public function updateBooking($booking_id, $time_id, $package_id, $user_id){
        $rusultUpdateBooking = mysqli_query($this->dbcon, "UPDATE booking SET 
        time_id = '$time_id', 
        package_id = '$package_id'
        WHERE user_id = '$user_id' AND booking_id like $booking_id 
        /*and booking_status = 0*/ ");
        return $rusultUpdateBooking;
    }
    // delBooking
    public function delBooking($booking_id){
        $rusultUpdateBooking = mysqli_query($this->dbcon, "UPDATE booking SET 
        -- IsDelete = 1,
        IsCancel = 1
        WHERE booking_id = '$booking_id' 
        and booking_status != 1 and booking_status != 2 and booking_status != 3 ");
        return $rusultUpdateBooking;
    }
    // select T.time_id, T.time_name, B.booking_date from time_tb T 
    // left join booking B on B.time_id = T.time_id 
    // where B.booking_date = '2022-02-02';

    // public function checkRepeate($dateWash, $package_id){  //หมายเลขแพ็กเกจ, วันที่ล้างรถ
    //     $resultCheckRepeate= mysqli_query($this->dbcon, 
    //     "select if(T.time_id = $package_id, 1, 0) as can
    //     from time_tb T left join booking B on B.time_id = T.time_id
    //     where B.booking_date = '$dateWash'");
    //     return $resultCheckRepeate;
    // }
    
    // เช็คคิวล้างรถ
    public function checkRepeate($dateWash, $time_id){  //วันที่ล้างรถ, คิวล้างรถ
        $resultCheckRepeate= mysqli_query($this->dbcon, 
        "select T.time_id as test
        from time_tb T left join booking B on B.time_id = T.time_id
        where B.booking_date = '$dateWash'
        and T.time_id = '$time_id'");
        return $resultCheckRepeate;
    }
    //เช็คจำนวนล้างรถ
    public function checkMax($dateWash){  
        $resultCheckMax= mysqli_query($this->dbcon, 
        "select count(booking_id) as max
        from booking 
        where booking_date = '$dateWash'");
        return $resultCheckMax;
    }

    public function Package(){
        $resultPackage = mysqli_query($this->dbcon,"select * from package");
        return $resultPackage;
    }
    public function UpsPackage($packageID){
        $resultPackage = mysqli_query($this->dbcon,"select * from package where package_id != '$packageID'");
        return $resultPackage;
    }

}

?>