<?php

require_once('./php/User.class.php');

class GameMaker{
    public static function queue($input){//TODO when at refactoring phase, this should be done with mysql procedure
        $user_id = User::getUserId();
        $link = $input['link'];
        $subjects = explode(',',$input['subjects']);
        $link->query("delete * from queue where userId='$user_id'");//clear history queue
        $link->query("insert into queue(userId,queueDate) VALUES($user_id,CURDATE())");

        $queueId = $link->insert_id;
        foreach($subjects as $subject){
            $link->query("insert into queuedetail(idQueue,idSubject) VALUES($queueId,$subject)");
        }

        if($link->connect_errno){
            return false;
        }

        $_SESSION['queueId']=$queueId;
        return true;
    }
}

?>