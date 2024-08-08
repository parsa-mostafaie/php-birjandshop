<?php
use Birjandshop\Models\Product;

if (!$__component__product instanceof Product) {
  die('noprod');
}

$_product = $__component__product;

?>
<div class="col-sm-6 col-md-4 col-12 col-lg-3">
  <a class="card-product card h-100 d-flex justify-content-between" href="<?= url($_product->get_route()) ?>">
    <main>
      <header>
        <div class="countdown" data-time="<?= $_product->discount_date ?>">
          ---
        </div>
        <div class="position-relative">
          <?= $_product->card_image() ?>
          <?php if ($_product->has_discount()): ?>
            <div class="discount position-absolute top-0 " style="left: 0"><?= $_product->get_discount_percent() ?>%</div>
          <?php endif; ?>
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
      <?php if ($_product->has_discount()): ?>
        <div class="price"><?= $_product->readable_price() ?></div>
      <?php endif; ?>
    </footer>
  </a>
</div>