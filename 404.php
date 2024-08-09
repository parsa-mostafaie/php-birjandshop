<?php
include_once 'init.php';
pls_http_response_code(404, live: true);
?>
<?php include 'components/header.php'; ?>
<section class="container">
  <main class="d-flex justify-content-center align-items-center">
    <h1 class="ms-3 ps-3 align-top border-start inline-block align-content-center">404</h1>
    <div class="inline-block align-middle">
      <h2 class="font-weight-normal lead" id="desc">صفحه مورد نظر شما یافت نشد!</h2>
    </div>
  </main>
  <footer class="d-flex w-100 justify-content-center">
    <a href="<?= url(c_url('/')) ?>" class="btn btn-outline-primary">رفتن به صفحه اصلی</a>
  </footer>
</section>
<?php include 'components/footer.php'; ?>