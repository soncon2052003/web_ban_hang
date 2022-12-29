<?php
require "./connect.php";

$tensp = $_POST['tensanpham'];
$gia = $_POST['gia'];
$soluong = $_POST['soluong'];
$diachi = $_POST['diachi'];

$sql = "INSERT INTO `sanpham` (tensanpham,gia,soluong,diachi) VALUES('$tensp','$gia','$soluong','$diachi')";

if($result1 = mysqli_query($conn,$sql)){
    echo "<h2>Thêm sản phẩm thành công. <a href='http://localhost/web/sp.php'>Quay lại</a></h2>";
}else{
    echo "Có lỗi xảy ra. <a href='http://localhost/web/sp.php'>Quay lại</a>";
}
?>