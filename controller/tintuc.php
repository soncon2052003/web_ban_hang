<?php
if(isset($_GET['action'])){
    if($_GET['action']=='add'){
        require_once "../model/tintuc.php";
        $tintuc = new tintuc($_POST['title'],$_POST['short'],$_POST['content'],$_POST['img'],$_POST['dateCreate']);
        $tintuc->them_tintuc();
        header("Location: http://web.test/view/tintuc.php");
    }else if($_GET['action']=='fix'){
        $id = $_POST['id'];
        require_once "../model/tintuc.php";
        $tintuc = new tintuc($_POST['title'],$_POST['short'],$_POST['content'],$_POST['img'],$_POST['dateCreate']);
        $tintuc->sua_tintuc($id);
        header("Location: http://web.test/view/tintuc.php");
    }else if($_GET['action']=='delete'){
        $id = $_GET['id'];
        require_once "../model/connect.php";
        $sql = "DELETE FROM tintuc WHERE id=$id";
        if($conn->query($sql)===true){
            header("Location: http://web.test/view/tintuc.php");
        }else{
            echo "Lỗi: " . $sql . ": " . $conn->error;
        }       
    }
}

?>