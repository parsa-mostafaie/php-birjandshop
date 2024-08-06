<?php
include 'inc.php';

$ecart_attrs = cart()->get_count() ? 'http-method="delete" danger-btn ajax-reload="[id^=cart]" href="' . url(c_url('/apis/empty_cart.php')) . '"' : 'disabled';
?>

<a class="btn empty-cart btn-danger <?= !cart()->get_count() ? 'disabled' : '' ?>" <?= $ecart_attrs ?>> خالی کردن سبد </a>