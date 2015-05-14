<?php 
function connectDB()
{
 $connection=  mysqli_connect("localhost","root","","gameforking"); 
 if(!mysqli_connect_errno())
{
   return $connection; 
}
else {
    return NULL;
}
}
function is_exist($id_user,$connection){
    $stmt=$connection->prepare("select id from users  where id=?");
    $stmt->bind_param("i",$id_user);
    $stmt->execute();
    $stmt->bind_result($param);
   $stmt->fetch() ;
     
     if(isset($param))return 1;
     else return 0;
 
}
function is_friends($id_user,$connection,$id_friend){
    $stmt=$connection->prepare("select id_friend from friends  where id_user=?");
    $stmt->bind_param("i",$id_user);
    $stmt->execute();
    $stmt->bind_result($param);
     while ($stmt->fetch()) {
     if($param===$id_friend)
     return 1;
    }
    return 0;
}
function follow($connection,$id_user,$sess_usr)
{
    if (is_exist($id_user, $connection) === 1 && is_friends($sess_usr, $connection,$id_user)===0) {
        $stmt = $connection->prepare("update users set followed=followed+1 where id=?");
        $stmt1 = $connection->prepare("update users set following=following+1 where id=?");
         $stmt2 = $connection->prepare("insert into friends(id_user,id_friend) values(?,?)");
         
        $stmt->bind_param("i",$id_user);
        $stmt1->bind_param("i",$sess_usr);
         $stmt2->bind_param("ii",$sess_usr,$id_user);
        $stmt->execute();
        $stmt1->execute();
        $stmt2->execute();
        return 1;
    } else {
        return 0;
    }
}
?>
<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
$connection=  connectDB();
$visited=$_POST['visited'];
//$sess_usr=$_SESSION['id'];
$sess_usr=12;
echo '<response>';
if(follow($connection,$visited,$sess_usr)===1)
    echo 'ok';
else    echo 'no';
echo '</response>';
/*$a=is_friends(12,  connectDB(),14);
echo 'ggg='.$a;*/

