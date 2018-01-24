<?php

/**
 * Created by PhpStorm.
 * User: sozin
 * Date: 24.01.2018
 * Time: 0:25
 */
class Route
{
    private $router;
    public function __construct($url,$db)
    {
        $director=new Director();
        $this->router=$director->getRouter($url,$db);
    }
    public function getResponse()
    {
        $this->router->response();
    }
    public function getParameters()
    {
        $this->router->getParameters();
    }

}