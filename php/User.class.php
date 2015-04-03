<?php
if(!isset($isIndex))die('');
Class User{
  public static function isConnected(){//to check if a user is connected or not
		return true;
	}
  public static function logout(){
		session_destroy();
		unset($_SESSION);
    //unset($_COOKIE['u_id']);
	}
}

?>
