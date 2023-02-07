<?php
session_start();

require_once '../model/connect.php';
require_once "../help/helper.php";

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
    echo "<script>
    alert('Vui lòng nhập đủ tên đăng nhập và mật khẩu!');
    window.history.back();
    </script>";
    exit;
}

for($i=0;$i<$so_ptu;$i++)
{
    if($user[$i]['username']==$username){
        if($user[$i]['password']==$password){
            $_SESSION = $user[$i];
            //Xu ly nho mat khau
            if(isset($_POST['remember'])){
                setcookie('user',$username,time()+90000,'/');
                setcookie('pass',$password,time()+90000,'/');
            }
            //Chuyen huong trang
            if(Helper::check_admin($user[$i]['id'])==true){
                header('Location: http://web.test/quanly.php?id=' . $user[$i]['id']);
            }else{
                header("Location: http://web.test/index.php?id=" . $user[$i]['id']);
            } 
        }
    }
}
echo "<script>
alert('Tên đăng nhập hoặc mật khẩu không đúng!');
window.history.back();
</script>";
exit;

?>