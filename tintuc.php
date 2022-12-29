<?php
require "./connect.php";

$sql = "SELECT * FROM tintuc";
$results = $conn->query($sql);

$tintuc=[];

while($row = $results->fetch_assoc()){
    $tintuc[] = $row;
}

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
    <div class="btn-borded">
        <div class="btn-borded">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Chủ đề</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Hot</a>
                <a class="dropdown-item" href="#">Hơi Hot</a>
                <a class="dropdown-item" href="#">Lịch sử sản phẩm</a>
            </div>
            <button type="button" class="btn btn-primary">Tim kiem</button>
        </div>
    </div>

    <?php
    $i=1;
    while($i<=4){
    ?>
    <div class="card mb-3" style="max-width: 720px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $tintuc[$i]["title"]; ?></h5>
                <p class="card-text"><?php echo $tintuc[$i]["short"]; ?></p>
                <p class="card-text"><small class="text-muted"><?php echo "Cập nhật: ".$tintuc[$i]["dateCreate"]; ?></small></p>
                <a href="#" class="card-link">Card link</a>
            </div>
            </div>
        </div>
    </div>
    <?php
    $i=$i+1;
    }
    $conn->close();
    ?>
</body>   