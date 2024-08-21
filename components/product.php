<?php
use Birjandshop\Models\Product;

if (!$__component__product instanceof Product) {
  die('noprod');
}

$_product = $__component__product;

?>
<div class="col-sm-6 col-md-4 col-12 col-xl-3 <?= $_product->class ?>">
  <a class="card-product card h-100 d-flex justify-content-between" href="<?= url($_product->get_route()) ?>">
    <main>
      <header>
        <div class="countdown" data-time="<?= $_product->discount_date ?>">
          ---
        </div>
        <div class="position-relative">
          <?= $_product->card_image() ?>
          <div class="discount position-absolute top-0 if-discount" style="left: 0">
            <?= $_product->get_discount_percent() ?>%</div>
        </div>
      </header>
      <h3><?= $_product->title ?></h3>
      <?= $_product->remain_stock(true) ?>
    </main>

    <footer>
      <div class="sale-price">
        <?= $_product->readable_sale_price() ?>
        <span>تومان</span>
      </div>
      <div class="price if-discount"><?= $_product->readable_price() ?></div>
    </footer>
  </a>
</div>