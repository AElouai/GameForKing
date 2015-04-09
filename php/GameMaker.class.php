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
    public static function queue_random($input){//TODO when at refactoring phase, this should be done with mysql procedure
        $link = $input['link'];
        $user_id = User::getUserId();//need to make this a global var :D so we can access it from evey where
        $stmt = $link->stmt_init();
        $stmt = mysqli_prepare($link,"insert into queue(userId,random) VALUES(?,?)");
        $stmt->bind_param('ib',$user_id,1);//1 mean random
        return ($stmt->execute()) ? true : false ;
    }
    public static function search($input){// random search
        $user_id = User::getUserId();
        $subjects = explode(',',$input['subjects']);
        /*$stmt = $input['link']->stmt_init();
        $stmt = mysqli_prepare($input['link'], "select userId from queue where  ");
        $stmt->bind_param();*/ //this is to use when search is by field
        $link = $input['link'];
        $result = $link->query("select userId from queue ORDER BY queueDate DESC LIMIT 1");
        $res = $result->num_rows;
        if($res){
            $stmt = $link->stmt_init();
            $stmt = mysqli_prepare($link,"delete from queue where userId=?");
            $stmt->bind_param('i',$result);
            if($stmt->execute()){//nicely execute
                $stmt = mysqli_prepare($link,"insert into battle(player1,player2,status) VALUES(?,?,?)");
                $stmt->bind_param('iib',$user_id,$result,0);
                $stmt->execute();
                return $stmt->insert_id;//he got into a game :D
            }
            return NULL; 
        }else{
            if(GameMaker::queue_random($input)){
                return 0 ;//0 mean he is in waiting list :D 
            }
            return NULL;
        }
    }
}

?>