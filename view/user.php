<?php
  require_once ("../model/connect.php");  
  require_once ("../help/helper.php");
  $sql = "SELECT * FROM user";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thông tin người dùng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>
</head>
<body>
<h2>Thông tin người dùng</h2>
<div class="container mt-3"> 
  <a href="http://localhost/web/quanly.php" class="btn btn-info">Trang quản lý</a> <br><br>
  <a class="btn btn-success" href="http://localhost/web">Về trang chủ</a>
  <a class="btn btn-success" href="http://localhost/web/view/register.php">Thêm</a>   
  
  <br><br>
  
  <form action="" method="GET">
    <div class="row">
      <div class="col-md-4">
        <div class="input-group mb-3">
          <select name="sort" class="form-control">
            <option value="">--Sắp xếp theo--</option>
            <option value="a-z" <?php if(isset($_GET['sort']) && $_GET['sort']=="a-z"){echo "selected";} ?> >A-Z</option>
            <option value="z-a" <?php if(isset($_GET['sort']) && $_GET['sort']=="z-a"){echo "selected";} ?> >Z-A</option>
            <option value="older" <?php if(isset($_GET['sort']) && $_GET['sort']=="older"){echo "selected";} ?> >Tuổi lớn</option>
            <option value="younger" <?php if(isset($_GET['sort']) && $_GET['sort']=="younger"){echo "selected";} ?> >Tuổi bé</option>
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

    <table class="table table-striped">
      <thead class="table-success">
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th>Fullname</th>
          <th>Age</th>
          <th>Sdt</th>
          <th>Quyền</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
      <?php
      //Xu ly tim kiem
      if(!isset($_GET['search'])){
        $search = "";
      }else{
        $search = $_GET['search'];
      }

      //Xu ly sap xep
      if(!isset($_GET['sort'])){ $key = "fullname"; $option = "ASC";}
      else{
        if($_GET['sort']=="a-z"){ $key = "fullname"; $option = "ASC";}
        else if($_GET['sort']=="z-a"){ $key = "fullname"; $option = "DESC"; }
        else if($_GET['sort']=="older"){ $key = "age"; $option = "DESC";}
        else{ $key = "age"; $option = "ASC";}
      }

      //Xu ly phan trang
      if(!isset($_GET['page'])){ $page=1;}
      else{ $page=$_GET['page'];}

      $sql = Helper::Paginate('user',4,$page,$key,$option,$search)['sql'];
      $number_page = Helper::Paginate('user',4,$page,$key,$option,$search)['number_page'];
      $result = $conn->query($sql);
      while($row=$result->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["password"]; ?></td>
          <td><?php echo $row["fullname"]; ?></td>
          <td><?php echo $row["age"]; ?></td>
          <td><?php echo $row["sdt"]; ?></td>
          <td><?php echo $row["role"]; ?></td>
          <td>
              <a href="http://localhost/web/view/sua_user.php?id=<?= $row['id']; ?>">Sửa</a>
              <a href="http://localhost/web/controller/xoa_user.php?id=<?= $row['id']; ?>">Xóa</a>
          </td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    <ul class="pagination justify-content-center" style="margin:20px 0">
    
    <?php
    $url = "http://localhost/web/view/user.php?sort=".  $_GET['sort'] .  "&search=" . $search . "&";
    include "pagination.php";
    ?>

</div> 

</body>
</html>
