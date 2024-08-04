<?php
namespace Birjandshop\Models;

class CartItem
{
    public function __construct(protected $qty = 1, protected $product)
    {
    }

    function calc_total()
    {
        return $this->get_product()->get_sale_price() * $this->qty;
    }

    function calc_subtotal()
    {
        return $this->get_product()->price * $this->qty;
    }

    function get_qty()
    {
        return $this->qty;
    }

    function get_product()
    {
        return Product::find($this->product);
    }

    function to_array()
    {
        return ['product' => $this->product, 'qty' => $this->qty];
    }
}
