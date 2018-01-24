<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 24.01.2018
 * Time: 10:38
 */

class MainRouter implements iRouter
{
    private static $authorized = array('article', 'main','crud','articles');
    private $page;
    private $parameters;
    public function __construct($path)
    {
        if($path[1]==='')
        {
            $page='main';
        }else {
            foreach ($path as $key => $value) {
                if ($key == 1) {
                    $page = $value;
                } elseif($key>1) {
                    $this->parameters[] = $value;
                }
            }
        }
        $this->page=$this->filterPath($this->rewritePath($page));
    }
    public function response()
    {
        include_once($_SERVER['DOCUMENT_ROOT'].'/public/templates/'.$this->page.'.tpl');
    }
    public function getParameters()
    {
        return $this->parameters;
    }
    private function filterPath($page)
    {
        if(!in_array($page,self::$authorized))
        {
            return '404';
        }
        return $page;
    }
    private function rewritePath($page){
        switch($page){
            case 'add':
                $this->parameters['action']='add';
                return 'crud';
            case 'edit':
                $this->parameters['action']='edit';
                return 'crud';
        }
        return $page;
    }
}