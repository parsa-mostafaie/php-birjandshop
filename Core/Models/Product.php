<?php
namespace Birjandshop\Models;

use pluslib\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    protected $id_field = "ID";

    public function get_sale_price()
    {
        $dp = $this->discount_percent;
        if (strtotime($this->discount_date) <= time() && !is_null($this->discount_date)) {
            $dp = 0;
        }
        return $this->price * (100 - $dp) / 100;
    }

    public function has_discount()
    {
        return $this->get_sale_price() != $this->price;
    }

    public function add_view()
    {
        //Increase view for product
    }

    public function rate($rate, $user_id)
    {

    }

    public function increase_sale_count($count)
    {

    }

    public function increase_total_sale($price)
    {

    }

    public function can_view()
    {
        return $this->stock > 0;
    }

    public function is_saleable()
    {
        return $this->stock > 0;
    }

    public function add_to_cart($qty)
    {
        cart()->add_item($this->_id(), $qty);
    }

    function card_image()
    {
        return ProductImage::get_img($this->_id());
    }

    function cart_image()
    {
        return ProductImage::get_img($this->_id(), 'width="36" height="36"');
    }

    function slug()
    {
        return slugify($this->title);
    }

    function get_route()
    {
        return c_url(
            "/products/{$this->_id()}/{$this->slug()}",
            false
        );
    }
}