<?php
function connectDB()
{
 $connection=  mysqli_connect("localhost","root","","game"); 
 if(!mysqli_connect_errno())
{
   return $connection; 
}
else {
    return NULL;
}
}
function verify_login($connection,$login)
{$param;
$stmt=$connection->prepare("select login from users");
$stmt->execute();
 $stmt->bind_result($param);
 while ($stmt->fetch()) {
     if($param===$login)
     return 1;
    }
    return 0;
}
function verify_password($connection,$login,$password)
{$param;
$stmt=$connection->prepare("select password from users where login=?");
$stmt->bind_param("s",$login);
$stmt->execute();
 $stmt->bind_result($param);
 while ($stmt->fetch()) {
     if($param===$password)
     return 1;
    }
    return 0;
}
function verify_email($connection,$email)
{$param;
$stmt=$connection->prepare("select email from users");
$stmt->execute();
 $stmt->bind_result($param);
 while ($stmt->fetch()) {
     if($param===$email)
     return 1;
    }
    return 0;
}
function password_identity($pass1,$pass2)
{
    if($pass1===$pass2) return 1;
    else return 0;
}

function check_face_usr($fuid,$ffname,$femail){
        $connection=  connectDB();
        $result= mysqli_query($connection,"select * from users where Fuid='$fuid'");
        $res=  mysqli_num_rows($result);
	if (empty($res)) { // if new user	
	$query = "INSERT INTO users (Fuid,email,login,total_score,creation_date,week_score) VALUES ('$fuid','$femail','$ffname',0,now(),0)";
		
	} else {   // If Returned user 	
	$query = "UPDATE users SET login='$ffname', email='$femail' where Fuid='$fuid'";
	}
        mysqli_query($connection, $query);  
}


?>
