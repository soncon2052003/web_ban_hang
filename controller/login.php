<?php
session_start();

require '../model/connect.php';
header('Content-Type: text/html; charset=UTF-8'); //Khai bao dung Tieng Viet

$sql = "SELECT * FROM user";
$sql = $conn->query($sql);
while($row = $sql->fetch_assoc()){
    $user[] = $row;
}
//Xử lý đăng nhập
$so_ptu = count($user);
$username = $_POST['username'];
$password = $_POST['password'];

if (!$username || !$password){
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

for($i=0;$i<$so_ptu;$i++)
{
    if($user[$i]['username']==$username){
        if($user[$i]['password']==$password){
            $_SESSION = $user[$i];
            //Xu ly nho mat khau
            if(isset($_POST['remember'])){
                setcookie('user',$username,time()+3600,'/','',0,0);
                setcookie('pass',$password,time()+3600,'/','',0,0);
            }
            //Chuyen huong trang
            if($user[$i]['role']=='1'){
                header('Location: http://web.test/quanly.php?id=' . $user[$i]['id']);
            }else{
                header("Location: http://web.test/index.php?id=" . $user[$i]['id']);
            } 
        }
    }
}
echo "Tên đăng nhập hoặc mật khẩu không đúng. <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;

?>