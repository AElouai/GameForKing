<?php
	session_start();
	$isIndex=true;
	define('G4K_ROOT',substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')));
	require_once('./php/functions.php');
	require_once('./php/config.php');
	$routes = array('home',
					'start',
					'login',
					'logout');
	$requestURI = explode('/',$_SERVER['REQUEST_URI']);
	$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

	for($i= 0;$i < sizeof($scriptName);$i++)
	{
		if($requestURI[$i] == $scriptName[$i])
		{
			unset($requestURI[$i]);
		}
	}
	$requestURI = array_values($requestURI);
	@$action = $requestURI[0];
	$params = array_slice($requestURI,1);

	if(empty($action))
	{
		$action = "start";
	}
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GameForKing</title>
	<!-- Load Roboto font -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<!-- Load css styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo G4K_ROOT; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo G4K_ROOT; ?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo G4K_ROOT; ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo G4K_ROOT; ?>/css/pluton.css" />
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo G4K_ROOT; ?>/css/pluton-ie7.css" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo G4K_ROOT; ?>/css/jquery.cslider.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo G4K_ROOT; ?>/css/jquery.bxslider.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo G4K_ROOT; ?>/css/animate.css" />
	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo G4K_ROOT; ?>/images/ico/apple-touch-icon-144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo G4K_ROOT; ?>/images/ico/apple-touch-icon-114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo G4K_ROOT; ?>/images/apple-touch-icon-72.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo G4K_ROOT; ?>/images/ico/apple-touch-icon-57.png">
	<link rel="shortcut icon" href="<?php echo G4K_ROOT; ?>/images/ico/favicon.ico">
</head>
<body>

	<?php
	if(in_array($action,$routes))
	{
	if($action === "start")
		require_once("./php/theme_header_Start.php");
	else
		require_once("./php/theme_header.php");
	require_once("./php/".$action.".php");
	require_once("./php/theme_footer.php");
	}
	else
	{
	require_once("./php/error.php");
	}
	?>

</body>
</html>