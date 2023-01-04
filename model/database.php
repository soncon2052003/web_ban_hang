<?php
class Database{
    public $host;
    public $username;
    public $password;
    public $dbname;
    public $conn;
    public function __construct(){
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "web_ban_hang";
    }
    function conn(){
        $conn = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        return $conn;
    }
}
/*
$db = new Database;
$conn = $db->conn();
*/
?>