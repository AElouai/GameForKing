<?php
if(!isset($isIndex))die('');

User::signout();
setAlert('success','you are now logged out');
redirect('/');

?>
