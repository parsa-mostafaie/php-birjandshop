<?php
namespace Birjandshop\Models;

class Cart
{
  function __construct()
  {
    if (!isset(session_arr()['cart'])) {
      $this->empty();
    }
  }
  function add_item($product, $qty = 1)
  {
    if ($this->exists($product)) {
      session('cart')[$product]['qty'] += $qty;
      return $this;
    }

    session('cart')[$product] = (new CartItem($qty, $product))->to_array();

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
    if (isset(session('cart')[$product]))
      unset(session('cart')[$product]);
    return $this;
  }

  function empty()
  {
    session_arr()['cart'] = [];

    return $this;
  }

  function pure_count()
  {
    return count($this->get_cart(true));
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
    return isset(session('cart')[$product_id]);
  }

  function get_cart($ses = false)
  {
    if (!$ses) {
      return array_map(fn($item) => new CartItem($item['qty'] ?? 1, $item['product']), $this->get_cart(true));
    }
    return session('cart');
  }

  function set_qty($product_id, $qty = 1)
  {
    if (!$this->exists($product_id)) {
      return $this->add_item($product_id, $qty);
    }
    session('cart')[$product_id]['qty'] = $qty;
    return $this;
  }

  function index_of($product_id)
  {
    return array_search($product_id, array_keys(session('cart')));
  }

}

