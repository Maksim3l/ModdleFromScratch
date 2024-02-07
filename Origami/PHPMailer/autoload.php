<?php

define("LARAVEL_START", microtime(true));

require __DIR__ . "autoload.php";

if (php_sapi_name() == "cli" && isset($_SERVER["argv"])) {
    $argv = $_SERVER["argv"];
    if (in_array("artisan", $argv) && in_array("clear-compiled", $argv)) {
        $files = glob("./bootstrap/cache/*");
        foreach ($files as $file) {
            if (file_exists($file)) {
                @unlink($file);
            }
        }
        exit();
    }
}

$compiledPath = __DIR__ . "/cache/compiled.php";

if (file_exists($compiledPath)) {
    require $compiledPath;
}
