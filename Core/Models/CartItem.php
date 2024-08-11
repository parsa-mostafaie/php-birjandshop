<?php
namespace Birjandshop\Models;

use Birjandshop\Traits\Price;

class CartItem
{
    use Price;
    protected ?Product $product_model = null;
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

    function readable_total()
    {
        return $this->readable_toman($this->calc_total());
    }

    function readable_subtotal()
    {
        return $this->readable_toman($this->calc_subtotal());
    }

    function get_qty()
    {
        return $this->qty;
    }

    function get_product()
    {
        $this->product_model ??=
            Product::find($this->product);

        return $this->product_model;
    }

    function to_array()
    {
        return ['product' => $this->product, 'qty' => $this->qty];
    }

    function toArray()
    {
        return $this->to_array();
    }
}
