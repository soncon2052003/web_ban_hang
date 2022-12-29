<?php
require "./connect.php";  

$id = $_POST['id'];

$tensp = $_POST['tensanpham'];
$gia = $_POST['gia'];
$soluong = $_POST['soluong'];
$diachi = $_POST['diachi'];

$sql ="UPDATE `sanpham` SET tensanpham='$tensp', gia='$gia', soluong='$soluong',
    diachi='$diachi' WHERE id='$id'";

if($result1 = mysqli_query($conn,$sql)){
    echo "<h2>Sửa sản phẩm thành công. <a href='http://localhost/web/sp.php'>Quay lại</a></h2>";
}else{
    echo "Có lỗi xảy ra. <a href='http://localhost/web/sp.php'>Quay lại</a>";
}
?>