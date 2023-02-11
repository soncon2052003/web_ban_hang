<?php
require "database.php";
class comment{  
    public $id;
    public $fullname;
    public $rate;
    public $content;
    public $id_sp; 
    public $date;
    public function __construct($fullname,$rate,$content,$id_sp,$date)
    {
        $this->fullname = $fullname;
        $this->rate = $rate;
        $this->content = $content;
        $this->id_sp = $id_sp;
        $this->date = $date;
    } 
    public function get_id(){
        return $this->id;
    }
    public function get_fullname(){
        return $this->fullname;
    }
    public function get_rate(){
        return $this->rate;
    }
    public function get_content(){
        return $this->content;
    }
    public function get_id_sp(){
        return $this->id_sp;
    }
    public function get_date(){
        return $this->date;
    }
    public function them_comment(){
        $db= new Database;
        $conn = $db->conn();
        $sql = "INSERT INTO comment(fullname,rate,content,id_sp,date) 
        VALUES('$this->fullname','$this->rate','$this->content','$this->id_sp','$this->date')";
        if($conn->query($sql)===true){
            echo "<script>
            window.history.back();
            </script>";
        }else{
            echo "Lỗi " . $sql . "<br>" .$conn->error;
        }
    }

    public static function show_comment($id_sp){
        $db = new Database;
        $conn = $db->conn();
        $sql = "SELECT * FROM comment WHERE id_sp=$id_sp ORDER BY id DESC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            include("C:\laragon\www\web/view/comment.php");
        }
    }  

    public static function delete_comment($id_cm){
        $db= new Database;
        $conn = $db->conn();
        $sql = "DELETE FROM comment WHERE id=$id_cm";
        if($conn->query($sql)===true){
            echo "<script>
            window.history.back();
            </script>";
        }else{
            echo "Lỗi " . $sql . "<br>" .$conn->error;
        }
    }

}
?>    