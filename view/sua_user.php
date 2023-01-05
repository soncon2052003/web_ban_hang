<?php
require_once "../model/connect.php";
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id=$id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang đăng kí</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Sửa thông tin người dùng</h2>
    <form action="http://localhost/web/controller/sua_user.php" method="post">
        <?php
        $id = $_GET['id'];
        while($row = $result->fetch_assoc()){ 
        ?>

        <label for="id">ID:</label>
        <input type="int" name="id" value="<?= $_GET['id'] ?>" readonly>
        <div class="mb-3 mt-3">
        <label for="username">Tên tài khoản:</label>
        <input type="varchar" class="form-control" id="username" value="<?= $row['username']; ?>" name="username">
        </div>
        <div class="mb-3">
        <label for="password">Mật khẩu:</label>
        <input type="varchar" class="form-control" value="<?= $row['password'] ?>" name="password">
        </div>
        <div class="mb-3">
        <label for="fullname">Họ tên:</label>
        <input type="varchar" class="form-control" value="<?= $row['fullname']; ?>" name="fullname">
        </div>
        <div class="mb-3">
        <label for="age">Tuổi:</label>
        <input type="varchar" class="form-control" value="<?= $row['age']; ?>" name="age">
        </div>
        <div class="mb-3">
        <label for="sdt">Số điện thoại:</label>
        <input type="varchar" class="form-control" value="<?= $row['sdt']; ?>" name="sdt">
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>

        <?php
        }
        ?>
    </form>
</div>
</body>
</html>
