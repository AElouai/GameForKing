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
else if($params[0] == 'status'){//fetching status to play
    echo "hey";
}

?>