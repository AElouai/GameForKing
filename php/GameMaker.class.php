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
    public static function search($input){// random search
        $user_id = User::getUserId();
        $subjects = explode(',',$input['subjects']);
        /*$stmt = $input['link']->stmt_init();
        $stmt = mysqli_prepare($input['link'], "select userId from queue where  ");
        $stmt->bind_param();*/ //this is to use when search is by field
        $link = $input['link'];
        $result = $link->query("select userId from queue ORDER BY DESC queueDate LIMIT 1");
        $res = $result->num_rows;
        if($res){

        }else{
            
        }
    }
}

?>