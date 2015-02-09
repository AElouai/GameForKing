<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Game For King</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
	      <form class="navbar-form navbar-right" action="./inc/ver.php" method="post">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Psoudo" id="cpsoudo" name="cpsoudo"  required>
	          <input type="text" class="form-control" placeholder="PassWord" id="cpassword" name="cpassword" required>
	        </div>
	        <input type="submit" class="btn btn-default" value="LogIn"/>
	      </form>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
</nav>