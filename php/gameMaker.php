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

        }
    }
}

?>