<?php
use Birjandshop\Models\Product;

if (!$__component__product instanceof Product) {
  die('noprod');
}

$_product = $__component__product;

?>
<div class="col-sm-3">
  <a class="card h-100 d-flex justify-content-between" href="#">
    <main>
      <header>
        <div class="countdown" data-time="<?= $_product->discount_date ?>">
          ---
        </div>
        <div class="position-relative">
          <?= $_product->card_image()?>
          <?php if ($_product->has_discount()): ?>
            <div class="discount position-absolute top-0 " style="left: 0"><?= $_product->discount_percent ?>%</div>
          </div>
        <?php endif; ?>
      </header>
      <h3><?= $_product->title ?></h3>
      <?php if ($_product->stock < 10): ?>
        <p class="remain-stock">تنها <?= $_product->stock ?> عدد در انبار باقی مانده</p>
      <?php endif; ?>
    </main>

    <footer>

      <div class="sale-price">
        <?= number_format($_product->get_sale_price()) ?>
        <span>تومان</span>
      </div>
      <?php if ($_product->has_discount()): ?>
        <div class="price"><?= number_format($_product->price) ?></div>
      <?php endif; ?>
    </footer>
  </a>
</div>