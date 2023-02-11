<!DOCTYPE html>
<?php 
require_once "./model/header.php";
require_once "./model/connect.php";
require_once "./model/comment.php";
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>

    <title>Thông tin sản phẩm</title>
</head>
<body>
    <br><br>    
    <form action="http://web.test/controller/cart.php?action=add_comment" method="post">
        <div class="row">
            <div class="col">
                <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                $sql = "SELECT * FROM sanpham WHERE id = $id";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                ?>
                <img src="<?= $row['image'] ?>" style="width: 500px;height: 300px">
                <input type="hidden" name="product_id" value=<?= $row['id'] ?> >
            </div>
            <div class="col">
                <p class="h2 text text-danger"><?= $row['tensanpham'] ?></p>
                <div class="text text-success">Miêu tả: </div>
                <div><?=  $row['mieuta'] ?></div>
                <button type="submit" class="btn btn-info border my-3" name="add"><i class="fa-solid fa-cart-shopping"></i>Thêm vào giỏ</button>
            </div> 
            <?php } ?>
        </div>
    </form>
    <div>
        <?php 
        if(isset($_SESSION['id'])){
            include_once "./view/comment_form.php"; //Khung comment 
        }else{
            echo "<br><p class='text text-danger'>HÃY ĐĂNG NHẬP ĐỂ BÌNH LUẬN BẠN NHÉ!</p><br>";
        }
        ?>
    </div>
    <div class="row"> 
    <?php 
    comment::show_comment($id) 
    ?>
    </div> 
</body>

</html>