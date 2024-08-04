<?php
use Birjandshop\Models\Product;
use pluslib\SEO\MetaTags;

require ('init.php');

if (!urlParam_Sended('id')) {
    __404__();
}

$pid = abs(intval(get_val('id')));

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
<?php include_once ('components/header.php') ?>
<section class="container">
    <h1><?php echo $product->title; ?></h1>
    <?php echo number_format($product->get_sale_price() / 10); ?>
    <br>
    <img class="w-50" src="<?php echo $product->thumbnail; ?>" alt="">
    <?php if ($product->is_saleable()): ?>
        <a class="btn btn-primary" href="/product.php?id=<?php echo $product->ID; ?>&add_to_cart=1">
            Add to cart
        </a>
    <?php endif; ?>
</section>
<?php include_once ('components/footer.php') ?>