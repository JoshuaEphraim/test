<?php
$id=intval($this->parameters['article']);
$article = $this->db->query("SELECT * FROM articles WHERE id=$id");

$art = mysqli_fetch_array($article);

echo json_encode($art);