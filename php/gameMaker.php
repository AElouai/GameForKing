<?php if(!isset($isIndex))die('');
require_once('./php/GameMaker.class.php');
//i commented your code so if you want bacj=k you find it
/*if($params[0] == 'queue'){//player started search
    if(GameMaker::queue(Array('link'=>$link,'subjects'=>$_POST['subjects']))){
        echo "success";
    }
    else{
        setAlert('danger','could not queue for a game!');
        echo "error";
    }
}
else if($params[0] == 'status'){//fetching status to play
    echo "hey";
}
*/
//need to be more carful about this $_POST['selected']
//$subjects = $_POST['selected'];//TODO clean $subjects
$subjects = explode(',',$_POST['selected']);
$res = GameMaker::search_random($link);//all the game are random for know
if($res){
        if ($res == -1) {
           setAlert('success','you are in queue for a game!');
        }
    setAlert('success','Game is ON lets play');
    $player1_FullName = User::getFullName();
    
    }
    else{
        setAlert('danger','connection field try later');
    } 
?>