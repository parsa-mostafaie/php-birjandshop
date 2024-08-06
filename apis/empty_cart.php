<?php
include_once '../init.php';

pls_validate_http_method('delete');
API_header();

cart()->empty();