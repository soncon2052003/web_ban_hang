<?php
require_once "../model/user.php";
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
$user = new User($_POST['username'],$_POST['password'],$_POST['fullname'],$age = $_POST['age'],$age = $_POST['sdt']);
$user->sua_user($id);
?>