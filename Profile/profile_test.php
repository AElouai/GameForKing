
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   
    <title>Profile overview - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="script2.js" ></script>
</head>
<body onload="test_url()">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container">
    <div class="col-md-12">
        <div class="profile-container">
            <div class="profile-header row">
                <div class="col-md-4 col-sm-12 text-center">
                    <img src="dakota.jpg" alt="" class="header-avatar">
                </div>
                <div class="col-md-8 col-sm-12 profile-info">
                    <div class="header-fullname" id="fl_name"></div>
                   
                    <button class="btn btn-palegreen btn-sm btn-follow" onclick="follow()" id="follow"><span class="glyphicon glyphicon-hand-right"></span> Follow me</button>
                    
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 profile-stats">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 stats-col">
                            <div class="stats-value pink" id="following"></div>
                            <div class="stats-title">FOLLOWING</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 stats-col">
                            <div class="stats-value pink" id="followers"></div>
                            <div class="stats-title">FOLLOWERS</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 stats-col">
                            <div class="stats-value pink" id="battles"></div>
                            <div class="stats-title">BATTLES</div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col" style="background:#33CC33">
                            <i class="glyphicon glyphicon-map-marker"></i> Boston
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col" style="background:#2E8AE6">
                            Rate: <strong></strong>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 inlinestats-col"  style="background:#E65CB8" id="score" >
                            Score: <strong>2</strong>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>


</body>
</html>
