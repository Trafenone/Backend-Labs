<?php
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $path = __DIR__ . "/{$class}.php";
    if(is_readable($path)) {
        echo "Class {$class} is loaded\n" . PHP_EOL;
        require($path);
    }
});