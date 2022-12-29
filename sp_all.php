<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Sản phẩm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <?php
        require './connect.php';
        if(isset($_GET["search"]) && !empty($_GET["search"]))
        {
            $key = $_GET["search"];
            $sql = "SELECT * FROM sanpham WHERE tensanpham LIKE '%$key%' 
                or gia LIKE '$key' or soluong LIKE '$key' or diachi LIKE '%$key%'";
        }
        else{
            $sql = "SELECT * FROM sanpham";
        }

        $result = mysqli_query($conn,$sql);
    ?>

<h3 align = "center">Thông tin sản phẩm</h3>
    <ftable class="search-form" align="center" cellpadding="5">
        <tr>
            <td>
                <form action="" method="get">
                    <input type="text" name="search" placeholder="Nhập từ khóa cần tìm" value = 
                    "<?php if(isset($_GET["search"])){echo $_GET["search"];}?>">
                    <input type="submit" value="Tìm">
                    <input type="button" value="Tất cả" onclick="window.location.href='sp.php'">
                </form>
            </td>
        </tr>
    </table>

    <div class="container mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Địa chỉ</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            
        <?php
        while($row=mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $tensanpham = $row["tensanpham"];
            $gia = $row["gia"];
            $soluong = $row["soluong"];
            $diachi = $row["diachi"];
        ?>

            <tr class="table-info">
                <td><?php echo $tensanpham?></td>
                <td><?php echo $gia?></td>
                <td><?php echo $soluong?></td>
                <td><?php echo $diachi?></td>
                <td>
                    <a href="http://localhost/web/xuly_sp/themsp.php?id=$id<?php echo $id; ?>">Thêm</a>
                    <a href="http://localhost/web/xuly_sp/suasp.php?id=$id<?php echo $id; ?>">Sửa</a>
                    <a href="http://localhost/web/xuly_sp/xoasp.php?id=$id<?php echo $id; ?>">Xóa</a>
                </td>
            </tr>    
        <?php
        }
        mysqli_close($conn); 
        ?>
        </table>
    </div>
    </body>
</html>