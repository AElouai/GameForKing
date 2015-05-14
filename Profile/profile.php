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
function profile($connection,$id_user)
{
  $stmt = $connection->prepare("select firstName,lastName,score,followed,following,battles from users where id=?");  
   $stmt->bind_param("i",$id_user);
   $stmt->execute();
    $result = $stmt->get_result();
   $row = $result->fetch_array(MYSQLI_ASSOC);
   
   return $row;

}

?>
<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
$connection=  connectDB();
$visited=$_POST['visited'];

//$sess_usr=$_SESSION['id'];
$id_user=1;
$sess_usr=12;

$row=profile($connection, $visited);

echo '<user>';
echo '<f_name>';
echo $row['firstName'];
echo '</f_name>';
echo '<l_name>';
echo $row['lastName'];
echo '</l_name>';
echo '<score>';
echo $row['score'];
echo '</score>';
echo '<followed>';
echo $row['followed'];
echo '</followed>';
echo '<following>';
echo $row['following'];
echo '</following>';
echo '<battles>';
echo $row['battles'];
echo '</battles>';
echo '</user>';



