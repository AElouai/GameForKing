<?php if(!isset($isIndex))die('');
require_once('./php/GameMaker.class.php');
if($params[0] == 'queue'){//player started search
    if(GameMaker::queue(Array('link'=>$link,'subjects'=>$_POST['subjects']))){
        echo "success";
    }
    else{
        setAlert('danger','could not queue for a game!');
        echo "error";
    }
}
else if($params[0] == 'unqueue'){
    GameMaker::unqueue(Array('link'=>$link));
    echo "unqueued";
}
else if($params[0] == 'status'){//fetching status to play
    if(!empty(GameMaker::getQueueId())){
        if(!User::isPlaying(Array('link'=>$link))){
            if(GameMaker::findOpponent(Array('link'=>$link))){//okey we found an oponent
                echo "opponentFound";
            }else{
                echo "opponentNotFound";
            }
        }else{//player already playing
            GameMaker::BattleInit(Array('link'=>$link));
            echo "inGame";
        }
    }else{//something is up..? (mostly occurs when player is not in the queue and requesting /GameMaker/status
        echo "errorOccured";
    }
}
else if($params[0] == 'fetch'){//fetch the question @params[2]
    if($params[1] == 'question'){
        $question = GameMaker::fetchQuestion(Array('link'=>$link,'question'=>$params[2]));
        echo json_encode($question);
    }
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
