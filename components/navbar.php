<nav class="navbar navbar-expand-lg navbar-light bg-light container mt-2 rounded">
  <div class="container-fluid">
    <a href="<?= url(c_url('/')) ?>" class="navbar-brand">
      <img src="https://www.daneshjooyar.com/wp-content/themes/daneshlight/Images/logotype.svg" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
      <form class="d-flex mx-2 mb-2">
        <input class="form-control mx-1" type="search" placeholder="جستجو" aria-label="جستجو">
        <button class="btn btn-outline-success" type="submit">جستجو</button>
      </form>
      <div class="mx-2 d-flex justify-content-center">
        <a href="<?= url(c_url('/cart.php')) ?>" class="go-to-cart">
          <?php if (cart()->pure_count()): ?>
            <span class="item-count"><?= cart()->pure_count() ?></span>
          <?php endif; ?>
          <?= svg_cart() ?>
        </a>
        <a href="#" class="btn btn-secondary">
          ورود/ثبت نام
        </a>
      </div>
    </div>
  </div>
</nav>