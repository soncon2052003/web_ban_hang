<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thêm sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Thêm sản phẩm</h2>
    <form action="http://localhost/web/controller/them_sp.php" method="post">
        <div class="mb-3 mt-3">
        <label for="tensanpham">Tên sản phẩm:</label>
        <input type="varchar" class="form-control" id="username" name="tensanpham">
        </div>
        <div class="mb-3">
        <label for="gia">Giá:</label>
        <input type="varchar" class="form-control" name="gia">
        </div>
        <div class="mb-3">
        <label for="soluong">Số lượng:</label>
        <input type="varchar" class="form-control" name="soluong">
        </div>
        <div class="mb-3">
        <label for="diachi">Địa chỉ:</label>
        <input type="varchar" class="form-control" name="diachi">
        </div>
        <div class="mb-3">
        <label for="diachi">Link ảnh:</label>
        <input type="varchar" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
    </form>
</div>
</body>
</html>
