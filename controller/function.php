<?php
//Xu ly sap xep
if(!isset($_GET['sort'])){ $key = "tensanpham"; $option = "ASC";}
else{
    if($_GET['sort']=="a-z"){$key = "tensanpham"; $option = "ASC";}
    else if($_GET['sort']=="z-a"){$key = "tensanpham"; $option = "DESC";}
    else if($_GET['sort']=="moinhat"){$key = "id"; $option = "DESC";}
    else if($_GET['sort']=="cunhat"){$key = "id"; $option = "ASC";}
    else if($_GET['sort']=="giacao"){$key = "gia"; $option = "DESC";}
    else if($_GET['sort']=="giathap"){$key = "gia"; $option = "ASC";}
}
//Xu ly tim kiem
if(!isset($_GET['search'])){
    $search = "";
}else{
    $search = $_GET['search'];
}   

header("Location: http://web.test/index.php");
?>
