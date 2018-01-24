<?php
class AjaxRouter implements iRouter
{
    private $page;
    private $parameters;
    private $db;
    public function __construct($path,$db)
    {
        $this->db=$db;
        $this->page=$path[2];
        $this->parameters=$this->filterParams($_POST);
    }
    public function response()
    {
        include_once($_SERVER['DOCUMENT_ROOT'].'/app/ajax/'.$this->page.'.php');
    }
    private function filterParams($params)
    {
        foreach ($params as $key=>$value)
        {
            if(!is_int($value)&&!is_float($value))
            {
                $input_text = trim($value);
                $input_text = htmlspecialchars($input_text);
                $params[$key] = $this->db->real_escape_string($input_text);
            }
        }
        return $params;
    }
}