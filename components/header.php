<?php
include_once __DIR__ . '/../init.php';

ob_start('minify_html');
?>
<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8">
  <title><?= meta('title', "فروشگاه اینترنتی") ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php __favicon() ?>
  <link rel="stylesheet" href="<?= c_url('/assets/css/style.css', false); ?>">
  <?php do_head() ?>
</head>

<body>
  <?php include_once 'navbar.php'; ?>