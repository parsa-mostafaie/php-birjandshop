<?php

function __404__()
{
  pls_http_response_code(404, live: true);

  include (etc_url(c_url('/404.php')));

  die;
}