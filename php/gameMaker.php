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
            GameMaker::sessionPlayerID($link);
            //echo $_SESSION["player"];//just for debug and it work
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
else if($params[0] == 'fetch'){//save player's answer to the database
//ok i got this later 
}

?>