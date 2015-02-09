<?php

function Redirect($location)
{
	echo "<script type='text/javascript'>setTimeout(function(){window.location='".$location."';},0);</script>";
	echo "<a href='".$location."'><p>si vous etes pas rediriger cliquer ici</p></a>";
}


?>
