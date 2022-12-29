<!DOCTYPE html>
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "web_ban_hang";
$conn = new mysqli($host,$username,$password,$dbname);

$id=1;
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
        <a href="index.html" class="btn btn-info">Trang chủ</a>
        <a href="sp.php" class="btn btn-info">Sản phẩm</a>
        <a href="tintuc.html" class="btn btn-info">Tin tức</a>
        <a href="login.html" class="btn btn-info">Đăng nhập</a>
        <a href="dangky.html" class="btn btn-info">Đăng ký</a>
    </div>  
    <div class="card-group">
        <?php
        $i=0;
        while($i<6){
        ?>  

            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $sp[$i]['image']; ?>" alt="" width="400" height="248">
            <div class="card-body">
                <h5 class="card-title"><?php echo $sp[$i]['tensanpham']; ?></h5>
                <p class="card-text">
                    Some quick example text to build on the card
                    title and make up the bulk of the card's content.
                </p>
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
