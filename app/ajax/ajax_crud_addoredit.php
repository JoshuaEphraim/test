<?php
$id=intval($this->parameters['article']);
$action=$this->parameters['action'];
$title=$this->parameters['title'];
$text=$this->parameters['text'];
$error='';
if(!isset($text)||$text===""){$error='Write a text please!';}
if(!isset($title)||$title===""){$error.=' Write your title please!';}elseif(strlen($title)<2){$error.=' Your title to short(';}
if($error==='')
{
    if($action=='add') {
        $this->db->query('INSERT INTO articles ( `title`,`text`)
		                    VALUES ("' . $title . '", "' . $text . '")');
        if (!$this->db->error) {
            echo 'Your article added succesfull.';
        } else {
            echo $this->db->error;
        }
    }elseif($action=='edit'){
        $this->db->query('UPDATE articles SET title="' . $title . '", text="' . $text . '",updatetime= NOW() WHERE id="' . $id . '"');
        if (!$this->db->error) {
            echo 'Your article edit successfuly.';
        } else {
            echo $this->db->error;
        }
    }
}
else
{
    echo $error;
}