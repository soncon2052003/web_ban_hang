<?php
require_once "../model/database.php";
require_once "../model/user.php";
$user = new User($_POST['username'],$_POST['password'],$_POST['fullname'],$_POST['age'],$_POST['sdt']);
$user->them_user();
?>