<?php  
session_start();
require_once "../model/comment.php";
require_once "../help/helper.php";

if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
        $id = $_GET['id'];
        require_once "../model/connect.php";
        $sql = "DELETE FROM comment WHERE id=$id";
        if($conn->query($sql)===true){
            echo "<script>window.history.back();</script>";
        }else{
            echo "Lỗi " .$sql . "<br>" . $conn->error;
        }
    }
}
if(isset($_POST['add_comment'])){
    //Lay ngay hien tai
    $now = getdate();
    $currentDate = $now["year"] . "-". $now["mon"] . "-". $now["mday"];
    $comment = new comment($_SESSION['fullname'],$_POST['rate'],$_POST['content'],$_POST['id_sp'],$currentDate);
    $comment->them_comment();
}

?>