<?php
require "../model/comment.php";
$_POST['title']="abc";
$comment = new comment($_POST['fullname'],$_POST['title'],$_POST['content'],$_POST['id_sp']);
$comment->them_comment();
?>