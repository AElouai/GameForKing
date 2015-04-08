<?php
if(!isset($isIndex))die('');

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])){

  $email = $_POST['email'];//TODO clean input
  $password = $_POST['password'];//TODO clean input
  $password2 = $_POST['password2'];//TODO clean input

  if(strlen($email) < 5 || strlen($email) > 60){
    setAlert('danger','email length should be between 5 and 60.');
    redirect('/home');
  }
  else if(strlen($password) < 5 || strlen($password) > 20 || strlen($password2) < 5 || strlen($password2) > 20){
    setAlert('danger','password length should be between 5 and 20.');
    redirect('/home');
  }else if($password != $password2){
    setAlert('danger','password don'."'"."t match");
    redirect('/home');
  }
  if(User::signup(Array('email'=>$email,'password'=>$password,'link'=>$link))){
    setAlert('success','hello '.User::getFullName().', Welcome aboard!');
    redirect('/go');
  }
  else{
    setAlert('danger','could not connect with the given credentials.');
    redirect('/home');
  }
}
else{
  setAlert('danger','Please fill in all the fields.');
  redirect('/home');
}
?>
