<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Đăng nhập</h2>
    <form action="../controller/login.php" method="post">
        <div class="mb-3 mt-3">
        <label for="username">Tên tài khoản:</label>
        <input type="text" class="form-control" placeholder="Nhập username" name="username">
        </div>
        <div class="mb-3">
        <label for="pwd">Mật khẩu:</label>
        <input type="password" class="form-control" placeholder="Nhập password" name="password">
        </div>
        <div class="form-check mb-3">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Nhớ mật khẩu
        </label>
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>

</body>
</html>
