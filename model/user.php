<?php
require_once "database.php";

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
    public function ds_user(){
        $db = new Database;
        $conn = $db->conn();
        $sql = "SELECT * FROM user";
        $result=$conn->query($sql);
        $user = [];
        while($row = $result->fetch_assoc()){
            $user[] = $row;
        }
        return $user;
    }
    public function them_user(){
        $db = new Database;
        $conn = $db->conn();
        $sql = "INSERT INTO user (username,password,fullname,age,sdt) 
            VALUES('$this->username','$this->password','$this->fullname','$this->age','$this->sdt')";
        if($conn->query($sql)===true){
            header("Location: http://localhost/web/view/user.php");
        }else{
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    public function sua_user($id){
        $db = new Database;
        $conn = $db->conn();
        $sql = "UPDATE user SET username='$this->username',password='$this->password',fullname='$this->fullname',
            age='$this->age', sdt='$this->sdt' WHERE id=$id";
        if($conn->query($sql)===true){
            header("Location: http://localhost/web/view/user.php");
        }else{
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
    public function xoa_user($id){
        $db = new Database;
        $conn = $db->conn();
        $sql = "DELETE FROM user WHERE id=$id";
        if($conn->query($sql)===true){
            header("Location: http://localhost/web/view/user.php");
        }else{
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>