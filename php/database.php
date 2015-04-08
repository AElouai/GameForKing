<?php
/**
*this file does what it need to do.
*no further editing is required for the moment
**/
if(!isset($isIndex))die('');
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'gameforking';

$link = new mysqli($servername, $username, $password, $dbname);

if($link->connect_error)die('');
$link->set_charset('utf8');
?>
