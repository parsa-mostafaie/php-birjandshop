<?php

use Birjandshop\Auth;
use pluslib\Support\Facades\Application;

return Application::configure(
  basepath: '/birjandshop',
  login_path: '/',
  auth_class: Auth::class,
  devmode: true,
  use_sha: false
)
  ->db(
    DB_NAME,
    DB_USER,
    DB_PASS,
    SITE_URL,
    DB_COLLATION
  )
  ->init();