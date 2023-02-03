<div class="col-md-3 my-3 my-md-0">
    <form action="http://web.test/index.php" method="post">
        <div class="card header">  
            <a href="http://web.test/product.php?id=<?= $row['id'] ?>">
                <img src="<?= $row['image'] ?>" alt="" class="img-fluid">
            </a>
            <div class="card-body">
                <h5 class="card-title"><?= $row['tensanpham'] ?></h5>
                <p class="card-text">Giá: <?= $row['gia'] ?></p>
                <p class="card-text">Số lượng: <?= $row['soluong'] ?></p>
                <p class="card-text">Địa chỉ: <?= $row['diachi'] ?></p>
                <button type="submit" class="btn btn-info my-3" name="add">Thêm vào giỏ<i class="fas fa-shopping-cart"></i></button>
                <input type="hidden" name='product_id' value="<?= $row['id'] ?>" >
            </div>
        </div>
    </form>
</div>