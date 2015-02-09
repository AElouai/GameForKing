<?php
//require_once('.\inc\db.php');
//require_once('./inc/DB.class.php');
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
}
$db=DB::start();
if($db =="false"){
die("Database connection Failed : ".mysqli_connect_error()."(".mysqli_connect_errno().")");
}

$query = "select * from user ";
$query .="where psoeudo = ".$_POST["cpsoudo"]." ";
$query .="and password = ".$_POST["cpassword"]." ;";
$result = mysqli_query($db,$query);

if($result){
		Redirect("/inc/game.php");
}else {
		$echo ="login erron !! ";
		}

?>