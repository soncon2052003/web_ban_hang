<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thông tin sản phẩm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>
</head>
<body>
<h2>Thông tin sản phẩm</h2>

<div class="container mt-3">
  <a href="http://web.test/quanly.php?id=<?= $_SESSION['id'] ?>" class="btn btn-info">Trang quản lý</a> <br><br>
  <a class="btn btn-success" href="http://web.test/view/them_sp.php">Thêm sản phẩm</a>         
  <br><br>

  <form action="" method="GET">
    <div class="row">
      <div class="col-md-4">
        <div class="input-group mb-3">
          <select name="sort" class="form-control">
            <option value="">--Sắp xếp theo--</option>
            <option value="a-z" <?php if(isset($_GET['sort']) && $_GET['sort']=="a-z"){echo "selected";} ?> >A-Z</option>
            <option value="z-a" <?php if(isset($_GET['sort']) && $_GET['sort']=="z-a"){echo "selected";} ?> >Z-A</option>
            <option value="moinhat" <?php if(isset($_GET['sort']) && $_GET['sort']=="moinhat"){echo "selected";} ?> >Mới nhất</option>
            <option value="cunhat" <?php if(isset($_GET['sort']) && $_GET['sort']=="cunhat"){echo "selected";} ?> >Cũ nhất</option>
            <option value="giacao" <?php if(isset($_GET['sort']) && $_GET['sort']=="giacao"){echo "selected";} ?> >Giá cao</option>
            <option value="giathap" <?php if(isset($_GET['sort']) && $_GET['sort']=="giathap"){echo "selected";} ?> >Giá thấp</option>
          </select>
          <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Sort</button>
        </div>
      </div>
    </div>
    
    <div class="input-group">
      <div class="form-outline">
        <input type="text" name="search" id="form1" class="form-control" placeholder="Nhập thông tin tìm kiếm"/>
      </div>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </form>

  <br><br>
  <table class="table table-striped">
    <thead class="table-success">
      <tr> 
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Địa chỉ</th>
        <th>Link ảnh</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
    <?php

    require_once "../model/connect.php";
    require_once "../help/helper.php";
    //Xu ly sap xep
    if(!isset($_GET['sort'])){ $key = "tensanpham"; $option = "ASC";}
    else{
      if($_GET['sort']=="a-z"){$key = "tensanpham"; $option = "ASC";}
      else if($_GET['sort']=="z-a"){$key = "tensanpham"; $option = "DESC";}
      else if($_GET['sort']=="moinhat"){$key = "id"; $option = "DESC";}
      else if($_GET['sort']=="cunhat"){$key = "id"; $option = "ASC";}
      else if($_GET['sort']=="giacao"){$key = "gia"; $option = "DESC";}
      else if($_GET['sort']=="giathap"){$key = "gia"; $option = "ASC";}
    }

    //Xu ly tim kiem
    if(!isset($_GET['search'])){
      $search = "";
    }else{
      $search = $_GET['search'];
    }

    //Xu ly phan trang
    if(!isset($_GET['page'])){ $page = 1;}
    else{ $page = $_GET['page']; }
    $sql = Helper::Paginate('sanpham',5,$page,$key,$option,$search)['sql'];
    $number_page = Helper::Paginate('sanpham',5,$page,$key,$option,$search)['number_page'];
    
    $result = $conn->query($sql);

    $url = "http://web.test/view/sp.php?sort=".  $_GET['sort'] .  "&search=" . $search . "&";

    while($row = $result->fetch_assoc()){
    ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["tensanpham"]; ?></td>
        <td><?php echo $row["gia"]; ?></td>
        <td><?php echo $row["soluong"]; ?></td>
        <td><?php echo $row["diachi"]; ?></td>
        <td><?php echo $row["image"]; ?></td>
        <td>
          <a href="http://web.test/view/sua_sp.php?id=<?=$row['id'];?>">Sửa</a>
          <a href="http://web.test/controller/xoa_sp.php?id=<?=$row['id'];?>">Xóa</a>
        </td>
      </tr>
    <?php
    }
    ?>
    </tbody>
  </table>
  <?php include('./pagination.php'); ?>
</div>

</body>
</html> 

