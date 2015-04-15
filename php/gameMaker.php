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
else if($params[0] == 'save'){//save player's answer to the database
if($params[1] !== NULL){//params[1] is the answer 
        $question = GameMaker::saveResponse(Array('link'=>$link,'response'=>$params[1]));
        echo "save success";
      }
}else if($params[0] == 'winner'){//get the winner id

    $winner = GameMaker::theWinerIS(Array('link'=>$link));
    if ($winner == 1) {
        if (GameMAker::getSessionPlayerId() == 1) {
            echo "you win";
        }
        echo "you lose";    
    }else if ($winner == 2) {
        if (GameMAker::getSessionPlayerId() == 2) {
            echo "you win";
        }
        echo "you lose";    
    }else{
        echo "withdraw";    
    }
}


?>