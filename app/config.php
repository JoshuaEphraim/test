<?php
$db_host='localhost';
$db_user='root';
$db_password='';
$db_database='test';
$db=mysqli_connect($db_host, $db_user, $db_password, $db_database);
$db->set_charset('utf8');
define('HOME', 'test.job');
