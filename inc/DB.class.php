<?php
class DB
{
	public static function start(){
		$dbhost ="localhost";//le serveur 
		$dbuser ="root";
		$dbpass ="";
		$dbname ="gameforking";
		$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if(mysqli_connect_errno()){
		return false;
		}
		return $db;
	}

?>