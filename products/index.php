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
<section class="container">
  <h1><?php echo $product->title; ?></h1>
  <?php echo number_format($product->get_sale_price() / 10); ?>
  <br>
  <img class="w-50" src="<?= urlOfUpload($product->thumbnail); ?>" alt="">
  <br>
  <br>
  <?= view('product-cart', 'pcart',props: ['id' => $product->_id()]) ?>
</section>
<?php include_once ('../components/footer.php') ?>