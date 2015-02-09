	<div class="container">
		<div class="row">
		  <div class="col-md-1">PUB</div>
		  <div class="col-md-10">
		  	<div class="row">
			  <div class="col-md-6 center-block" ><!--Conexion avec email -->
			  	<form action="inc/creat_user.php" method="post">
			  	  <div class="form-group">
				    <label for="psoeudo">User Psoeudo</label>
				    <input type="text" class="form-control" id="psoeudo" placeholder="Enter Psoeudo" required>
				  </div>
			  	  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
				  </div>
				  <input class="center-block" type="submit" value="Creat a Count"/>
			  	</form>
			  </div>
			  <div class="col-md-6"><!--Conexion avec facebook tewitter gmail -->
			  	<div class="row">
			  			<a href="inc/log_facebook.php"><img src="img/facebook_login.png"> </a>
			  	</div>
			  	<div class="row">
			  			<a href="inc/log_twitter.php"><img src="img/google_login.png"></a>
			  	</div>
			  	<div class="row">
			  			<a href="inc/log_google.php"><img src="img/twitter_login.png"></a>
			  	</div>
			  </div>
			</div>
		  </div>
		  <div class="col-md-1">PUB</div>
		</div>
	</div>