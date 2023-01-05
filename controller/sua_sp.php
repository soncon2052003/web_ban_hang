<?php
$id = $_POST['id'];
require_once "../model/sanpham.php";
$sp = new SanPham($_POST['tensanpham'],$_POST['gia'],$_POST['soluong'],$_POST['diachi'],$_POST['image']);
$sp->sua_sp($id);
?>