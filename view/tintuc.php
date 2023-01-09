<?php
require "../model/connect.php";
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Tin tức</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h2>Xin chào! Chào bạn đến với trang tin tức.</h2>
    <a class="btn btn-success" href="http://localhost/web">Về trang chủ</a>
    <a class="btn btn-success" href="http://localhost/web/view/them_tintuc.php">Thêm tin tức</a>
    <?php
    require_once "../help/helper.php";
    require_once "../model/connect.php";
    if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
    $sql = Helper::Paginate('tintuc',2,$page)['sql'];
    $number_page = Helper::Paginate('tintuc',2,$page)['number_page'];
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
    ?>
    <div class="card mb-3" style="max-width: 720px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="<?php echo $row['img']; ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                <p class="card-text"><?php echo $row["short"]; ?></p>
                <p class="card-text"><small class="text-muted"><?php echo "Cập nhật: ".$row["dateCreate"]; ?></small></p>
                <a href="http://localhost/web/view/sua_tintuc.php?id=<?= $row['id'] ?>">Sửa</a>
                <a href="http://localhost/web/controller/xoa_tintuc.php?id=<?= $row['id'] ?>" class="card-link">Xóa</a>
            </div>
            </div>
        </div>
    </div>
    <?php
    }
    $conn->close();
    ?>
    <ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item"><a class="page-link" href="http://localhost/web/view/tintuc.php?page=1">First</a></li>
    <?php
    for($page = 1; $page<= $number_page; $page++){
    ?>
    <li class="page-item"><a class="page-link" href="http://localhost/web/view/tintuc.php?page=<?=$page?>"> <?=$page?> </a></li>
    <?php
    }
    ?>
    <li class="page-item"><a class="page-link" href="http://localhost/web/view/tintuc.php?page=<?=$number_page?>">Last</a></li>
    </ul>
</body>   