<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 24.01.2018
 * Time: 11:03
 */

class JsRouter implements iRouter
{
    private $page;
    public function __construct($path)
    {
        $this->page=$path[2];
    }
    public function response()
    {
        $file = $_SERVER['DOCUMENT_ROOT'].'/public/js/'.$this->page;
        if (file_exists($file)) {
            header('Content-Type: application/javascript');
            header('Cache-Control: must-revalidate');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
        else
        {
            echo 'File not exist';
            exit;
        }
    }
}