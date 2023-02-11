<style>
.container .star-widget input{
  display: none;
}

.star-widget label{
  font-size: 15px;
  color: #444;
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
}
input::not(:checked) ~ label:hover,
input::not(:checked) ~ label:hover ~ label{
  color: #fd4;
}

input:checked ~ label{
  color: #DC143C;
}
input#rate-5:checked ~ label{
  color: #DC143C;
  text-shadow: 0 0 20px #952;
}

#rate-1:checked ~ form header:before{
  content: "Tệ";
}
#rate-2:checked ~ form header:before{
  content: "Không hài lòng";
}
#rate-3:checked ~ form header:before{
  content: "Bình thường";
}
#rate-4:checked ~ form header:before{
  content: "Hài lòng";
}
#rate-5:checked ~ form header:before{
  content: "Tuyệt vời";
}
</style>
<form action="../controller/comment.php?id=<?= $_SESSION['id'] ?>" method="post" style="background-color: aliceblue;">
  <div class="container my-5 py-5 text-dark">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-6">
        <div class="card">
            <div class="card-body p-4">
                <input type ='hidden' name='id_sp' value='<?= $id ?>' >
                <h4 class="text text-info" name="fullname">Chào <?= $_SESSION['fullname'] ?> </h4>
                <h5>Bạn có cảm nhận gì không?</h5>
                <div class="star-widget fa-pull-left" value="<?php if(isset($comment['rate'])){echo $comment['rate'];} ?>">
                  <input type="radio" name="rate" id="rate-5" value="5">
                  <label for="rate-5" class="fas fa-star"></label>
                  <input type="radio" name="rate" id="rate-4" value="4">
                  <label for="rate-4" class="fas fa-star"></label>
                  <input type="radio" name="rate" id="rate-3" value="3">
                  <label for="rate-3" class="fas fa-star"></label>
                  <input type="radio" name="rate" id="rate-2" value="2">
                  <label for="rate-2" class="fas fa-star"></label>
                  <input type="radio" name="rate" id="rate-1" value="1">
                  <label for="rate-1" class="fas fa-star"></label>
                </div>
                <br>
                <form action="" class="form-outline" name="content">
                  <header></header>
                  <textarea class="form-control" name="content" rows="4">
                    <?php if(isset($comment['content'])){echo $comment['content'];} ?>
                  </textarea>   
                <div class="d-flex justify-content-between mt-3">
                  <button type="reset" class="btn btn-success">Ghi lại</button>
                  <button type="submit" name="add_comment" class="btn btn-danger">
                    Gửi<i class="fas fa-long-arrow-alt-right ms-1"></i>
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>