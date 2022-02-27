<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "mbcarcare");
    // define("DB_SERVER", "http://dns.komkawila.com");
    // define("DB_USER", "carcaresystem");
    // define("DB_PASS", "P@ssw0rd");
    // define("DB_NAME", "mbCarcare");
class DB_con{
    function __construct(){ 
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        
        mysqli_query($con,'SET NAMES UTF8');
        $this->dbcon = $con ;

        if(mysqli_connect_errno()){
            echo "เชื่อมต่อฐานข้อมูลล้มเหลว" . mysqli_connect_error();
        }
    }
    // ------------ Insert Customer ------------
    public function resgisterCustomer($email, $password, $name, $tel, $permission){
        $resultRegisCusomer = mysqli_query($this->dbcon, "INSERT INTO users(email, password, permission, name, tel) VALUE ('$email', '$password', '$permission', '$name', '$tel')");
        return $resultRegisCusomer;
    }

    // ------------ Select New Customer ------------
    public function NewCustomer($email, $password, $name, $tel){
        $resultNewCustomer = mysqli_query($this->dbcon, "SELECT * FROM users WHERE email='$email' 
        AND password='$password'
        AND name='$name'
        AND tel='$tel' ");
        return $resultNewCustomer;
    }

}

?>