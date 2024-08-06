<?php

use Birjandshop\Models\Product;

include 'components/header.php'; ?>
<section class="container">
    <h2>جدید ترین ها</h2>
        <?php
        $__component__products = Product::select()->LIMIT(24)->get();
        include 'components/products.php';
        ?>
</section>
<?php include 'components/footer.php' ?>