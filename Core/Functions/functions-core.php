<?php

use Birjandshop\Models\Cart;

function cart()
{
    static $cart = null;

    if (!$cart) {
        $cart = new Cart;
    }

    return $cart;
}
