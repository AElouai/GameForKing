<?php

$link=mysql_connect("localhost","root",""); 
if(!$link)
{
die('Connexion Error'.mysql_error());
}

$Db_Select=mysql_select_db('gameforking',$link);  

if(!$Db_Select)
{
die('Data Base not found'.mysql_error());
}
 
?>
<html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flatro Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div class="header_top">
	<div class="container">
	
	
         <div class="cssmenu">
			<ul>
			    <li class="active"><a href="index.php"><img src="images/logout.png"></a></li> 
			</ul>
		 </div>
	</div>
</div>	
<div class="wrap-box"></div>
<div class="header_bottom">
	    <div class="container">
			<div class="col-xs-9 header-bottom-left">
				<div class="col-xs-2 logo">
					<h1><img src="images/gflogo.jpg"></h1>
				</div>
				<div class="col-xs-7 menu">
		            <ul class="megamenu skyblue">
				      <li class="active grid"><a class="color1" href="index.html">We</a><div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
							
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
					
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
							
						
								</div>												
							</div>
						  </div>
						</div>
					</li>
				    <li class="grid"><a class="color2" href="#">Can</a>
					  <div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
						
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
						
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
				
						
								</div>												
							</div>
						  </div>
						</div>
			    </li>
				<li><a class="color4" href="about.html">Put</a></li>				
				<li><a class="color5" href="404.html">Something</a></li>
				<li><a class="color6" href="contact.html">Here</a></li>
			  </ul> 
			</div>
		</div>
	   
							
					      
						</ul>
					 </li>
		      </ul>
              
             <div class="clearfix"></div>
          </div>
        <div class="clearfix"></div>
	 </div>
</div>


   
    <div>
	
	<center>
	  <img src="img/default-444.jpg">
	  <table border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="white">
	    <tr height="50">
                <td width="100"><b>First Name: </b></td>
                <td width="100" align="left"><?php
				 $sql = " SELECT * FROM `users` WHERE login='test' ";
                 $req=mysql_query($sql) or die('SQL Error'.$sql.mysql_error() );
				 $data = mysql_fetch_array($req) ;
				   echo $data['firstName'] ;
	   				  
				?></td>
            </tr>
            <tr height="50">
                <td><b>Last Name:</b> </td>
                <td align="left"><?php
				 echo $data['lastName'] ;
				?></td>
                
            </tr>
			   <tr height="50">
                <td><b>Username:</b></td>
                <td>haikei00X</td>
                
            </tr>  
            <tr height="50">
                <td><b>Joigned on:</b> </td>
                <td align="left"><?php
				 echo $data['creation_date'] ;
				?></td>
            </tr>
			  <tr height="50">
                <td><b>Fuid:</b> </td>
                <td align="left"><?php
				 echo $data['Fuid'] ;
				?></td>	
            </tr>
			  <tr height="50">
                <td><b>Email:</b> </td>
                <td align="left"><?php
				 echo $data['email'] ;
				?></td>
            </tr>
			  <tr height="50">
                <td><b>Total Score:</b> </td>
                <td align="left"><?php
				 echo $data['total_score'] ;
				?></td>
            </tr>
			  <tr height="50">
                <td><b>Week Score:</b> </td>
                <td align="left"><?php
				echo $data['week_score'] ;
				?></td>
            </tr>
			
           
	  </table>
	</center>
	
	</div>
         <?php
		   mysql_free_result ($req);
           mysql_close ();
		  ?>
</body>
</html>		