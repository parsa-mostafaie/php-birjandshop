<?php include 'inc.php';
use Birjandshop\Models\Product;

if (!setted('id')) {
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

?>

<?php if ($product->is_saleable()): ?>
  <?php if (!$product->is_in_cart()): ?>
    <a class="btn btn-primary" http-method="post" ajax-reload="#pcart, [id^=cart]"
      href="<?= url(c_url('/apis/add_to_cart.php'), ['pid' => $product->_id()]) ?>">
      افزودن به سبد خرید
    </a>
  <?php else: ?>
    <a class="btn btn-danger" http-method="delete" ajax-reload="#pcart, [id^=cart]"
      href="<?= url(c_url('/apis/remove_from_cart.php'), ['pid' => $product->_id()]) ?>">
      حذف از سبد خرید
    </a>
  <?php endif; ?>
<?php endif; ?>

<script>
  dangerbtns();
  httplinksInit();
  ajaxContentReLoads();
</script>