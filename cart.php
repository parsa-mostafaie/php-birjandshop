<?php
include 'components/header.php';
?>
<section class="container cart-container">
  <div class="d-flex justify-content-between">
    <h1>سبد خرید</h1>
    <div class="d-flex gap-1">
      <?= view('cart-me', 'cart-empty', without_loading: true) ?>
      <div><button ajax-reload="[id^=cart]" class="btn btn-primary">تازه سازی</button></div>
    </div>
  </div>
  <?= view('cart') ?>
</section>
<?php include 'components/footer.php';