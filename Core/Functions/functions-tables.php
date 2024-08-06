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

  $empty = function () {
    ?>
    <div class="alert alert-primary">سبد خرید شما خالی است!</div>
    <?php
  };

  return tablify($fields, $values, function (CartItem $cartItem, callable $td_render) {
    $td_render(cart()->index_of($cartItem->get_product()->_id()) + 1);

    $td_render(function () use ($cartItem) {
      ?>
      <a href="<?= $cartItem->get_product()->get_route() ?>">
        <?= $cartItem->get_product()->cart_image() ?>
        <p>
          <?= $cartItem->get_product()->title ?>
        </p>
      </a>
      <a href="#" class="remove-item">
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

  }, $empty, 'cart-table');
}