<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Tin tức</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>
</head>
<body>
    <h2>Xin chào! Chào bạn đến với trang tin tức.</h2>
    <?php if($_SESSION['role']=="admin"){ ?>
    <a href="http://web.test/quanly.php" class="btn btn-info">Trang quản lý</a>
    <a class="btn btn-success" href="http://web.test/view/them_tintuc.php">Thêm tin tức</a>
    <?php }else{ ?>
    <a class="btn btn-success" href="http://web.test?id=<?= $_SESSION['id'] ?>">Về trang chủ</a>
    <?php } ?>

    <hr>
    <form action="" method="GET">
    <div class="row">
      <div class="col-md-4">
        <div class="input-group mb-3">
          <select name="sort" class="form-control">
            <option value="">--Sắp xếp theo--</option>
            <option value="moinhat" <?php if(isset($_GET['sort']) && $_GET['sort']=="moinhat"){echo "selected";} ?> >Mới nhất</option>
            <option value="cunhat" <?php if(isset($_GET['sort']) && $_GET['sort']=="z-a"){echo "selected";} ?> >Cũ nhất</option>
          </select>
          <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Sort</button>
        </div>
      </div>
      <div class="col-md-8">
        <div class="input-group mb-3">
          <input type="text" name="search" id="form1" class="form-control" placeholder="Nhập thông tin tìm kiếm"/>
          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </div>
  </form>

    <?php
    $url = "http://web.test/view/tintuc.php?";
    require_once "../help/helper.php";
    require_once "../model/connect.php";
    //Xu ly phan trang
    if(!isset($_GET['page'])){ $page=1; }
    else{ $page=$_GET['page']; }     
    //Xu ly sap xep
    if(!isset($_GET['sort'])){$key = "id"; $option="ASC";}
    else{
        if($_GET['sort']=="cunhat"){$key = "id"; $option = "DESC";}
        else{$key = "id"; $option="ASC";}
    }
    //Xu ly tim kiem
    if(!isset($_GET['search'])){
        $search="";
    }else{
        $search=$_GET['search'];
    }
    $sql = Helper::Paginate('tintuc',2,$page,$key,$option,$search)['sql'];
    $number_page = Helper::Paginate('tintuc',2,$page,$key,$option,$search)['number_page'];
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
    ?>
    <div class="card mb-3" style="max-width: 720px;">
        <div class="row g-0">
            <a href="http://web.test/view/tintuc.php?id=<?= $row['id'] ?>" class="col-md-4">
                <img src="<?php echo $row['img']; ?>" class="img-fluid rounded-start" alt="...">
            </a>
            <div class="col-md-8">
            <div class="card-body">
                <a href="http://web.test/view/tintuc.php?id=<?= $row['id'] ?>"><h5 class="text text-success"><?php echo $row["title"]; ?></h5></a>
                <p class="card-text"><?php echo $row["short"]; ?></p>
                <p class="card-text"><small class="text-muted"><?php echo "Cập nhật: ".$row["dateCreate"]; ?></small></p>
    <?php
        if($_SESSION['role']=="admin"){ 
    ?>
                <a href="http://web.test/view/sua_tintuc.php?id=<?= $row['id'] ?>">Sửa</a>
                <a href="http://web.test/controller/tintuc.php?action=delete&id=<?= $row['id'] ?>" class="card-link">Xóa</a>
    <?php } ?>
            </div>
            </div>
        </div>
    </div>
    <?php
    }
    include "./pagination.php";
    ?>
</body>   