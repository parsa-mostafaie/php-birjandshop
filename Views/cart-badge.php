<?php
include 'inc.php';

if (cart()->pure_count()): ?>
  <span class="item-count"><?= cart()->pure_count() ?></span>
<?php endif; ?>