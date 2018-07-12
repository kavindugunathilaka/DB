<?php
include(dirname(__FILE__).'/mysqli_class.php');
include(dirname(__FILE__).'/mysqli_conf.php');

$db = new ViralDB();

//users is table name
$result = $db->find(1,'users');

$db->close();
?>