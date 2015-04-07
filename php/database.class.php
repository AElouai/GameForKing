<?php
if(!isset($isIndex))die('');
Class DB{

  public static function add(){
		
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
