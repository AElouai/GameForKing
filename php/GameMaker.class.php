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
        if(!$link->errno){//gotta remvoe it from session too..
            unset($_SESSION['queueId']);
        }
    }
    public static function allocateBattle($input){
        //player1
        $user_id = User::getUserId();
        $user_queueId = GameMaker::getQueueId();
        //player2
        $user2_Id = $input['userId'];
        $user2_queueId = $input['queueId'];
        //subject
        $subject_Id = $input['subjectId'];
        //db link
        $link = $input['link'];
        //ofc the player shouldn't be playing,i think it unecessary but let's leave it here for now.
        if(!User::isPlaying(Array('link'=>$link)) && !empty($user_queueId)){
            //remove both players from the queue
            $link->query("DELETE FROM queue WHERE idUser IN ($user_id,$user2_Id)");
            //change both players status to isPlaying = true
            $link->query("UPDATE users SET isPlaying=true WHERE id IN ($user_id,$user2_Id)");
            //all is good now let's actually create a battle.
            $link->query("INSERT INTO battles(idPlayer1,idPlayer2) VALUES('$user_queueId','$user2_queueId')");
            //battle created, let's create games (each battle 3 or 5 games ?)
        }
        return false;
    }
    private static function scoreDistance($score1,$score2){
        return abs($score1-$score2);
    }
    public static function findOpponent($input){
        $user_id = User::getUserId();
        $link = $input['link'];

        //the result will contain queueid and subjectid of other players that are searching for a game
        $result = $link->query("SELECT idQueue,idUser,idSubject FROM queue,users,queuedetail WHERE(users.isPlaying=false AND queue.id=queuedetail.idQueue AND users.id=queue.idUser AND users.id!='$user_id' AND ( queuedetail.idSubject IN (select idSubject FROM queue,users,queuedetail WHERE ( users.isPlaying=false AND queue.id=queuedetail.idQueue AND users.id=queue.idUser AND users.id='$user_id') ) OR queuedetail.idSubject=0 ) )");

        //i don't know if we do need to check if the player is playing. because the queueId is still there,
        //it must be that he didn't find a battle just yet. so i guess it's unecessary to check if the other player !isPlaying

        //now we need to get matchmaking fair, so we need to check each player's score
        //basically min(abs(distance(scoreplayer1,scoreplayer2)))
        //this better be like
        if(!$result->num_rows){
            return 0;
        }
        $row = $result->fetch_assoc();
        $min_score_distance = GameMaker::scoreDistance(User::getScore(Array('link'=>$link,'userId'=>$row['idUser'])),User::getScore(Array('link'=>$link)));
        //now let's get the queueId and the subjectId
        $userId = $row['idUser'];
        $queueId = $row['idQueue'];
        $subjectId = $row['idSubject'];

        while($row = $result->fetch_assoc()){
            $current_distance = GameMaker::scoreDistance(User::getScore(Array('link'=>$link,'userId'=>$row['idPlayer'])),User::getScore(Array('link'=>$link)));
            if($current_distance < $min_score_distance){
                $min_score_distance = $current_distance;
                $userId = $row['idUser'];
                $queueId = $row['idQueue'];
                $subjectId = $row['idSubject'];
            }
        }

        //we now have the closest two players considering their score
        //allocate the damn match already! :D
        return GameMaker::allocateBattle(Array('link'=>$link,'userId'=>$userId,'queueId'=>$queueId,'subjectId'=>$subjectId));
    }
}

?>