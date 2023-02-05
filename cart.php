<!DOCTYPE html>
<?php
include "./model/header.php";
include "./model/sanpham.php";
include_once "./help/helper.php";
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php if(isset($_SESSION['fullname'])){ ?>
    <a class="fa-solid fa-user fa-2x fa-border fa-pull-right btn btn-success" href="http://web.test/view/sua_user.php?id=<?= $_SESSION['id'] ?>"><?= $_SESSION['fullname']?></a>
    <a class="fa-solid fa-right-from-bracket fa-2x fa-border fa-pull-right" href="http://web.test/controller/logout.php"></a>
    <?php }else{ ?>
    <p href="http://web.test/login.php" class="btn btn-primary fa-pull-right">Đăng nhập</p>
    <?php } ?>
    <div class="row">
        <div class="col-md-6">
            <div class="shopping-cart">
                <h6>Giỏ hàng</h6>
                <hr>

                <?php
                if(isset($_SESSION['cart'])){
                    $total = 0;
                    $product_id = array_column($_SESSION['cart'],"product_id");//become an array
                    $result = Helper::getData('sanpham');
                    while($row = $result->fetch_assoc()){
                        foreach($product_id as $id){
                            if($row['id']==$id){
                                include "./cart_thanhtoan.php";
                                $total = $total + (int)$row['gia']*$_SESSION['cart'][$chiso]['count'];
                            }
                        }
                    }
                }else{
                    echo "<h5>Cart is empty</h5>";die;
                }

                ?>
            </div>
        </div>
        <div class="col-md-6" style="background-color:aliceblue;">
            <div class="pt-4">
                <h6>TỔNG THANH TOÁN</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<h6>Giá ($count sản phẩm)</h6>";   
                        }else{
                            echo "<h6>Giá (0 sản phẩm)</h6>";
                        }
                        ?>
                        <h6>Phí vận chuyển</h6>
                        <hr>
                        <h6>Tổng</h6>
                    </div>
                    <div class="col-md-6">
                        <h6><?= $total ?> đ</h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6><?= $total ?> đ</h6>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thanh toán</button>
            </div>
        </div>
    </div>
</body>
</html>

