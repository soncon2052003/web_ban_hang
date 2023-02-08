<form action="http://web.test/controller/cart.php" method="post" class="cart-items">
    <div class="border rounded">
        <div class="row">
            <a href="http://web.test/product.php?id=<?= $row['id'] ?>" class="col-md-5 pl-0">
                <img src= "<?=$row['image']?>" style="width: 250px;height: 180px">
            </a>
            <div class="col-md-4 py-4">
                <h5 class="pt-2"> <?=$row['tensanpham']?> </h5>
                <small class="text-secondary"><?=$row['diachi']?></small>
                <h5 class="pt-2"> <?=$row['gia']?> đ</h5>
                <button type="submit" class="btn btn-warning">Mua sau</button>
                <button type="submit" class="btn btn-danger" name="remove">Xóa</button>
            </div> 
            <div class="col-md-3 py-5">
                <div>
                    <button type="submit" name="minus" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                    <input type="int" value="<?php
                        for($i=0;$i<count($_SESSION['cart']);$i++){
                            if($_SESSION['cart'][$i]['product_id']==$row['id']){
                                $chiso = $i;
                            }
                        }
                        echo $_SESSION['cart'][$chiso]['count'];
                        ?>" class="form-control d-inline">
                    <input type="hidden" name="id_sp_ss" class="form-control d-inline" value="<?php
                        for($i=0;$i<count($_SESSION['cart']);$i++){
                            if($_SESSION['cart'][$i]['product_id']==$row['id']){
                                $chiso = $i;
                            }
                        }
                        echo $chiso;
                    ?>">
                    <button type="submit" name="plus" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php

?>