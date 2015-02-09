<?php
require_once('./inc/DB.class.php');
$db=DB::start();
if($db =="false"){
die("Database connection Failed : ".mysqli_connect_error()."(".mysqli_connect_errno().")");
}

?>