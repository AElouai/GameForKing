<?php
session_start();
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
FacebookSession::setDefaultApplication( '424231481079928','1f06e98ee85812facf31905694cab3ae');
    $helper = new FacebookRedirectLoginHelper('http://105.152.165.166:800/step1/1353/test.php');
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
} catch( Exception $ex ) {
}
if ( isset( $session ) ) {
  $request = new FacebookRequest( $session, 'GET','/me');
  $response = $request->execute();
  $graphObject = $response->getGraphObject();
		$fbid = $graphObject->getProperty('id');       // To Get Facebook ID
 	    $fbuname = $graphObject->getProperty('username'); // To Get Facebook Username
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');   // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;
	    $_SESSION['USERNAME'] = $fbuname;
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    //echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
   
} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
}
?>
