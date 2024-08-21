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
        <ins><?= cart()->readable_total(); ?></ins>
        <?php
        }
      ]);
      return;
    }

    $td_render(cart()->index_of($cartItem->get_product()->_id()) + 1);

    $td_render(function () use ($cartItem) {
      ?>
      <div><a href="<?= $cartItem->get_product()->get_route() ?>">
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
      </div>
      <?php
    });

    $td_render(function () use ($cartItem) {
      $inc = url(c_url('/apis/qty_inc.php'), ['pid' => $cartItem->get_product()->_id()]);
      $dec = url(c_url('/apis/qty_dec.php'), ['pid' => $cartItem->get_product()->_id()]);

      ?>
      <div class="<?= $cartItem->get_INCDEC_Class() ?>">
        <a http-method="post" ajax-reload="[id^=cart]" href="<?= $dec ?>"
          class="text-danger text-decoration-none fs-3 if-inc-allowed">-</a>
        <span class="fs-6"><?= $cartItem->get_qty() ?></span>
        <a http-method="post" ajax-reload="[id^=cart]" href="<?= $inc ?>"
          class="text-success text-decoration-none fs-3 if-dec-allowed">+</a>
      </div>

      <?php
    });

    $td_render(function () use ($cartItem) {
      ?>
      <?php if ($cartItem->get_product()->has_discount()): ?>
        <del><?= $cartItem->get_product()->readable_price() ?></del>
      <?php endif; ?>
      <ins><?= $cartItem->get_product()->readable_sale_price() ?></ins>
      <?php
    });

    $td_render(function () use ($cartItem) {
      ?>
      <ins><?= $cartItem->readable_total() ?></ins>
      <?php
    });

  }, $empty, 'cart-table ' . TABLE_BASE_CSS_CLASS);
}