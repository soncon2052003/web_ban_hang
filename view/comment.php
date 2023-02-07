<form action="../controller/comment.php" method="post">  
    <div class='card mb-3' style='max-width: 50rem;'>
    <input type="hidden" name="id_cm" value="<?= $row['id'] ?>">
        <div class='card-header' style="background-color: ;"> <?= $row['fullname'] ?> </div>
            <div class='card-body'>
            <h5 class='card-title'> <?= $row['title'] ?> </h5>
            <p class='card-text'> <?= $row['content'] ?> </p>
            <div class="small text text-muted fa-pull-right"> <?= $row['date'] ?> </div>
        </div>
        <div>
            <a href="" class="fa-pull-right" name="fix_comment">Sửa</a>
            <a href="" class="fa-pull-right"name="delete_comment">Xóa</a>
        </div>
    </div>
</form>