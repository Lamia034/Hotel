<?php



declare(strict_types=1);

session_start();

spl_autoload_register(function (string $class_name) {
    $array_paths = [
        'database/',
        'app/classes/',
        'model/',
        'controller/'
    ];

    $parts = explode('\\', $class_name);
    $name = array_pop($parts);

    foreach ($array_paths as $path) {
        $file = sprintf($path.'%s.php', $name);
        if (is_file($file)) {
            require_once $file;
        }
    }
});

?>