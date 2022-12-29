<?php
$conn = mysqli_connect('localhost','root','','web_ban_hang');
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "DELETE FROM `sanpham` WHERE id='$id'"; //Loi nhan id sai

if($result = mysqli_query($conn,$sql)){
    echo "<h2>Xóa sản phẩm thành công.<a href='javascript: history.go(-1)'>Quay về</a></h2>";
}else{
    echo "<h2>Không thành công.<a href='javascript: history.go(-1)'>Quay về</a></h2>";
}
?>