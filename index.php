<!DOCTYPE html>
<?php
require_once "./model/header.php";
require_once "./model/connect.php";
require_once "./model/sanpham.php";
require_once "./help/helper.php";
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/67973cf856.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">     
        <div class="col-md-6">
            <a href="http://web.test" class="btn btn-info">Trang chủ</a>
            <a href="http://web.test/view/tintuc.php" class="btn btn-info">Tin tức</a>
        </div>
    </div> 

    <hr>
    <form action="./index.php" method="get" >
        <div class="row"">
            <div class="col-md-4">
                <div class="input-group mb-3">
                <select name="sort" class="form-control">
                    <option value="a-z">--Sắp xếp theo--</option>
                    <option value="a-z" <?php if(isset($_GET['sort']) && $_GET['sort']=="a-z"){echo "selected";} ?> >A-Z</option>
                    <option value="z-a" <?php if(isset($_GET['sort']) && $_GET['sort']=="z-a"){echo "selected";} ?> >Z-A</option>
                    <option value="moinhat" <?php if(isset($_GET['sort']) && $_GET['sort']=="moinhat"){echo "selected";} ?> >Mới nhất</option>
                    <option value="cunhat" <?php if(isset($_GET['sort']) && $_GET['sort']=="cunhat"){echo "selected";} ?> >Cũ nhất</option>
                    <option value="giacao" <?php if(isset($_GET['sort']) && $_GET['sort']=="giacao"){echo "selected";} ?> >Giá cao</option>
                    <option value="giathap" <?php if(isset($_GET['sort']) && $_GET['sort']=="giathap"){echo "selected";} ?> >Giá thấp</option>
                </select>
                <button type="submit" class="input-group-text btn btn-primary">Sort</button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Nhập thông tin tìm kiếm"/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row text-center py-5">           
            <?php
            //Xu ly sap xep
            if(!isset($_GET['sort'])){ $_GET['sort'] = 'a-z'; $key = "tensanpham"; $option = "ASC";}
            else{
                if($_GET['sort']=="a-z"){ $key = "tensanpham"; $option = "ASC";}
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
            $sql = Helper::Paginate('sanpham',8,$page,$key,$option,$search)['sql'];
            $number_page = Helper::Paginate('sanpham',8,$page,$key,$option,$search)['number_page'];
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                include "./card_sp.php";
            } 
            mysqli_close($conn); 
            ?>
        </div>
        <?php
        $url = "http://web.test/index.php?";
        include "./view//pagination.php";
        ?>
    </div>
</body>
</html>

