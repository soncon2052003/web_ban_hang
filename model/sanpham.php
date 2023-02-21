<?php
require __DIR__.'\database.php';
require('G:\laragon\www\web\help\helper.php');
//require_once "database.php";
//require_once "../help/helper.php";

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
            header("Location: http://web.test/view/sp.php");
        }else{
            echo "Lỗi " . $sql . "<br>" . $conn->error;
        }
    }

    public function sua_sp($id){
        require_once "../model/connect.php";
        $sql = "UPDATE sanpham SET tensanpham='$this->tensanpham',gia='$this->gia',soluong='$this->soluong'
            ,diachi='$this->diachi',image='$this->image' WHERE id=$id";
        if($conn->query($sql)===true){
            header("Location: http://web.test/view/sp.php");
        }else{
            echo "Lỗi ". $sql ."<br>". $conn->error;
        }
    } 

    public static function get_star($id){
        require_once __DIR__ . "\database.php";
        $db = new Database;
        $conn = $db->conn();
        $sql = "SELECT rate FROM comment WHERE id_sp=$id";
        $total_star = 0;
        $rate = [];
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $rate[] = $row;
            $total_star += $row['rate'];
        }
        $count = count($rate);
        if($count>0)
            return $total_star/$count;
        else return 0;
    }

    public static function get_id_sp(){
        require_once __DIR__ . "\database.php";
        $db = new Database;
        $conn = $db->conn();
        $sql = "SELECT id FROM sanpham";
        $result = $conn->query($sql);
        $list = [];
        while($row = $result->fetch_assoc()){
            $list[] = $row;
        }
        return $list;
    }

    public static function list_star(){
        // Initial Ratings
        $result = SanPham::get_id_sp();
        $count = count($result);
        for($i=0;$i<$count;$i++){
            $rating["product" . $result[$i]['id']] = SanPham::get_star($result[$i]['id']);
        }
        return $rating;
    }

}

?>