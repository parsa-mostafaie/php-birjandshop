<?php
include_once 'config.php';

include_once 'app.php';
date_default_timezone_set(TIMEZONE);
set_exception_handler('pls_exception_handler');
# pls_autoload('App', etc_url(c_url(''))); (Handled By Composer)