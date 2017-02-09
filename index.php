<?php
require_once __DIR__.'/vendor/autoload.php';
$config_path = __DIR__.'/src/config.php';

use Docker\Core as Core;

$app = Core::getInstance();
$app->run($config_path);
