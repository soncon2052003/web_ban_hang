<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thông tin sản phẩm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h2>Thông tin sản phẩm</h2>

<div class="container mt-3">
  <a class="btn btn-success" href="http://localhost/web">Về trang chủ</a>
  <a class="btn btn-success" href="http://localhost/web/view/them_sp.php">Thêm sản phẩm</a>         

  <br><br>
  <form action="http://localhost/web/view/sp_all.php" method="post">
    <div class="col-md-6">
      <input type="text" name="search" class="form-control" placeholder='Nhập thông tin tìm kiếm' value="">
      <button class="btn btn-info">Tìm kiếm</button>
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
    //Xu ly phan trang
    if(!isset($_GET['page'])){
      $page = 1;
    }else{
      $page = $_GET['page'];
    }
    $results_per_page = 4;
    $page_first_result = ($page-1)*$results_per_page;
    $sql = "SELECT * FROM sanpham";
    $result = $conn->query($sql);
    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil($number_of_result/$results_per_page);
    
    $sql = "SELECT * FROM sanpham LIMIT $page_first_result,$results_per_page";
    $result = $conn->query($sql);

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
<ul class="pagination justify-content-center" style="margin:20px 0">
  <li class="page-item"><a class="page-link" href="http://localhost/web/view/sp.php?page=1">First</a></li>
  <?php
  for($page = 1; $page<= $number_of_page; $page++){
  ?>
  <li class="page-item"><a class="page-link" href="http://localhost/web/view/sp.php?page=<?=$page?>"> <?=$page?> </a></li>
  <?php
  }
  ?>
  <li class="page-item"><a class="page-link" href="http://localhost/web/view/sp.php?page=<?=$number_of_page?>">Last</a></li>
</ul>
</div>

</body>
</html>
