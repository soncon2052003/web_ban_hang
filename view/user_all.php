<?php
require "../model/connect.php";
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thông tin người dùng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h2>Thông tin người dùng</h2>
<div class="container mt-3"> 
    <a class="btn btn-success" href="http://localhost/web">Về trang chủ</a>
    <a class="btn btn-success" href="http://localhost/web/view/register.php">Thêm</a>   
    
    <br><br>
    <form action="http://localhost/web/view/user_all.php" method="post">
        <div class="col-md-6">
        <input type="text" name="search" class="form-control" placeholder='Nhập thông tin tìm kiếm' value="">
        <button class="btn btn-info">Tìm kiếm</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Fullname</th>
            <th>Age</th>
            <th>Sdt</th>
            <th>Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once "../model/connect.php";
        //Xu ly tim kiem
        if(isset($_POST['search'])){
            $key = $_POST['search'];
            $sql = "SELECT * FROM user WHERE id LIKE '$key' or username LIKE '%$key%' 
                or password LIKE '$key' or fullname LIKE '%$key%' or age LIKE '$key'
                sdt LIKE '%key'";
        }else{
            $sql = "SELECT * FROM user";
        }
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["password"]; ?></td>
            <td><?php echo $row["fullname"]; ?></td>
            <td><?php echo $row["age"]; ?></td>
            <td><?php echo $row["sdt"]; ?></td>
            <td>
                <a href="http://localhost/web/view/sua_user.php?id=<?= $row['id']; ?>">Sửa</a>
                <a href="http://localhost/web/controller/xoa_user.php?id=<?= $row['id']; ?>">Xóa</a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div> 

</body>
</html>
