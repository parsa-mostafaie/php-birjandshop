<?php

function __favicon()
{
  $path = url(c_url('/assets/icons/'));
  ?>
  <link rel="shortcut icon" href="<?=$path?>favicon.png" type="image/png">
  <link type="image/png" sizes="16x16" rel="icon" href="<?= $path ?>size-16.png">
  <link type="image/png" sizes="32x32" rel="icon" href="<?= $path ?>size-32.png">
  <link type="image/png" sizes="96x96" rel="icon" href="<?= $path ?>size-96.png">
  <link rel="icon" type="image/png" sizes="72x72" href="<?= $path ?>size-72.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= $path ?>size-96.png">
  <link rel="apple-touch-icon" type="image/png" sizes="57x57" href="<?= $path ?>size-57.png">
  <link rel="apple-touch-icon" type="image/png" sizes="60x60" href="<?= $path ?>size-60.png">
  <link rel="apple-touch-icon" type="image/png" sizes="72x72" href="<?= $path ?>size-72.png">
  <link rel="apple-touch-icon" type="image/png" sizes="76x76" href="<?= $path ?>size-76.png">
  <meta name="msapplication-square70x70logo" content="<?= $path ?>size-70.png">
  <?php
}