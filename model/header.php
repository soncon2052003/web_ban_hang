<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="http://web.test/index.php" class="navbar-brand">
            <h4 class="px5">
                <i class="fas fa-shopping-basket"></i>Trang chủ
            </h4>
        </a>
        <a href="http://web.test/view/tintuc.php" class="navbar-brand">
            <h4 class="px5">
            <i class="fa-solid fa-newspaper"></i>Tin tức
            </h4>
        </a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="http://web.test/cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i>Cart
                        <?php
                        session_start();
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"btn btn-sm text-warning bg-light rounded-circle\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"btn btn-sm text-warning bg-light rounded-circle\">0</span>";
                        }                        
                        ?>

                    </h5>
                </a>
            </div>
        </div>

        <?php if(!isset($_SESSION['fullname'])){?>     
        <div class="col-md-6">
            <a class="btn btn-info fa-pull-right" href="http://web.test/view/login.php">Đăng nhập</a>
            <a class="btn btn-info fa-pull-right" href="http://web.test/view/register.php">Đăng ký</a>
        </div>
        <?php }else{ ?>       
        <div class="col-md-6">
            <a class="fa-solid fa-user fa-2x fa-border fa-pull-right btn btn-danger" href="http://web.test/view/sua_user.php?id=<?= $_SESSION['id'] ?>"><?= $_SESSION['fullname']?></a>
            <a class="fa-solid fa-right-from-bracket fa-2x fa-border fa-pull-right btn btn-danger" href="http://web.test/controller/logout.php"></a>
        </div>
        <?php } ?>
    </nav>
</header>