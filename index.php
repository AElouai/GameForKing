<?php
/*
*This  is file should be locked.
*you can only add routes to the $routes array, don't change anything else
*if you want to change somehting in the theme consider visiting php/theme_header and php/theme_footer
*/
	session_start();
	$isIndex=true;
	define('G4K_ROOT',substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')));
	require_once('./php/functions.php');
	require_once('./php/config.php');
	$routes = array('home',
								'profile',
								'game',
								'signup	',
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
    <meta charset="utf-8">
    <title>Game For King</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>
<body>

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
