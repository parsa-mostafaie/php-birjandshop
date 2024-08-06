<?php
include 'components/header.php';
?>
<section class="container cart-container">
  <div class="d-flex justify-content-between">
    <h1>سبد خرید</h1>
    <div>
      <a http-method="delete" danger-btn ajax-reload="#cart" href="<?= url(c_url('/apis/empty_cart.php')) ?>" class="btn empty-cart btn-danger"> خالی کردن سبد </a>
      <button ajax-reload="#cart" class="btn btn-primary">تازه سازی</button>
    </div>
  </div>
  <?= view('cart') ?>
</section>
<?php include 'components/footer.php';