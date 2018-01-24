<?php

class Director
{

    public function __construct()
    {
    }
    public function getRouter($url,$db)
    {
        $path=parse_url($url, PHP_URL_PATH);
        $path = explode('/', $path);
        if($path[1]=='css')
        {
            return new CssRouter($path);
        }elseif($path[1]=='js'){
            return new JsRouter($path);
        }elseif($path[1]=='img'){
            return new ImgRouter($path);
        }elseif($path[1]=='ajax'){
            return new AjaxRouter($path,$db);
        }else{
            return new MainRouter($path);
        }
    }
}
