<?php
if(!isset($isIndex))die('');
Class User{
  public static function isConnected(){//to check if a user is connected or not
		return isset($_SESSION['u_id']);
	}
  public static function getFullName(){
    if(User::isConnected()){
      return ucfirst($_SESSION['firstName']).' '.ucfirst($_SESSION['lastName']);
    }
    else{
      return '';
    }
  }
  public static function signout(){
		session_destroy();
		unset($_SESSION);
    //unset($_COOKIE['u_id']);
	}
  public static function signin($input){
    //when we are in refactoring phase, this should be a procedure
    $result = $input['link']->query("select id,firstName,lastName from users where (email='".$input['email']."' ) and password='".G4K_MD5($input['password'])."'");
    if($result->num_rows == 1){//okey, we got results.
      $row = $result->fetch_assoc();
      $_SESSION['u_id'] = G4K_MD5($row['id']);
      $_SESSION['firstName'] = $row['firstName'];
      $_SESSION['lastName'] = $row['lastName'];
      return true;
    }
    return false;
  }

  public static function signup($input){
    //when we are in refactoring phase, this should be a procedure
    //we should add firstname, lastname into sing up page   
    $stmt = mysqli_prepare($input['link'], "INSERT INTO (email,password ) users VALUES (?,?)");
    $stmt->bind_param($input['email'],G4K_MD5($input['password']));

    if($stmt->execute()){//nicely execute 
      $_SESSION['u_id'] = G4K_MD5($mysqli->insert_id);
      $_SESSION['firstName'] = "firstName ";//need to add those field to sing up page 
      $_SESSION['lastName'] = "lastName ";
      return true;
    }
    return false;
  }

}

?>
