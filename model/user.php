<?php
require "connect.php";
class User{
    public $username;
    public $password;
    public $fullname;
    public $age;
    public $sdt;
    public $id;
    public function __construct($username,$password,$fullname,$age,$sdt)
    {
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->age = $age;
        $this->sdt = $sdt;
    }
    
    public function them_user(){
        $sql= "INSERT INTO user ('username','password','fullname','age','sdt') 
            VALUES($this->username,$this->password,$this->fullname,$this->age,$this->sdt)";
            $conn->mysqli($sql);
    }
}
?>