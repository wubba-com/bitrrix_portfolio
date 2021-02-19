<?php
require __DIR__ . '/include/functions.php';

if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/vendor/autoload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/local/vendor/autoload.php';
}


function debug(array $data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}