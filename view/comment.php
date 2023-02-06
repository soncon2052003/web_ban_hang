<form action="../controller/comment.php?id=<?= $_SESSION['id'] ?>" method="post" style="background-color: aliceblue;">
  <div class="container my-5 py-5 text-dark">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-6">
        <div class="card">
            <div class="card-body p-4">
                <input type ='hidden' name='id_sp' value='<?= $id ?>' >
                <h4 class="text text-info" name="fullname">Chào <?= $_SESSION['fullname'] ?> </h4>
                <h5>Bạn có cảm nhận gì không?</h5>
                <ul class="rating mb-3" data-mdb-toggle="rating">
                    <a>
                        <i class="far fa-star fa-sm text-danger" title="Bad"></i>
                    </a>
                    <a>
                        <i class="far fa-star fa-sm text-danger" title="Poor"></i>
                    </a>
                    <a>
                        <i class="far fa-star fa-sm text-danger" title="OK"></i>
                    </a>
                    <a>
                        <i class="far fa-star fa-sm text-danger" title="Good"></i>
                    </a>
                    <a>
                        <i class="far fa-star fa-sm text-danger" title="Excellent"></i>
                    </a>
                </ul>
                <div class="form-outline" name="content">
                  <textarea class="form-control" name="content" rows="4"></textarea>                
                <div class="d-flex justify-content-between mt-3">
                  <button type="reset" class="btn btn-success">Ghi lại</button>
                  <button type="submit" class="btn btn-danger">
                    Gửi <i class="fas fa-long-arrow-alt-right ms-1"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>