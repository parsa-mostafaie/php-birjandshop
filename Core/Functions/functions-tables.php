<?php

use Birjandshop\Models\CartItem;

function cart_table()
{
  $fields = [
    '#',
    'محصول',
    'تعداد',
    'مبلغ (تومان)',
    'مبلغ کل (تومان)'
  ];

  $values = cart()->get_cart();

  if (count($values)) {
    $values[] = null;
  }

  $empty = function () {
    ?>
    <div class="alert alert-primary">سبد خرید شما خالی است!</div>
    <?php
  };

  return tablify($fields, $values, function (CartItem|null $cartItem, callable $td_render) {
    if (is_null($cartItem)) {
      $td_render([
        '',
        'جمع کل',
        '',
        '',
        function () { ?>
        <ins><?= number_format(cart()->get_subtotal()); ?></ins>
        <?php
        }
      ]);
      return;
    }

    $td_render(cart()->index_of($cartItem->get_product()->_id()) + 1);

    $td_render(function () use ($cartItem) {
      ?>
      <a href="<?= $cartItem->get_product()->get_route() ?>">
        <?= $cartItem->get_product()->cart_image() ?>
        <p>
          <?= $cartItem->get_product()->title ?>
        </p>
      </a>
      <a http-method="delete" ajax-reload="[id^=cart]" danger-btn
        href="<?= url(c_url('/apis/remove_from_cart.php'), ['pid' => $cartItem->get_product()->_id()]) ?>"
        class="remove-item">
        <?= svg_remove_item() ?>
      </a>
      <?php
    });

    $td_render($cartItem->get_qty());

    $td_render(function () use ($cartItem) {
      ?>
      <?php if ($cartItem->get_product()->has_discount()): ?>
        <del><?= number_format($cartItem->get_product()->price) ?></del>
      <?php endif; ?>
      <ins><?= number_format($cartItem->get_product()->get_sale_price()) ?></ins>
      <?php
    });

    $td_render(function () use ($cartItem) {
      ?>
      <ins><?= number_format($cartItem->calc_total()) ?></ins>
      <?php
    });

  }, $empty, 'cart-table ' . TABLE_BASE_CSS_CLASS);
}