<?php

function useResubmit()
{
  ?>
  <script src="/<?= RELPATH ?>frontend/resubmit.js"></script>
  <?php
}

function useFormlibAjax()
{
  ?>
  <script src="/<?= RELPATH ?>frontend/formlib.js" type="module"></script>
  <?php
}

function useHTTPLink()
{
  static $imported = false;
  if ($imported)
    return;
  ?>
  <script type="module" src="/<?= RELPATH ?>frontend/httplink.js" defer></script>
  <?php
  $imported = true;
}


function useAjaxInit1()
{
  ?>
  <script src="<?= www_url(c_url('/js/ajaxInit1.js', false)) ?>" type="module"></script>
  <?php
}

function useSweetAlert()
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

function useDangerButtons()
{
  useSweetAlert();
  static $imported = false;
  if ($imported) {
    return;
  }
  ?>
  <script src="<?= www_url(c_url('/js/dangerbtn.js', false)) ?>"></script>
  <?php
  $imported = true;
}

function useAjaxContent()
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