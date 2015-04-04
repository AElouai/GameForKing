<?php
if(!isset($isIndex))die('');

if(isset($_POST['email']) && isset($_POST['password'])){

  $email = $_POST['email'];//TODO clean input
  $password = $_POST['password'];//TODO clean input
  $remember = (isset($_POST['remember']))?true:false;

  if(strlen($email) < 5 || strlen($email) > 40){
    setAlert('danger','email length should be between 5 and 40.');
    redirect('/home');
  }
  else if(strlen($password) < 5 || strlen($password) > 20){
    setAlert('danger','password length should be between 5 and 20.');
    redirect('/home');
  }
  if(User::signin(Array('email'=>$email,'password'=>$password,'link'=>$link))){
    setAlert('success','hello '.User::getFullName().', Welcome aboard!');
  }
  else{
    setAlert('danger','could not connect with the given credentials.');
    redirect('/game');
  }
}
else{
  setAlert('danger','Please fill in all the fields.');
  redirect('/home');
}
?>
