<?php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, 'onlinebussystem');

if(!$db) {
	die('Database error:' .$db->connect_error);
}
?>