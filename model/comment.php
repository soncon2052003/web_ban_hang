<?php
require "database.php";
class comment{  
    public $id;
    public $fullname;
    public $title;
    public $content;
    public $id_sp; 
    public function __construct($fullname,$title,$content,$id_sp)
    {
        $this->fullname = $fullname;
        $this->title = $title;
        $this->content = $content;
        $this->$id_sp;
    } 
    public function get_id(){
        return $this->id;
    }
    public function get_fullname(){
        return $this->fullname;
    }
    public function get_title(){
        return $this->title;
    }
    public function get_content(){
        return $this->content;
    }
    public function get_id_sp(){
        return $this->id_sp;
    }
    public function them_comment(){
        $db= new Database;
        $conn = $db->conn();
        $sql = "INSERT INTO comment(fullname,title,content,id_sp) 
        VALUES('$this->fullname','$this->title','$this->content','$this->id_sp')";
        if($conn->query($sql)===true){
            header("Location: http://web.test/product.php?id=<?= $this->id_sp ?>");
        }else{
            echo "Lỗi " . $sql . "<br>" .$conn->error;
        }
    }

    public static function show_comment($id_sp){
        $db = new Database;
        $conn = $db->conn();
        $sql = "SELECT * FROM comment where id_sp=$id_sp";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            include("C:\laragon\www\web/view/comment.php");
        }
    }

    public function delete_comment($id_cm){
        $db= new Database;
        $conn = $db->conn();
        $sql = "DELETE FROM comment WHERE id=$id_cm";
        if($conn->query($sql)===true){
        
        }
    }
}
?>    