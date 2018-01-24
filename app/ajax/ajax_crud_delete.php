<?php
$id=intval($this->parameters['article']);
$article = $this->db->query("DELETE FROM articles WHERE id=$id");
$article = $this->db->query("DELETE FROM comments WHERE article_id=$id");