<?php
include_once __DIR__ . '/../vendor/autoload.php';

include_once ('config.php');

if (!defined('shop')) {
  define('shop', true);
  HOME_URL(BASE_PATH);
  date_default_timezone_set(TIMEZONE);
  db(DB_NAME, DB_USER, DB_PASS, SITE_URL, DB_COLLATION);
  # pls_autoload('App', etc_url(c_url(''))); (Handled By Composer)
}

use pluslib\Config;

use App\Auth;

Config::$passwordHash_SHA256 = false;
Config::$devMode = true;
Config::$login_page = c_url('/', false);
Config::$AuthClass = Auth::class;

Config::init();