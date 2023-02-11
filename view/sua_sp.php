<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sửa sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
    <h2>Sửa sản phẩm</h2>
    <?php
    $id = $_GET['id'];
    require "../model/connect.php";
    $sql = "SELECT * FROM sanpham WHERE id=$id";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
    ?>

    <form action="http://web.test/controller/sanpham.php?action=fix" method="post">
        ID:<input type="varchar" class="form-control" name="id" value="<?= $row['id']?>" readonly>
        <div class="mb-3 mt-3">
        <label for="tensanpham">Tên sản phẩm:</label>
        <input type="varchar" class="form-control" id="username" name="tensanpham" value="<?= $row['tensanpham']?>">
        </div>
        <div class="mb-3">
        <label for="gia">Giá:</label>
        <input type="varchar" class="form-control" name="gia" value="<?= $row['gia']?>">
        </div>
        <div class="mb-3">
        <label for="soluong">Số lượng:</label>
        <input type="varchar" class="form-control" name="soluong" value="<?=$row['soluong']?>">
        </div>
        <div class="mb-3">
        <label for="diachi">Địa chỉ:</label>
        <input type="varchar" class="form-control" name="diachi" value="<?=$row['diachi']?>">
        </div>
        <div class="mb-3">
        <label for="diachi">Link ảnh:</label>
        <input type="varchar" class="form-control" name="image" value="<?=$row['image']?>">
        </div>
        <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
    </form>

    <?php
    }
    ?>
</div>
</body>
</html>
