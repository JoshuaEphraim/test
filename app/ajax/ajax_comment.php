<?php
$id=intval($this->parameters['article']);
$comment=$this->parameters['comment'];
$name=$this->parameters['name'];
$e_mail=$this->parameters['e_mail'];
$error='';
if(!isset($comment)||$comment===""){$error='Write a comment please!';}
if(!isset($name)||$name===""){$error.=' Write your name please!';}elseif(strlen($name)<2){$error.=' Your name to short(';}
if(!isset($e_mail)||$e_mail===""){$error.=' Write your e_email please!';}elseif(!filter_var($e_mail,FILTER_VALIDATE_EMAIL)){$error.=' Your e-mail is not valid!';}
if($error==='')
{
    $this->db->query('INSERT INTO comments (`article_id`, `text`, `name`,`email`)
		                    VALUES ("'.$id.'", "'.$comment.'",
		                     "'.$name.'", "'.$e_mail.'")');
    if(!$this->db->error) {
        echo 'Your comment added succesfull.';
    }else
    {
        echo $this->db->error;
    }
}
else
{
    echo $error;
}

