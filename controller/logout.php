<?php
session_start();
if(isset($_SESSION)){
    session_destroy();
}
header("Location: http://web.test/view/login.php");
?>