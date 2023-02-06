<!DOCTYPE html>
<?php require_once "./model/header.php"; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">

        <title>Thông tin sản phẩm</title>
    </head>
    <body>
        <a href="http://web.test" class="btn btn-primary">Trở về</a>        
        <form action="http://web.test/controller/cart.php" method="post">
            <div class="row">
                <div class="col">
                    <?php
                    require_once "./model/connect.php";
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    $sql = "SELECT * FROM sanpham WHERE id = $id";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        include "./card_sp.php" ;       
                    ?>
                </div>
                <div class="col">
                    <div class="text text-success">Miêu tả: </div>
                    <div><?=  $row['mieuta'] ?></div>
                    <button type="submit" class="btn btn-info border my-3" name="add"><i class="fa-solid fa-cart-shopping"></i>Thêm vào giỏ</button>
                </div>
                <?php } ?>
            </div>
        </form>
        <div>
                <?php include "./view/comment.php"; ?>

        </div>
        
        <?php
        include "./view/comment.php";
        ?>
    </body>
</html>
<?php var_dump($_SESSION);die; ?>
