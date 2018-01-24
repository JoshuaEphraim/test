<?php
$article = $this->db->query('SELECT * FROM articles');
$art=array();
while($c = mysqli_fetch_array($article)) {
    $comments = $this->db->query('SELECT count(*) FROM comments WHERE article_id="'.$c['id'].'"');
    $com=$comments->fetch_assoc();
    $c['comments']=array_shift($com);
    $c['text']=substr($c['text'],0,300);
    $art[]=$c;
}
echo json_encode($art);