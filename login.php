<?php
require'connect.php';
//SESSION
session_start();
session_destroy();
$sql = "SELECT username,password,fullname FROM user";
$sql = $conn->query($sql);
while($row = $sql->fetch_assoc()){
    $_SESSION[] = $row;
}

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');

//Xử lý đăng nhập
$so_ptu = count($_SESSION);

$username = $_POST['username'];
$password = $_POST['password'];
if (!$username || !$password){
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

for($i=0;$i<$so_ptu;$i++)
{
    if($_SESSION[$i]['username']==$username){
        if($_SESSION[$i]['password']==$password){
            echo "Xin chào " . $_SESSION[$i]['fullname'] . ". Bạn đã đăng nhập thành công. <a href='http://localhost/web/index.html'>Đến trang chủ</a>";
            exit;
        }
    }
}
echo "Tên đăng nhập hoặc mật khẩu không đúng. <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;

?>