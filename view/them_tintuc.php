<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thêm tin tức</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Thêm tin tức</h2>
    <form action="http://localhost/web/controller/them_tintuc.php" method="post">
        <div class="mb-3 mt-3">
        <label for="title">Title:</label>
        <input type="varchar" class="form-control" name="title">
        </div>
        <div class="mb-3">
        <label for="short">Short:</label>
        <input type="varchar" class="form-control" name="short">
        </div>
        <div class="mb-3">
        <label for="content">Content:</label>
        <input type="varchar" class="form-control" name="content">
        </div>
        <div class="mb-3">
        <label for="img">Img:</label>
        <input type="varchar" class="form-control" name="img">
        </div>
        <div class="mb-3">
        <label for="dateCreate">Ngày tạo:</label>
        <input type="date" class="form-control" name="dateCreate">
        </div>
        <button type="submit" class="btn btn-primary">Thêm tin tức</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
    </form>
</div>
</body>
</html>
