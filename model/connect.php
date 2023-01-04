<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "web_ban_hang";
$conn = new mysqli($host,$username,$password,$dbname);

class Database{
    public $host;
    public $username;
    public $password;
    public $dbname;
    public $conn;
    public function __construct($host,$username,$password,$dbname,$conn){
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "web_ban_hang";
        $conn = null;
    }
    function conn(){
        $conn = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        return $conn;
    }
}
?>