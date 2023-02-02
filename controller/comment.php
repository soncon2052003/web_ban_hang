<?php
require "../model/comment.php";
$comment = new comment($_POST['fullname'],$_POST['title'],$_POST['content'],$_POST['id_sp']);
$comment->them_comment();
?>