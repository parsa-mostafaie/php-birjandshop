<?php
use Birjandshop\Models\Product;
use pluslib\SEO\MetaTags;

require ('lib.php');

if (!product_id()) {
  __404__();
}

$pid = abs(intval(product_id()));

if (!$pid) {
  __404__();
}

$product = Product::find($pid);

if (!$product) {
  __404__();
}

if (!$product->can_view()) {
  __404__();
}

meta()->title($product->title);
?>
<?php include_once ('../components/header.php');
normalize_route();
?>
<section class="container bg-white p-4 rounded">
  <div class="px-lg-2">
    <main class="d-flex gap-2">
      <nav class="flex-grow-1 d-flex flex-column gap-2" style="max-width: 33%">
        <?php if ($product->has_discount() && !empty($product->discount_date)): ?>
          <div class="bg-danger p-2 w-100 d-flex justify-content-between align-items-center rounded"
            style="--bs-bg-opacity: 0.1">
            <div class="fw-bold text-danger">پیشنهاد شگفت انگیز</div>
            <div class="countdown position-static d-block text- fs-6" data-time="<?= $product->discount_date ?>"></div>
          </div>
        <?php endif; ?>
        <div style="max-width: 100%">
          <?= $product->sp_image() ?>
        </div>
      </nav>
      <div class="flex-grow-1" style="max-width: 33%">
        <h5><?= $product->title ?></h5>
        <hr>
        <p class="small">
          <span>
            <i class="bi bi-star-fill text-warning"></i>
            4.6
            <span class="text-secondary">(از 1000 خرید انجام شده)</span>
          </span>
          <span class="vr"></span>
          <a href="#" class="text-decoration-none">100 دیدگاه</a>
          <span class="vr"></span>
          <a href="#" class="text-decoration-none">100 پرسش</a>
        </p>
        <p class="small">
          <i class="bi bi-hand-thumbs-up-fill text-success"></i>
          ۹۶% (۹۹۹ نفر) از خریداران، این کالا را پیشنهاد کرده‌اند
        </p>
      </div>
      <div class="flex-grow-1" style="max-width: 33%">
        <div class="p-2 text-align-start bg-info text-white rounded px-3">
          <b class="text-black">قیمت</b>
          <div style="text-align: left">
            <?php if ($product->has_discount()): ?>
              <div class="d-flex gap-1 justify-content-end">
                <del class="text-secondary"><?= $product->readable_price() ?></del>
                <span
                  class="badge bg-danger text-white rounded-pill align-middle d-flex justify-content-center align-items-center"><?= $product->get_discount_percent() ?>%</span>
              </div>
            <?php endif ?>
            <span class="text-success"><?= $product->readable_sale_price() ?></span>
            <span>تومان</span>
          </div>
          <hr>
          <?= $product->remain_stock() ?>
          <?= view('product-cart', 'pcart', props: ['id' => $product->_id()]) ?>
        </div>
      </div>
    </main>
    <hr>
    <b class="h3 d-block">درباره محصول</b>
    <?= $product->content ?>
  </div>
</section>
<?php include_once ('../components/footer.php') ?>