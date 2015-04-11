<?php
require_once('./php/User.class.php');

class GameMaker{
    public static function queue($input){//TODO when at refactoring phase, this should be done with mysql procedure
        $user_id = User::getUserId();
        $link = $input['link'];
        $subjects = explode(',',$input['subjects']);
        $link->query("delete from queue where userId='$user_id'");//clear history queue
        $link->query("insert into queue(userId) VALUES($user_id)");

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

    public static function search_random($link){// random search
        $user_id = User::getUserId();
        $find = "select userId from queue where userId !=".$user_id." ORDER BY queueDate DESC LIMIT 1";
        $vs = 'delete from queue where userId=?';
        $btl = 'insert into battle(player1,player2,status) VALUES(?,?,?)';
        $wait = 'insert into queue(userId,random) VALUES(?,?)';//1 random -0 chose item
        $result = $link->query($find);
        echo $link->error;
        $res = $result->num_rows;
        
        if($res){
            $status = 0 ;//0 stand for Game_enprogresse  -1 for ending game 
            $row = $result->fetch_assoc();
            $rech = $link->stmt_init();
            if (!$rech->prepare($vs)) {
                $error = $rech->error;//for debug only
                //return $error;//for debug only
            }
            $rech->bind_param('i', $row["userId"]);
            $play = $link->stmt_init();
            if (!$play->prepare($btl)) {
                $error = $play->error;
                //return $error;
            }
            $play->bind_param('iii',$user_id, $row["userId"],$status);
            
            $link->autocommit(false);

            $rech->execute();
            if (!$link->affected_rows) {
                $link->rollback();
                $error = "failed: Couldn't delete user_id from queue";
            } else {
                $play->execute();
                if (!$link->affected_rows) {
                    $link->rollback();
                    $error = "failed: Couldn't insert player2 and player1 to a game";
                } else {
                    $link->commit();
                    return $play->insert_id;
                }
            }
        }
        $standby = $link->stmt_init();
        $standby->prepare($wait);
        $random = 1;//1 random game 
        $standby->bind_param('ii', $user_id,$random);
        $standby->execute();
        if ($standby->insert_id) {
            return "-1";//-1 mean he is in waiting list
        }
        return NULL;//connection field 
    }
}

?>