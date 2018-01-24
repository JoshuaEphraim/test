<?php
spl_autoload_register('loadClasses');
spl_autoload_register('loadRouteFactory');
spl_autoload_register('loadRouters');
function loadClasses($aClassName) {
    $aClassFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR .'classes' . DIRECTORY_SEPARATOR .$aClassName . '.php';
    if (file_exists($aClassFilePath)) {
        require_once $aClassFilePath;
        return true;
    }
    return false;
}
function loadRouteFactory($aClassName) {
    $aClassFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR .'classes' . DIRECTORY_SEPARATOR .'RouteFactory'. DIRECTORY_SEPARATOR .$aClassName . '.php';
    if (file_exists($aClassFilePath)) {
        require_once $aClassFilePath;
        return true;
    }
    return false;
}
function loadRouters($aClassName) {
    $aClassFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR .'classes' . DIRECTORY_SEPARATOR .'RouteFactory'. DIRECTORY_SEPARATOR .'Routers'. DIRECTORY_SEPARATOR .$aClassName . '.php';
    if (file_exists($aClassFilePath)) {
        require_once $aClassFilePath;
        return true;
    }
    return false;
}
