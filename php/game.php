<?php
if(!isset($isIndex))die('');
echo "you selected ".$_POST['selected'];
?>
<div class="row">
  <div class="col-xs-12 col-md-2 player" id="player1">
    <img src="/profile-pictures/default-0.jpg">
    <p>Gameforking guy</p>
    <div class="progress">
      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
      <div class="progress-bar progress-bar-danger" style="width: 10%"></div>
    </div>
  </div>
  <div class="col-xs-12 col-md-8" id="gameContainer">
    <div id='game'>
    </div>
    <div class="progress progress-striped active" id="timer">
      <div class="progress-bar" style="width: 45%"></div>
    </div>
  </div>
  <div class="col-xs-12 col-md-2 player" id="player2">
    <img src="/profile-pictures/default-1.jpg">
    <p>Somebody else</p>
    <div class="progress">
      <div class="progress-bar progress-bar-success" style="width: 60%"></div>
      <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
    </div>
  </div>
</div>
