<?php

Class User{
    public static function isConnected(){//to check if a user is connected or not
		return isset($_SESSION['u_id']);
	}
    public static function getUserId(){
        return (User::isConnected())?$_SESSION['u_id']:'';
    }
    public static function getFullName(){
        if(User::isConnected()){
          return ucfirst($_SESSION['firstName']).' '.ucfirst($_SESSION['lastName']);
        }
        else{
          return '';
        }
    }
    public static function getScore($input){
        $link = $input['link'];
        $user_id = (isset($input['userId']))?$input['userId']:User::getUserId();

        $result = $link->query("SELECT score from users where id='$user_id'");
        if($result->num_rows){
            $row = $result->fetch_assoc();
            return $row['score'];
        }
        return 0;
    }
    public static function signout(){
		session_destroy();
		unset($_SESSION);
        //unset($_COOKIE['auth_token']);
    }
    public static function signin($input){
        //when we are in refactoring phase, this should be a procedure
        $result = $input['link']->query("select id,firstName,lastName from users where (email='".$input['email']."' ) and password='".G4K_MD5($input['password'])."'");
        $res= $result->num_rows;
        if($res){//okey, we got results.
          $row = $result->fetch_assoc();
          $_SESSION['u_id'] = $row['id'];
          $_SESSION['firstName'] = $row['firstName'];
          $_SESSION['lastName'] = $row['lastName'];
          return true;
        }
        return false;
    }

    public static function signup($input){
        //when we are in refactoring phase, this should be a procedure
        //we should add firstname, lastname into sing up page
        $stmt = $input['link']->stmt_init();
        $stmt = mysqli_prepare($input['link'], "INSERT INTO users(email,password) VALUES (?,?)");
        $pass =G4K_MD5($input['password']);
        $stmt->bind_param('ss',$input['email'],$pass);
          
        if($stmt->execute()){//nicely execute
          $_SESSION['u_id'] = $stmt->insert_id;
          $_SESSION['firstName'] = "firstName ";//need to add those field to sing up page
          $_SESSION['lastName'] = "lastName ";//nah , leave it to profile, cuz more fields are not necessary
          return true;
        }
        return false;
    }

    public static function isPlaying($input){
        $userId = User::getUserId();
        $result = $input['link']->query("select isPlaying from users where id='$userId'");
        $row = $result->fetch_assoc();
        return $row['isPlaying'];
    }

}

?>
