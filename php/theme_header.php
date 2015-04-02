<?php
if(!isset($isIndex))die('');
?>
<div id="connexion">
	<div>
		<!-- Nav tabs -->
	  <ul class="nav nav-tabs">
	    <li><a href="#" id="signin">Sign In</a></li>
	    <li><a href="#" id="signup">Sign Up</a></li>
	  </ul>
		<!-- Tab panes -->
		  <div class="tab-content">
				<!-- Sign in -->
		    <div id="signin_content">
					<form class="form-inline">
						<fieldset>
						<!-- Form Name -->
						<legend>Login</legend>
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="email">Email</label>
						  <div class="col-md-4">
						  <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">
						  </div>
						</div>
						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="password">Password</label>
						  <div class="col-md-4">
						    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
						  </div>
						</div>
						<button id="singlebutton" name="singlebutton" class="btn btn-primary">SignIn</button>
					</fieldset>
					</form>
				</div>
				<!-- Sign up -->
		    <div id="signup_content">
					<form class="form-inline">
						<fieldset>
						<!-- Form Name -->
						<legend>Sign Up</legend>
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="email">Email</label>
						  <div class="col-md-4">
						  <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">
						  </div>
						</div>
						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="password">Password</label>
						  <div class="col-md-4">
						    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
						  </div>
						</div>
						<!-- RE Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="password2">Confirm password</label>
						  <div class="col-md-4">
						    <input id="password2" name="password2" type="password" placeholder="Confirm password" class="form-control input-md" required="">
						  </div>
						</div>
						<button id="singlebutton" name="singlebutton" class="btn btn-primary">SignUp</button>
						</fieldset>
					</form>
				</div>
		  </div>
	</div>
</div>
<div id='content'>
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
<<<<<<< HEAD
			<a href="/home/" class="brand">
				<img src="images/logo.png" width="120" height="40" alt="Logo" />
=======
			<a href="#" class="brand">
				<img src="/images/logo.png" width="120" height="40" alt="Logo" />
>>>>>>> 830ff9ade3c1217049b8028f8fcf9d4674659549
				<!-- This is website logo -->
			</a>
			<!-- Navigation button, visible on small resolution -->
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-menu"></i>
			</button>
			<!-- Main navigation -->
				<div class="nav-collapse collapse pull-right">
					<ul class="nav" id="top-navigation">
<<<<<<< HEAD
						<li class="active"><a href="#">Ranting</a></li>
						<li class="active"><a href="#">WK-Score</a></li>
						<li><a href="#service"><img src="/images/profile/images.jpg"></a></li>
=======
						<li><a href="/home">Home</a></li>
						<li><a id="con_modal" href="#">Connexion</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Contact</a></li>
>>>>>>> 830ff9ade3c1217049b8028f8fcf9d4674659549
					</ul>
				</div>
			<!-- End main navigation -->
		</div>
	</div>
</div>
