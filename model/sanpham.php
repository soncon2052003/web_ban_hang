<?php
require __DIR__.'\database.php';
require('C:\laragon\www\web\help\helper.php');
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
}

function card_sp($image,$tensanpham,$gia,$soluong,$diachi,$id){
    $element = "
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"index.php\" method=\"post\">
            <div class=\"card shadow\">  
                <div>
                    <img src=\"$image\" alt=\"\" class=\"img-fluid\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$tensanpham</h5>
                    <p class=\"card-text\">Giá: $gia</p>
                    <p class=\"card-text\">Số lượng: $soluong</p>
                    <p class=\"card-text\">Địa chỉ: $diachi</p>
                    <button type=\"submit\" class=\"btn btn-info my-3\" name=\"add\">Thêm vào giỏ<i class=\"fas fa-shopping-cart\"></i></button>
                    <input type=\"hidden\" name='product_id' value='$id'>
                </div>
            </div>
        </form>
    </div>
    ";
    echo $element;
}

function cartElement($productid,$productname,$productimg,$productprice,$productaddress){
    $element = "
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
        <div class=\"border rounded\">
            <div class=\"row bg-white\">
                <div class=\"col-md-3 pl-0\">
                    <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                </div>
                <div class=\"col-md-6\">
                    <h5 class=\"pt-2\">$productname</h5>
                    <small class=\"text-secondary\">$productaddress</small>
                    <h5 class=\"pt-2\">$productprice đ</h5>
                    <button type=\"submit\" class=\"btn btn-warning\">Mua sau</button>
                    <button type=\"submit\" class=\"btn btn-danger\" name=\"remove\">Xóa</button>
                </div>
                <div class=\"col-md-3 py-5\">
                    <div>
                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                        <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    ";
    echo $element;
}
?>