<?php
    spl_autoload_register('myAutoloader');
    function myAutoloader($className)
{
    $paths = [
        "./classes/",
        "../classes/",
        "../../classes/"
    ];

    $dirs = [
        'db/',
        'clients/',
        'locations/',
        'mini-chat/',
        'utilisateurs/',
        'voiture/',
    ];

    $fullpath = '';
    $extension = '.class.php';
    foreach ($paths as $path) {
        foreach ($dirs as $dir) {
            $fullpath = $path . $dir . $className . $extension;
            if (file_exists($fullpath)) {
                include_once $fullpath;
            }
        }
    }
}
?>