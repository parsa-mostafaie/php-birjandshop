<?php

include_once __DIR__ . '/../init.php';

function product_id()
{
  return ScanRoute('/products/%d', $d)[0];
}

function normalized_route()
{
  global $product;
  return $product->get_route();
}

function normalize_route()
{
  ?>
  <?php if ($_SERVER['REQUEST_URI'] != normalized_route()): ?>
    <script>
      window.history.replaceState({}, '', "<?= normalized_route() ?>" + window.location.hash)
    </script>
  <?php endif; ?>
<?php
}