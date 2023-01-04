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

    /*
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
    */
}
?>