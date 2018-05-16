<?php

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    $fullpath = str_replace('\\', '/', __DIR__ . '/' .$path);
    require_once $fullpath;
});