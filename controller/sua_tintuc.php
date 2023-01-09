<?php
$id = $_POST['id'];
require_once "../model/tintuc.php";
$tintuc = new tintuc($_POST['title'],$_POST['short'],$_POST['content'],$_POST['img'],$_POST['dateCreate']);
$tintuc->sua_tintuc($id);
?>