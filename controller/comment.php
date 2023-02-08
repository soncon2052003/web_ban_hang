<?php
require_once "../model/comment.php";
require_once "../help/helper.php";
$today = Helper::get_today();
$comment = new comment($_POST['fullname'],$_POST['rating'],$_POST['content'],$_POST['id_sp'],$today);
if(isset($_POST['add_comment'])){
    $comment->them_comment();
}

if(isset($_POST['delete_comment'])){
    $comment->delete_comment($_POST['id_cm']);
}

?>