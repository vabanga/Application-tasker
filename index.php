<?php

require 'application/lib/Dev.php';

use application\core\Router;

session_start();

require 'autoload.php';

$router = new Router;
$router->run();