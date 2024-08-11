<?php
include_once '../init.php';

pls_validate_http_method('post');
API_header();

if (setted('pid')) {
  $absint = abs(intval(get_val('pid')));
  cart()->set_qty($absint, max(1, cart()->get_qty($absint) - 1));
}
