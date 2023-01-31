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
  <a href="http://localhost/web/quanly.php" class="btn btn-info">Trang quản lý</a> <br><br>
  <a class="btn btn-success" href="http://localhost/web">Về trang chủ</a>
  <a class="btn btn-success" href="http://localhost/web/view/them_sp.php">Thêm sản phẩm</a>         

  <br><br>
  <!--
  <form action="http://web.test/view/search" method="post">
    <div class="col-md-6">
      <input type="text" name="search" class="form-control" placeholder='Nhập thông tin tìm kiếm'>
      <button class="btn btn-info" name="submit_sp"><i class="fa-brands fa-searchengin">Tìm kiếm</i></button>
    </div>
  </form>
  -->
  <div class="input-group">
    <div class="form-outline">
      <input type="search" id="form1" class="form-control" placeholder="Nhập thông tin tìm kiếm"/>
    </div>
    <button type="button" class="btn btn-primary">
      <i class="fas fa-search"></i>
    </button>
  </div>

  <br>
  <form action="" method="GET">
    <div class="row">
      <div class="col-md-4">
        <div class="input-group mb-3">
          <select name="sort_alphabet" class="form-control">
            <option value="">--Select option--</option>
            <option value="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet']=="a-z"){echo "selected";} ?> >A-Z</option>
            <option value="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet']=="z-a"){echo "selected";} ?> >Z-A</option>
          </select>
          <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Sort</button>
        </div>
      </div>
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
    session_start();
    //Xu ly phan trang
    if(!isset($_GET['page'])){
      $page = 1;
    }else{
      $page = $_GET['page'];
    }
    $sql = Helper::Paginate('sanpham',5,$page)['sql'];
    $number_page = Helper::Paginate('sanpham',5,$page)['number_page'];
    $result = $conn->query($sql);

    $url = "http://web.test/view/sp.php";

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
          <a href="http://localhost/web/view/sua_sp.php?id=<?=$row['id'];?>">Sửa</a>
          <a href="http://localhost/web/controller/xoa_sp.php?id=<?=$row['id'];?>">Xóa</a>
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

