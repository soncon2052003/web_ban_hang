<?php
require "../model/connect.php";
$sql = "SELECT * FROM sanpham";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h2>Thông tin sản phẩm</h2>
<div class="container mt-3">         
  <table class="table table-striped">
    <thead class="table-success">
      <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Địa chỉ</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
    <?php
    require "../model/sanpham.php";

    while($row = $result->fetch_assoc()){
    ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["tensanpham"]; ?></td>
        <td><?php echo $row["gia"]; ?></td>
        <td><?php echo $row["soluong"]; ?></td>
        <td><?php echo $row["diachi"]; ?></td>
        <td>john@example.com</td>
      </tr>
    <?php
    }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>
