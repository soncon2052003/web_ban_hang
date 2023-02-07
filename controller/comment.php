<?php
require "../model/comment.php";

$comment = new comment($_POST['fullname'],$_POST['title'],$_POST['content'],$_POST['id_sp']);
if(isset($_POST['add_comment'])){
    $comment->them_comment();
}

if(isset($_POST['delete_comment'])){
    $comment->delete_comment($_POST['id_cm']);
}

?>