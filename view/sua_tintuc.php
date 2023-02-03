<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sửa tin tức</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Sửa tin tức</h2>
    <?php
    $id = $_GET['id'];
    require "../model/connect.php";
    $sql = "SELECT * FROM tintuc WHERE id=$id";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
    ?>

    <form action="http://web.test/controller/tintuc.php?action=fix" method="post">
        ID:<input type="varchar" class="form-control" name="id" value="<?= $row['id']?>" readonly>
        <div class="mb-3 mt-3">
        <label for="title">Title:</label>
        <input type="varchar" class="form-control" id="username" name="title" value="<?= $row['title']?>">
        </div>
        <div class="mb-3">
        <label for="short">Short:</label>
        <input type="varchar" class="form-control" name="short" value="<?= $row['short']?>">
        </div>
        <div class="mb-3">
        <label for="content">Content:</label>
        <input type="varchar" class="form-control" name="content" value="<?=$row['content']?>">
        </div>
        <div class="mb-3">
        <label for="img">Link ảnh:</label>
        <input type="varchar" class="form-control" name="img" value="<?=$row['img']?>">
        </div>
        <div class="mb-3">
        <label for="dateCreate">Ngày tạo:</label>
        <input type="date" class="form-control" name="dateCreate" value="<?=$row['dateCreate']?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Sửa tin tức</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
    </form>

    <?php
    }
    ?>
</div>
</body>
</html>
