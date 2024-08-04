<?php
namespace Birjandshop\Models;

use pluslib\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';

    public function get_sale_price(){
        return $this->price;
    }

    public function add_view(){
        //Increase view for product
    }

    public function rate( $rate, $user_id ){

    }

    public function increase_sale_count( $count ){

    }

    public function increase_total_sale( $price ){

    }

    public function can_view(){
        return $this->stock > 0;
    }

    public function is_saleable(){
        return $this->stock > 0;
    }

    public function add_to_cart( $qty ){
        cart()->add_item($this->_id(), $qty);
    }

}