<!DOCTYPE html>
<?php
require "./model/connect.php";
$sql = "SELECT * FROM sanpham";
$result = $conn->query($sql);
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <a href="http://localhost/web" class="btn btn-info">Trang chủ</a>
        <a href="http://localhost/web/view/user.php" class="btn btn-info">Người dùng</a>
        <a href="http://localhost/web/view/sp.php" class="btn btn-info">Sản phẩm</a>
        <a href="http://localhost/web/view/tintuc.php" class="btn btn-info">Tin tức</a>
        <a href="http://localhost/web/view/login.php" class="btn btn-info">Đăng nhập</a>
        <a href="http://localhost/web/view/register.php" class="btn btn-info">Đăng ký</a>
    </div>  

    <h2 class="text text-success">Một số sản phẩm nổi bật</h2>
    <div class="card-group">
        <?php
        while($row = $result->fetch_assoc()){
        ?>  
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="" width="400" height="248">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['tensanpham']; ?></h5>
                <p class="card-text"><?php echo "Giá: " . $row['gia']; ?></p>
                <p class="card-text"><?php echo "Số lượng: " . $row['soluong']; ?></p>
                <p class="card-text"><?php echo "Địa chỉ: " . $row['diachi']; ?></p>
                <a href="#" class="btn btn-primary">Go Somewhere</a>
            </div>
            </div>
        <?php
        }
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
