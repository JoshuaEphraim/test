<?php
$id=intval($this->parameters['article']);
$article = $this->db->query("SELECT * FROM comments WHERE article_id=$id ORDER BY id DESC");
$art=array();
while($c = mysqli_fetch_array($article)) {
    $art[]=$c;
}
echo json_encode($art);