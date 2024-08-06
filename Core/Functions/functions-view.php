<?php
function view($url, $id = null, $props = [], $without_loading = false)
{
  $url = url($url . ".php", $props);
  $url = c_url('/Views/' . $url);
  $etc = etc_url($url);
  $www = www_url($url);

  ?>
  <div ajax-container id="<?= $id ?? pathinfo($etc, PATHINFO_FILENAME) ?>">
    <?php if (!$without_loading): ?>
      <div class="d-flex align-items-center overflow-hidden justify-content-center mx-auto loading">
        <div class="spinner-grow text-primary" role="status" aria-hidden="true"></div>
        <p class="my-0 me-2">لطفا صبر کنید!</p>
      </div>
    <?php endif; ?>
    <div ajax-content http-method="post" href="<?= redirect($www, back: true, gen: true) ?>" loading=".loading">
    </div>
  </div>
  <?php
  useDangerButtons();
  useAjaxContent();
  useHTTPLink();
}