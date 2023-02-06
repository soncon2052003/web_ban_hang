<div class="col-md-3 my-3 my-md-0">
    <div class="card header">  
        <a href="http://web.test/product.php?id=<?= $row['id'] ?>">
            <img src="<?= $row['image'] ?>" alt="icon cua to" class="img-fluid" height="200">
        </a>
        <div class="card-body">
            <h5 class="card-title"><?= $row['tensanpham'] ?></h5>
            <p class="card-text">Giá: <?= $row['gia'] ?></p>
            <p class="card-text">Số lượng: <?= $row['soluong'] ?></p>
            <p class="card-text">Địa chỉ: <?= $row['diachi'] ?></p>
            <input type="hidden" name='product_id' value="<?= $row['id'] ?>" >
        </div>
    </div>
</div>