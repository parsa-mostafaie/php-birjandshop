<?php

function __Resubmit()
{
  ?>
  <script src="/<?= RELPATH ?>frontend/resubmit.js"></script>
  <?php
}

function __FormlibAjax()
{
  ?>
  <script src="/<?= RELPATH ?>frontend/formlib.js" type="module"></script>
  <?php
}

function __HTTPLink()
{
  static $imported = false;
  if ($imported)
    return;
  ?>
  <script type="module" src="/<?= RELPATH ?>frontend/httplink.js" defer></script>
  <?php
  $imported = true;
}

function __AjaxInit1()
{
  ?>
  <script src="<?= www_url(c_url('/js/ajaxInit1.js', false)) ?>" type="module"></script>
  <?php
}

function __SweetAlert()
{
  static $imported = false;
  if ($imported) {
    return;
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php
  $imported = true;
}

function __DangerButtons()
{
  __SweetAlert();
  static $imported = false;
  if ($imported) {
    return;
  }
  ?>
  <script src="<?= www_url(c_url('/js/dangerbtn.js')) ?>"></script>
  <?php
  $imported = true;
}

function __AjaxContent()
{
  static $imported = false;
  if ($imported) {
    return;
  }
  ?>
  <script src="/<?= RELPATH ?>frontend/ajax-content.js" type="module"></script>
  <script>window.httplinksConfig = { refreshOn: 2 }</script>
  <?php
  $imported = true;
}

function __JQ()
{
  ?>
  <script src="<?= www_url(c_url('/js/jquery-3.7.1.min.js')) ?>"></script>
  <?php
}

function __BS_Script()
{
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <?php
}

function useResubmit()
{
  add_footer('__Resubmit');
}

function useFormlibAjax()
{
  add_footer('__FormlibAjax');
}

function useAjaxInit1()
{
  add_footer('__AjaxInit1');
}

function useSweetAlert()
{
  add_footer('__SweetAlert');
}

function useDangerButtons()
{
  add_footer('__DangerButtons');
}
function useAjaxContent()
{
  add_footer('__AjaxContent');
}

function useHTTPLink()
{
  add_footer('__HTTPLink');
}

function useBootstrapScript()
{
  add_footer('__BS_SCRIPT');
}

function useJQ()
{
  add_footer('__JQ');
}