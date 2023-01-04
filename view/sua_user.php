<!DOCTYPE html>
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
        <div class="mb-3 mt-3">
        <label for="username">Tên tài khoản:</label>
        <input type="varchar" class="form-control" id="username" placeholder="Nhập username" name="username">
        </div>
        <div class="mb-3">
        <label for="pwd">Mật khẩu:</label>
        <input type="varchar" class="form-control" placeholder="Nhập password" name="password">
        </div>
        <div class="mb-3">
        <label for="pwd">Họ tên:</label>
        <input type="varchar" class="form-control" placeholder="Nhập họ tên" name="fullname">
        </div>
        <div class="mb-3">
        <label for="pwd">Tuổi:</label>
        <input type="varchar" class="form-control" placeholder="Nhập tuổi" name="age">
        </div>
        <div class="mb-3">
        <label for="pwd">Số điện thoại:</label>
        <input type="varchar" class="form-control" placeholder="Nhập số điện thoại" name="sdt">
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
    </form>
</div>
</body>
</html>
