<?php
header('Content-Type: text/xml');
include 'login_functions.php';
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
echo '<Errors>';
$connection=  connectDB();
$login = $_POST['login'];
$v_log=verify_login($connection,$login);
echo '<errorLogin>';
if($v_log===1)
{       echo 'images/yes1.png';

}
else  echo 'images/no1.png';
echo '</errorLogin>';
echo '<errorPassword>';
       if(isset($_POST['password']))
       {   $password=$_POST['password'];
           $login = $_POST['login2'];
           if(verify_password($connection,$login,$password)===1)
           echo 'images/yes1.png';
           else echo 'images/no1.png';
       }
       echo '</errorPassword>';

echo '</Errors>';


?>
