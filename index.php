<?php
/*
*This  is file should be locked.
*you can only add routes to the $routes array, don't change anything else
*if you want to change somehting in the theme consider visiting php/theme_header and php/theme_footer
*/
	session_start();
	$isIndex=true;
	require_once('./php/functions.php');
	require_once('./php/config.php');
	require_once('./php/database.php');
	require_once('./php/database.class.php');
	$routes = array('home',
                    'profile',
                    'go',
                    'game',
                    'signup',
					'signin',
                    'signout');
	$requestURI = explode('/',$_SERVER['REQUEST_URI']);
	$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

	for($i= 0;$i < sizeof($scriptName);$i++){
		if($requestURI[$i] == $scriptName[$i]){
			unset($requestURI[$i]);
		}
	}
	$requestURI = array_values($requestURI);
	@$action = $requestURI[0];
	$params = array_slice($requestURI,1);

	if(empty($action)){
		$action = "home";
	}
?>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="/img/icon.png">
    <title>Game For King</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap-social.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--[if lt IE 9]>
	<script src="/js/html5shiv.min.js"></script>
	<script src="/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
<?php if($action=="profile"){ ?>
    <link rel="stylesheet" href="/css/profile-style.css">
<?php }else if($action=="go"){ ?>
    <link rel="stylesheet" href="/css/go-style.css">
    <script type="text/javascript" src="/js/go.js"></script>
<?php }else if($action=="game"){ ?>
    <script type="text/javascript" src="/js/game.js"></script>
<?php } ?>
  </head>
<body class="bg-color" style='margin-top:0;margin-left:0;margin-right:0;'>

	<?php
	if(in_array($action,$routes)){
		require_once("./php/theme_header.php");
		require_once("./php/".$action.".php");
		require_once("./php/theme_footer.php");
	}
	else{
		require_once("./php/error.php");
	}
	?>

</body>
</html>
