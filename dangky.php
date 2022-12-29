<?php
require './connect.php';

class get_data{
    public $username;
    public $password;
    public $fullname;
    public $age;
    public $sdt;
    public function __construct($username,$password,$fullname,$age,$sdt)
    {
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->age = $age;
        $this->sdt = $sdt;
    }
    public function get_username(){
        return $this->username;
    }
    public function get_password(){
        return $this->password;
    }
    public function get_fullname(){
        return $this->fullname;
    }
    public function get_age(){
        return $this->age;
    }
    public function get_sdt(){
        return $this->sdt;
    }
};

$data = new get_data($_POST['username'],$_POST['password'],
$_POST['fullname'],$_POST['age'],$_POST['sdt']);

$sql = "INSERT INTO `user` (`username`,`password`,`fullname`,`age`,`sdt`) 
    VALUES('$data->username','$data->password',
    '$data->fullname','$data->age','$data->sdt')";

if($conn->query($sql)===TRUE){
    echo "Luu du lieu than cong";
}else{
    echo "Loi {$sql}".$conn->error;
}
?>