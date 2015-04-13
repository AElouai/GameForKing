<?php
if(!isset($isIndex))die('');
printAlert();//let's print alerts
?>
	<div class="modal fade" id="connexion">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Connection</h4>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#signin" data-toggle="tab">Sign in</a></li>
						<li><a href="#signup" data-toggle="tab">Sign up</a></li>
					</ul>
					<div id="tabContent" class="tab-content">
						<div class="tab-pane fade active in" id="signin">
							<form class="form-horizontal" action="/signin" method="POST">
								<fieldset>
									<legend>Sign In</legend>
									<a href="/" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
									<a href="/" class="btn btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i> Sign in with Google+</a>
									<hr>
									<div class="form-group">
										<label for="si-inputEmail" class="col-lg-2 control-label">Email</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="email" id="si-inputEmail" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<label for="si-inputPassword" class="col-lg-2 control-label">Password</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" name="password" id="si-inputPassword" placeholder="Password">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="remember">Remember me
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div>
											<button type="submit" class="btn btn-primary s-btn">Sign In</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						<div class="tab-pane fade" id="signup">
							<form class="form-horizontal" action="/signup" method="POST">
								<fieldset>
									<legend>Sign Up</legend>
									<a href="/" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Sign up with Facebook</a>
									<a href="/" class="btn btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i> Sign up with Google+</a>
									<hr>
									<div class="form-group">
										<label for="su-inputEmail" class="col-lg-2 control-label">Email</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="email" id="su-inputEmail" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<label for="su-inputPassword" class="col-lg-2 control-label">Password</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" name="password" id="su-inputPassword" placeholder="Password">
										</div>
									</div>
									<div class="form-group">
										<label for="su-inputPassword2" class="col-lg-2 control-label">Confirm Password</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" name="password2" id="su-inputPassword2" placeholder="Confirm Password">
										</div>
									</div>
									<div class="form-group">
										<div>
											<button type="submit" class="btn btn-primary s-btn">Sign Up</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container-fluid container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/"><img src="/img/logo-g4k.png"></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
				<ul class="nav navbar-nav">
					<?php if(User::isConnected()){ ?>
					<li class="active"><a href="/go">Play</a></li>
					<?php } ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if(User::isConnected()){ ?>
						<div id='profile'>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<div id='profile-img'>
									<img src='/profile-pictures/default-4.jpg'>
								</div>
							</a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="/profile/edit"><i class="fa fa-pencil"></i>Edit Profile</a></li>
		            <li><a href="/profile/view"><i class="fa fa-eye"></i>View Profile</a></li>
		            <li class="divider"></li>
		            <li><a href="/signout"><i class='fa fa-sign-out'></i>Logout</a></li>
		          </ul>
						</div>
					<?php } else{ ?>
					<li><a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#connexion">
						<i class="fa fa-sign-in"></i>Connection</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid container" >
