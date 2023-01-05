<?php
$id = $_GET['id'];
require "../model/connect.php";

$sql = "DELETE FROM user WHERE id=$id";
$conn->query($sql);
if($conn->query($sql)===true){
    header("Location: http://localhost/web/view/user.php");
}else{
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}
?>