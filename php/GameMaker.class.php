<?php
require_once('./php/User.class.php');

class GameMaker{
    public static function getQueueId(){
        return (isset($_SESSION['queueId']))?$_SESSION['queueId']:'';
    }
    public static function queue($input){//TODO when at refactoring phase, this should be done with mysql procedure
        $user_id = User::getUserId();
        $link = $input['link'];
        $subjects = explode(',',$input['subjects']);
        $link->query("delete from queue where idUser='$user_id'");//clear history queue
        $link->query("insert into queue(idUser) VALUES($user_id)");

        $queueId = $link->insert_id;
        foreach($subjects as $subject){
            $link->query("insert into queuedetail(idQueue,idSubject) VALUES('$queueId','$subject')");
        }
        if($link->errno){
            return false;
        }

        $_SESSION['queueId']=$queueId;
        return true;
    }
    public static function unqueue($input){
        $user_id = User::getUserId();
        $link = $input['link'];
        $link->query("delete from queue where idUser='$user_id'");//remove from queue
    }
    public static function findOpponent($input){
        $user_id = User::getUserId();
        $link = $input['link'];

        $link->query("SELECT idQueue,idSubject FROM queue,users,queuedetail WHERE(users.isPlaying=false AND queue.id=queuedetail.idQueue AND users.id=queue.idUser AND users.id!='$user_id' AND ( queuedetail.idSubject IN (select idSubject FROM queue,users,queuedetail WHERE ( users.isPlaying=false AND queue.id=queuedetail.idQueue AND users.id=queue.idUser AND users.id='$user_id') ) OR queuedetail.idSubject=0 ) )");
        //the result will contain queueid and subjectid of other players that are searching for a game
        
    }
}

?>