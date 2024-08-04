<?php
use Birjandshop\Model\Product;

if( isset( $_GET['id'] ) && isset( $_GET['add_to_cart'] ) ){

    $product = new Product( $_GET['id'] );
    //cart()->empty();exit;
    cart()->add_item( $product->ID );
    print_r( $_SESSION['cart'] );exit;
    
    print_r( cart() );
    exit;

}

if( isset( $_GET['id'] ) && isset( $_GET['remove_from_cart'] ) ){

    $product = new Product( $_GET['id'] );
    //cart()->empty();exit;
    cart()->remove_item( $product->ID );
    print_r( $_SESSION['cart'] );exit;
    print_r( cart() );
    exit;

}