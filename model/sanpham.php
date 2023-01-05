<?php
require_once "database.php";
class SanPham{
    public $tensanpham;
    public $gia;
    public $soluong;
    public $diachi;
    public $image;
    public function __construct($tensanpham,$gia,$soluong,$diachi,$image)
    {
        $this->tensanpham = $tensanpham;
        $this->gia = $gia;
        $this->soluong = $soluong;
        $this->diachi = $diachi;
        $this->image = $image;
    }

    public function get_tensp(){
        return $this->tensanpham;
    }
    public function get_gia(){
        return $this->gia;
    }
    public function get_soluong(){
        return $this->soluong;
    }
    public function get_diachi(){
        return $this->diachi;
    }
    public function get_image(){
        return $this->image;
    }

    public function them_sp(){
        require_once "../model/connect.php";
        $sql = "INSERT INTO sanpham (tensanpham,gia,soluong,diachi,image) 
            VALUES('$this->tensanpham','$this->gia','$this->soluong','$this->diachi','$this->image')";
        if($conn->query($sql)===true){
            header("Location: http://localhost/web/view/sp.php");
        }else{
            echo "Lỗi " . $sql . "<br>" . $conn->error;
        }
    }

    public function sua_sp($id){
        require_once "../model/connect.php";
        $sql = "UPDATE sanpham SET tensanpham='$this->tensanpham',gia='$this->gia',soluong='$this->soluong'
            ,diachi='$this->diachi',image='$this->image' WHERE id=$id";
        if($conn->query($sql)===true){
            header("Location: http://localhost/web/view/sp.php");
        }else{
            echo "Lỗi ". $sql ."<br>". $conn->error;
        }
    }

}
?>