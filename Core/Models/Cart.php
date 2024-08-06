<?php
namespace Birjandshop\Models;

class Cart
{
  function __construct()
  {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }
  }
  function add_item($product, $qty = 1)
  {
    if ($this->exists($product)) {
      $_SESSION['cart'][$product]['qty'] += $qty;
      return $this;
    }

    $_SESSION['cart'][$product] = (new CartItem($qty, $product))->to_array();

    return $this;
  }

  function add_items($products)
  {
    foreach ($products as $p) {
      $this->add_item($p);
    }
    return $this;
  }

  function remove_item($product)
  {
    if (isset($_SESSION['cart'][$product]))
      unset($_SESSION['cart'][$product]);
    return $this;
  }

  function empty()
  {
    $_SESSION['cart'] = [];

    return $this;
  }

  function get_count()
  {
    return array_reduce($this->get_cart(), function ($count, CartItem $item) {
      return $count + $item->get_qty();
    }, 0);
  }

  function get_subtotal()
  {
    return array_reduce($this->get_cart(), function ($count, CartItem $item) {
      return $count + $item->calc_subtotal();
    }, 0);
  }

  function get_total()
  {
    return array_reduce($this->get_cart(), function ($count, CartItem $item) {
      return $count + $item->calc_total();
    }, 0);
  }

  function exists($product_id)
  {
    return isset($_SESSION['cart'][$product_id]);
  }

  function get_cart($ses = false)
  {
    if (!$ses) {
      return array_map(fn($item) => new CartItem($item['qty'] ?? 1, $item['product']), $this->get_cart(true));
    }
    return $_SESSION['cart'];
  }

  function set_qty($product_id, $qty = 1)
  {
    if (!$this->exists($product_id)) {
      return $this->add_item($product_id, $qty);
    }
    $_SESSION['cart'][$product_id]['qty'] = $qty;
    return $this;
  }

  function index_of($product_id)
  {
    return array_search($product_id, array_keys($_SESSION['cart']));
  }

}

