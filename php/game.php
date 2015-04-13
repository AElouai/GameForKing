<?php
if(!isset($isIndex))die('');
require_once('./php/GameMaker.class.php');
$subjects = empty($_POST['selected'])?'0':$_POST['selected'];//TODO clean $subjects
if(User::isPlaying(Array('link'=>$link))){
    GameMaker::unqueue(Array('link'=>$link));
    $link->query("UPDATE users SET isPlaying=false where id='".User::getUserId()."'");
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        var subs = '<?php echo $subjects; ?>';
        var go = new GameOn({
            subjects:subs,
            delay:5000
        });
        window.addEventListener("beforeunload", function(event) {
            event.returnValue = "do you really want to leave ?";
        });
        window.addEventListener("unload", function(event) {
            //i know it's ugly.. couldn't do it otherwise. sight
            //it's because other functions will not work
            //this works because it will be called async
            $.ajax({
                async: false,
                url:'/gameMaker/unqueue'
            });
        });

        go.init();
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-3 col-md-2 player" id="player1">
            <img src="/profile-pictures/default-0.jpg">
            <p>Gameforking guy</p>
            <div class="progress">
                <div class="progress-bar progress-bar-success right"></div>
                <div class="progress-bar progress-bar-danger wrong"></div>
            </div>
        </div>
        <div class="col-xs-6 col-md-8" id="gameContainer">
            <div id='gameWrapper'>
                <div id="game"></div>
                <div class="progress progress-striped active" id="timer">
                    <div class="progress-bar" style="width: 45%"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-3 col-md-2 player" id="player2">
            <img src="/profile-pictures/default-1.jpg">
            <p>Somebody else</p>
            <div class="progress">
                <div class="progress-bar progress-bar-success right"></div>
                <div class="progress-bar progress-bar-danger wrong"></div>
            </div>
        </div>
    </div>

</div>