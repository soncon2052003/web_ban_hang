<?php
$id = $_GET['id'];
require_once "../model/connect.php";
$sql = "DELETE FROM tintuc WHERE id=$id";
if($conn->query($sql)===true){
    header("Location: http://localhost/web/view/tintuc.php");
}else{
    echo "Lỗi: " . $sql . ": " . $conn->error;
}
?>