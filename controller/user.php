<?php
if(isset($_GET['action'])){
    if($_GET['action']=='fix'){
        require_once "../model/user.php";
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        $user = new User($_POST['username'],$_POST['password'],$_POST['fullname'],$age = $_POST['age'],$age = $_POST['sdt']);
        $user->sua_user($id);
    }else if($_GET['action']=='delete'){
        $id = $_GET['id'];
        require "../model/connect.php";
        
        $sql = "DELETE FROM user WHERE id=$id";
        $conn->query($sql);
        if($conn->query($sql)===true){
            header("Location: http://web.test/view/user.php");
        }else{
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }       
    }else if($_GET['action']=='add'){
        require_once "../model/database.php";
        require_once "../model/user.php";
        $user = new User($_POST['username'],$_POST['password'],$_POST['fullname'],$_POST['age'],$_POST['sdt']);
        if($_POST['role']==='admin'){
            $user->them_admin();
        }else{
            $user->them_user();
        }
        header("Location: http://web.test/view/user.php");
    }
}



?>