<?php
class tintuc{
    public $title;
    public $short;
    public $content;
    public $img;
    public $dateCreate;
    public function __construct($title,$short,$content,$img,$dateCreate)
    {
        $this->title = $title;
        $this->short = $short;
        $this->content = $content;
        $this->img = $img;
        $this->dateCreate = $dateCreate;
    }
    public function sua_tintuc($id){
        require_once "../model/connect.php";
        $sql = "UPDATE tintuc SET title='$this->title',short='$this->short', content='$this->content',
        img='$this->img' WHERE id=$id";
        if($conn->query($sql)===true){
            header("Location: http://localhost/web/view/tintuc.php");
        }else{
            echo "Lỗi " . $sql . ": " . $conn->error;
        }
    }
    public function them_tintuc(){
        require_once "../model/connect.php";
        $sql = "INSERT INTO tintuc (title,short,content,img,dateCreate) 
            VALUES('$this->title','$this->short','$this->content','$this->img','$this->dateCreate')";
        if($conn->query($sql)===true){
            header("Location: http://localhost/web/view/tintuc.php");
        }else{
            echo "Lỗi " . $sql . ": " . $conn->error;
        }
    }
}
?>