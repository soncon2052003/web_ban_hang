<!DOCTYPE html>
<?php
session_start();
require "./model/connect.php";
$sql = "SELECT * FROM sanpham LIMIT 6";
$result = $conn->query($sql);
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Trang quản lý</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>
</head>
<body>
    <a class="fa-solid fa-user fa-2x fa-border fa-pull-right btn btn-success" href="http://web.test/view/sua_user.php?id=<?= $_SESSION['id'] ?>"> <?= $_SESSION['fullname']?> </a>
    <a class="fa-solid fa-right-from-bracket fa-2x fa-border fa-pull-right" href="http://web.test/controller/logout.php"></a>
    <h2 class="text text-info">HÃY CHỌN MỘT CHỨC NĂNG</h2>
    <div class="container mt-3">
        <a href="http://web.test" class="btn btn-info">Trang người dùng</a> <br><br>
        <a href="http://web.test/view/user.php" class="btn btn-info">Quản lý người dùng</a> <br><br>
        <a href="http://web.test/view/sp.php" class="btn btn-info">Quản lý sản phẩm</a> <br><br>
        <a href="http://web.test/view/tintuc.php" class="btn btn-info">Quản lý tin tức</a> <br><br>
        <a href="http://web.test" class="btn btn-info">Quản trị bình luận</a> <br><br>
        <a href="" class="btn btn-info">Quản trị đơn hàng</a> <br><br>
        <a href="http://web.test/view/them_admin.php" class="btn btn-info">Thêm admin</a>
    </div>  
</body>
</html>