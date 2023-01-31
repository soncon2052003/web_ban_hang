<!DOCTYPE html>
<?php
require_once "./model/header.php";
require "./model/connect.php";
require "./model/sanpham.php";

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'],"product_id");
        if(in_array($_POST['product_id'],$item_array_id)){
            echo "<script>window.location = 'index.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item = array(
                'product_id' => $_POST['product_id']
            ); 

            $_SESSION['cart'][$count] = $item;        
        }
    }else{
        $item = array(
            "product_id" => $_POST['product_id']
        );

        //create new session variable
        $_SESSION['cart'][0] = $item;
    }
}

$sql = "SELECT * FROM sanpham LIMIT 6";
$result = $conn->query($sql);
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <a class="fa-solid fa-user fa-2x fa-border fa-pull-right btn btn-success" href="http://web.test/view/sua_user.php?id=<?= $_SESSION['id'] ?>"><?= $_SESSION['fullname']?></a>
        <a class="fa-solid fa-right-from-bracket fa-2x fa-border fa-pull-right" href="http://web.test/controller/logout.php"></a>
        <a href="http://web.test" class="btn btn-info">Trang chủ</a>
        <a href="http://web.test/view/tintuc.php" class="btn btn-info">Tin tức</a>
    </div>  
    
    <div class="container">
        <div class="row text-center py-5">           
            <?php
            while($row = $result->fetch_assoc()){
                card_sp($row['image'],$row['tensanpham'],$row['gia'],$row['soluong'],$row['diachi'],$row['id']);
            } 
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>

