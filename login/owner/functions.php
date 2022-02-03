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
        mysqli_query($con,'SET NAMES UTF8');
        $this->dbcon = $con ;

        if(mysqli_connect_errno()){
            echo "เชื่อมต่อฐานข้อมูลล้มเหลว" . mysqli_connect_error();
        }
    }

    /*CUSTOMER QUERY AND SCRIPT*/ 
    // ------------ Select Customer ------------
    public function fetchCustomer(){
        $resultSelectCustomer  = mysqli_query($this->dbcon, "SELECT * FROM users WHERE permission=3 and IsDelete not like 1 ");
        return $resultSelectCustomer;
    }
    // ------------ Insert Customer ------------
    public function insertCustomer($email, $password, $name, $tel, $permission){
        $resultInsertCusomer = mysqli_query($this->dbcon, "INSERT INTO users(email, password, permission, name, tel) VALUE ('$email', '$password', '$permission', '$name', '$tel')");
        return $resultInsertCusomer;
    }
    // ------------ Select for Update Customer ------------
    public function fetchCustomer_Update($id){
        $resultBeforeUpdateCustomer = mysqli_query($this->dbcon, "SELECT * FROM users WHERE id='$id' ");
        return $resultBeforeUpdateCustomer;
    }
    // ------------ Update Customer ------------
    public function updateCustomer($id, $email, $password, $name, $tel){
        $rusultUpdateCustomer = mysqli_query($this->dbcon, "UPDATE users SET 
        email = '$email', 
        password = '$password',
        name ='$name', 
        tel ='$tel' 
        WHERE id = '$id' ");
        return $rusultUpdateCustomer;
    }
    // ------------ Delete Customer ------------
    public function deleteCustomer($del_id){
        // $resultDelCustomer = mysqli_query($this->dbcon, "DELETE FROM users WHERE id='$del_id' ");
        $resultDelCustomer = mysqli_query($this->dbcon, "UPDATE users SET 
        IsDelete = 1
        WHERE id = '$del_id' ");
        return $resultDelCustomer;
    }

    /*EMPLOYEE QUERY AND SCRIPT*/
    // ------------ Select Employee ------------
    public function fetchEmployee(){
        $resultSelectEmployee  = mysqli_query($this->dbcon, "SELECT * FROM users WHERE permission=2 and IsDelete not like 1 ");
        return $resultSelectEmployee;
    }
    // ------------ Insert Employee ------------
    public function insertEmployee($email, $password, $name, $tel, $permission){
        $resultInsertEmployee = mysqli_query($this->dbcon, "INSERT INTO users(email, password, permission, name, tel) VALUE ('$email', '$password', '$permission', '$name', '$tel')");
        return $resultInsertEmployee;
    }
    // ------------ Select for Update Employee ------------
    public function fetchEmployee_Update($id){
        $resultBeforeUpdateEmployee = mysqli_query($this->dbcon, "SELECT * FROM users WHERE id='$id' and permission like 2");
        return $resultBeforeUpdateEmployee;
    }
    // ------------ Update Employee ------------
    public function updateEmployee($id, $email, $password, $name, $tel){
        $rusultUpdateEmployee = mysqli_query($this->dbcon, "UPDATE users SET 
        email = '$email', 
        password = '$password',
        name ='$name', 
        tel ='$tel' 
        WHERE id = '$id' AND permission like 2 ");
        return $rusultUpdateEmployee;
    }
    // ------------ Delete Employee ------------
    public function deleteEmployee($del_id){
        $resultDelEmployee = mysqli_query($this->dbcon, "UPDATE users SET 
        IsDelete = 1
        WHERE id = '$del_id' AND permission like 2");
        return $resultDelEmployee;
    }

    /*SERVIECES*/ 
    // Packages.. 
    public function fetchPackages(){
        $resultSelectPackages = mysqli_query($this->dbcon, "SELECT * FROM package ");
        return $resultSelectPackages;
    }
    
    // fetchBooking..
    public function fetchBooking(){
        $resultSelectBooking= mysqli_query($this->dbcon, 
        // "SELECT *, 
        // case
        //     when booking_status = 0  then 'รออนุมัติ'
        //     when booking_status = 1  then 'ยืนยันแล้ว'
        //     when booking_status = 2  then 'กำลังเข้ารับบริการ'
        //     when booking_status = 3  then 'สำเร็จ'
        //     else 'ผิดพลาด'
        // end as booking_status2
        
        //  FROM booking 
        "select b.booking_id, u.name, u.tel,  
        b.booking_date, b.IsDelete, b.IsCancel,
        case
            when b.time_id = 1  then 'คิวที่ 1 เวลา 9.00 - 10.30'
            when b.time_id = 2  then 'คิวที่ 2 เวลา 10.30 - 12.00'
            when b.time_id = 3  then 'คิวที่ 3 เวลา 13.00 - 14.30'
            when b.time_id = 4  then 'คิวที่ 4 เวลา 14.30 - 16.00'
            when b.time_id = 5  then 'คิวที่ 5 เวลา 16.00 - 17.30'
            else ''
        end as time_id, 
        case
            when b.booking_status = 0  then 'รอตรวจสอบ'
            when b.booking_status = 1  then 'ยืนยัน'
            when b.booking_status = 2  then 'กำลังเข้ารับบริการ'
            when b.booking_status = 3  then 'สำเร็จ'
            else ''
        end as booking_status, 
        case
            when b.package_id = 1  then 'รถเก๋ง 200 บาท'
            when b.package_id = 2  then 'รถกระบะ 2 ประตู 220 บาท'
            when b.package_id = 3  then 'รถกระบะ 4 ประตู 250 บาท'
            when b.package_id = 4  then 'รถตู้ 300 บาท'
            else ''
        end as package_id
        from booking b
        LEFT join users u 
        on u.id = b.user_id 
        where 
        b.IsDelete != '1' 
        and
        b.IsCancel != '1' ");
        return $resultSelectBooking;
    }

    // fetch_update_booking..
    public function fetch_update_booking($booking_id){
        $resultUpdateBooking= mysqli_query($this->dbcon, "SELECT * from booking where booking_id = '$booking_id' ");
        
        return $resultUpdateBooking;
    }
    // ------------ Update Service ยืนยัน, กำลังดำเนินการ , สำเร็จ ------------
    public function UpdateService($booking_id, $time_id, $package_id, $booking_status){
        $rusultUpdateService = mysqli_query($this->dbcon, "UPDATE booking SET 
        time_id = '$time_id', 
        package_id = '$package_id',
        booking_status ='$booking_status'
        WHERE booking_id = '$booking_id' ");
        return $rusultUpdateService;
    }
    // ------------ delete Service ------------
    public function deleteBooking($booking_id){
        $rusultUpdateService = mysqli_query($this->dbcon, "UPDATE booking SET 
        IsDelete = '1'
        WHERE booking_id = '$booking_id' ");
        return $rusultUpdateService;
    }


    // Calulate รายได้ประจำ

    public function fetchDate(){
        $resulFetchDate= mysqli_query($this->dbcon, "select DISTINCT booking_date from booking");
        return $resulFetchDate;
    }

    public function calDay(/*$booking_date*/){
        $resultDay= mysqli_query($this->dbcon, 
        "select  date(B.booking_date) as date, SUM(P.package_price) as income
        FROM 
            booking B
        JOIN package P
        ON P.package_id = B.package_id
        where 
            B.booking_status = 3 and B.IsDelete !=1 and B.IsCancel != 1
           GROUP by (B.booking_date) ");
        return $resultDay;
    }

    public function calMonth(){
        $resultMonth = mysqli_query($this->dbcon, 
        "select date_format(b.booking_date, '%M'), sum(P.package_price)
        from booking B
        join package P
        on P.package_id = B.package_id
        where 
            B.booking_status = 3 and B.IsDelete !=1 and B.IsCancel != 1
        group by date_format(b.booking_date, '%M') ");
        return $resultMonth;
    }

    public function calYear(){
        $resultYear = mysqli_query($this->dbcon, 
        "select date_format(b.booking_date, '%M %Y'), sum(P.package_price)
        from booking B
        join package P
        on P.package_id = B.package_id
        where 
            B.booking_status = 3 and B.IsDelete !=1 and B.IsCancel != 1
            group by year(b.booking_date), month(b.booking_date) ");
        return $resultYear;
    }
    public function calMonthPerYear(){
        $resultMonthPerYear = mysqli_query($this->dbcon, 
        "select date_format(b.booking_date, '%M %Y') as monthPerYear, sum(P.package_price) as income
        FROM booking B
        JOIN package P
        ON P.package_id = B.package_id
        where 
            B.booking_status = 3 and B.IsDelete !=1 and B.IsCancel != 1
        group by year(b.booking_date), month(b.booking_date) ");
    return $resultMonthPerYear;
    }
}

?>