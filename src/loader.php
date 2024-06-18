<?php

$root = __DIR__ . '/public/';

define('BASE_PATH', $root);

require BASE_PATH . '../vendor/autoload.php';

spl_autoload_register(callback: static function ($className): void {

    $classname = str_replace('\\', '/', $className);
    if (file_exists($className)) {
        require $className;
    }
});
