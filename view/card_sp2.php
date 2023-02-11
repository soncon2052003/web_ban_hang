<style>
    .stars-outer {
  position: relative;
  display: inline-block;
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}

.stars-outer::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #ccc;
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  color: #f8ce0b;
}
</style>

<?php
  $list_ratings = SanPham::list_star();
?>
<script>
    const ratings = <?php echo json_encode($list_ratings); ?>;
    //const ratings = { 'product21': 2.75, };

    // Total Stars
    const starsTotal = 5;

    // Run getRatings when DOM loads
    document.addEventListener('DOMContentLoaded', getRatings);

    // Form Elements
    const productSelect = document.getElementById('product-select');
    const ratingControl = document.getElementById('rating-control');

    // Init product
    let product;

    // Product select change
    productSelect.addEventListener('change', (e) => {
      product = e.target.value;
      // Enable rating control
      ratingControl.disabled = false;
      ratingControl.value = ratings[product];
    });

    // Rating control change
    ratingControl.addEventListener('blur', (e) => {
      const rating = e.target.value;

      // Make sure 5 or under
      if (rating > 5) {
        alert('Please rate 1 - 5');
        return;
      }

      // Change rating
      ratings[product] = rating;

      getRatings();
    });

    // Get ratings
    function getRatings() {
      for (let rating in ratings) {
        // Get percentage
        const starPercentage = (ratings[rating] / starsTotal) * 100;

        // Round to nearest 10
        const starPercentageRounded = `${Math.round(starPercentage / 10) * 10}%`;

        // Set width of stars-inner to percentage
        document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;

        // Add number rating
        console.log(ratings[rating]);
        document.querySelector(`.${rating} .number-rating`).innerHTML = ratings[rating];
      }
    }
</script>
<div class="col-md-3 my-3 my-md-0">
    <form action="http://web.test/controller/cart.php" method="post">
        <div class="card bg-light">  
            <a href="http://web.test/product.php?id=<?= $row['id'] ?>">
                <img src="<?= $row['image'] ?>" style="width: 250px;height: 180px">
            </a>
            <div class="card-body">
                <h4 class="card-title"><?= $row['tensanpham'] ?></h4>
                <h5 class="card-text"><?= SanPham::get_star($row['id']) ?>         
                    <div class="<?= "product" . $row['id'] ?>">
                        <div class="stars-outer">
                            <div class="stars-inner"></div>
                        </div>
                        <span class="number-rating"></span>
                    </div>
                </h5>
                <p class="card-text">Giá: <?= $row['gia'] ?></p>
                <p class="card-text">Số lượng: <?= $row['soluong'] ?></p>
                <p class="card-text">Địa chỉ: <?= $row['diachi'] ?></p>
                <input type="hidden" name='product_id' value="<?= $row['id'] ?>" >
            </div>
        </div>
    </form>
</div>