<?php
if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
        require_once "../model/connect.php";
        $id = $_GET['id'];
        $sql = "DELETE FROM sanpham WHERE id=$id";
        
        if($conn->query($sql)===true){
            header("Location: http://web.test/view/sp.php");
        }else{
            echo "Lỗi: " .$sql. "<br>" . $conn->error;
        }
    }else if($_GET['action']=='add'){
        require_once "../model/sanpham.php"; //them sp
        $sp = new SanPham($_POST['tensanpham'],$_POST['gia'],$_POST['soluong'],$_POST['diachi'],$_POST['image']);
        $sp->them_sp();
        header("Location: http://web.test/view/sp.php");
    }else if($_GET['action']=='fix'){
        $id = $_POST['id']; //sua sp
        require_once "../model/sanpham.php";
        $sp = new SanPham($_POST['tensanpham'],$_POST['gia'],$_POST['soluong'],$_POST['diachi'],$_POST['image']);
        $sp->sua_sp($id);
        header("Location: http://web.test/view/sp.php");
    }
}

?>