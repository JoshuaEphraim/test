<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/autoload.php');
$route=new Route($_SERVER['REQUEST_URI'],$db);

$route->getResponse();