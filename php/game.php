<?php
if(!isset($isIndex))die('');
$subjects = empty($_POST['selected'])?'0':$_POST['selected'];//TODO clean $subjects

?>
<script type="text/javascript">
    $(document).ready(function(){
        var subs = '<?php echo $subjects; ?>';
        var go = new GameOn({
            subjects:subs,
            delay:5000
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