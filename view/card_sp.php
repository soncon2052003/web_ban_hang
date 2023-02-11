<div class="col-md-3 my-3 my-md-0">
    <form action="http://web.test/controller/cart.php" method="post">
        <div class="card bg-light">  
            <a href="http://web.test/product.php?id=<?= $row['id'] ?>">
                <img src="<?= $row['image'] ?>" style="width: 250px;height: 180px">
            </a>
            <div class="card-body">
                <h4 class="card-title"><?= $row['tensanpham'] ?></h4>
                <h5 class="card-text"><?= SanPham::get_star($row['id']) ?></h5>
                <p class="card-text">Giá: <?= $row['gia'] ?></p>
                <p class="card-text">Số lượng: <?= $row['soluong'] ?></p>
                <p class="card-text">Địa chỉ: <?= $row['diachi'] ?></p>
                <input type="hidden" name='product_id' value="<?= $row['id'] ?>" >
            </div>
        </div>
    </form>
</div>