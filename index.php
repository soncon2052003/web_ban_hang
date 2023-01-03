<!DOCTYPE html>
<?php
require "./model/connect.php";
$db = new Database();
$conn = $db->conn;

$sql = "SELECT * FROM sanpham";
$sp = [];
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $sp[] = $row;
}
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
        <a href="index.php" class="btn btn-info">Trang chủ</a>
        <a href="http://localhost/web/view/sp.php" class="btn btn-info">Sản phẩm</a>
        <a href="tintuc.php" class="btn btn-info">Tin tức</a>
        <a href="./view/login.php" class="btn btn-info">Đăng nhập</a>
        <a href="./view/dangky.php" class="btn btn-info">Đăng ký</a>
    </div>  

    <h2 class="text text-success">Một số sản phẩm nổi bật</h2>
    <div class="card-group">
        <?php
        $i=0;
        while($i<6){
        ?>  

            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $sp[$i]['image']; ?>" alt="" width="400" height="248">
            <div class="card-body">
                <h5 class="card-title"><?php echo $sp[$i]['tensanpham']; ?></h5>
                <p class="card-text"><?php echo "Giá: " . $sp[$i]['gia']; ?></p>
                <p class="card-text"><?php echo "Số lượng: " . $sp[$i]['soluong']; ?></p>
                <p class="card-text"><?php echo "Địa chỉ: " . $sp[$i]['diachi']; ?></p>
                <a href="#" class="btn btn-primary">Go Somewhere</a>
            </div>
            </div>
        <?php
        $i=$i+1;
        }
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
