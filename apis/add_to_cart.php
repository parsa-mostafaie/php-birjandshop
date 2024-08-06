<?php
include_once '../init.php';

use Birjandshop\Models\Product;

pls_validate_http_method('post');
API_header();

if (setted('pid')) {
  $product = Product::find(get_val('pid'));

  if (!$product) {
    __404__();
  }

  cart()->add_item($product->ID);
}
