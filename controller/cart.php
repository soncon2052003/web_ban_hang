<?php
session_start();
if(isset($_POST['add'])){
    if(!isset($_SESSION['cart'])){
        $item = array(
            "product_id" => $_POST['product_id'],
            'count' => 1
        );
        $_SESSION['cart'][0] = $item;        
    }else{
        $item_array_id = array_column($_SESSION['cart'],"product_id");
        if(in_array($_POST['product_id'],$item_array_id)){
            echo "<script>window.location = 'index.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item = array(
                'product_id' => $_POST['product_id'],
                'count' => 1
            ); 

            $_SESSION['cart'][$count] = $item;  
        }
    }
    header("Location: http://web.test/index.php");
}   

if(isset($_POST['remove'])){  
    $id = $_POST['id_sp_ss']; 
    unset($_SESSION['cart'][$id]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("Location: http://web.test/cart.php");
}
if(isset($_POST['minus']) && isset($_POST['id_sp_ss'])){
    if($_SESSION['cart'][$_POST['id_sp_ss']]['count']>1){
        $_SESSION['cart'][$_POST['id_sp_ss']]['count'] -= 1;
    }
    header("Location: http://web.test/cart.php");
}
if(isset($_POST['plus']) && isset($_POST['id_sp_ss'])){
    $_SESSION['cart'][$_POST['id_sp_ss']]['count'] += 1;
    header("Location: http://web.test/cart.php");
}
?>
