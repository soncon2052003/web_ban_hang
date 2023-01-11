<?php
require_once "../model/database.php";
require_once "../model/user.php";
$user = new User($_POST['username'],$_POST['password'],$_POST['fullname'],$_POST['age'],$_POST['sdt']);
if($_POST['role']==='admin'){
    $user->them_admin();
}else{
    $user->them_user();
}
?>