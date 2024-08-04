<?php
use pluslib\Collections\Collection;

if (!$__component__products instanceof Collection) {
  die('nocol');
}

?>
<div class="row" style="row-gap: 1rem"><?php
foreach ($__component__products as $__component__product) {
  include 'product.php';
} ?>
</div>