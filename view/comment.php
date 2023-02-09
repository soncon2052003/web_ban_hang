<style>
.checked {
    color: #DC143C;
}
</style>
<form action="../controller/comment.php" method="post">
    <div class='card mb-3' style='max-width: 45rem;'>
    <input type="hidden" name="id_cm" value="<?= $row['id'] ?>">
        <div class='card-header' style="background-color: ;"> <?= $row['fullname'] ?> </div>
            <div class="star-widget fa-pull-left">
            <?php for($i=1;$i<=5;$i++){
                if($i<=$row['rate']){                    
            ?>
                <span class="fa fa-star checked"></span>
            <?php 
                }else{ 
            ?>
                <span class="fa fa-star"></span>
            <?php

                }
            } 
            ?>  
            </div>
            <div class='card-body'>
                <!-- so sao danh gia -->
            <p class='card-text'> <?= $row['content'] ?> </p>
            <div class="small text text-muted fa-pull-right"> <?= $row['date'] ?> </div>
        </div>
        <div>
            <?php 
            require_once("C:\laragon\www\web/help/helper.php");
            if($row['fullname']==$_SESSION['fullname'] || Helper::check_admin($_SESSION['id'])){ ?>
                <a href="../controller/comment.php?action=delete&id=<?= $row['id'] ?>" class="fa-pull-right">Xóa</a>
            <?php } ?>
        </div>
    </div>
</form> 
