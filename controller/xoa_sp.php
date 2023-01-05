<?php
require_once "../model/connect.php";
$id = $_GET['id'];
$sql = "DELETE FROM sanpham WHERE id=$id";

if($conn->query($sql)===true){
    header("Location: http://localhost/web/view/sp.php");
}else{
    echo "Lỗi: " .$sql. "<br>" . $conn->error;
}
?>