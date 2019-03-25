<?php
include_once "Controllers/userController.php";

if(isset($_POST["buttonlog"]))
{
	
	$errormsg = Login($_POST["namelog"],$_POST["passwordlog"]);
	
	
}

?>
<script>alert(<?php $errormsg; ?>);</script>
<br>
<section class="container">
		<div class="main-wrapper jumbotron text-center">
		<br>
		<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
	  <h2>Registration:</h2>
			<form action="includes/signupphp.php" method="POST" class="signup-form text-center">
				<input type="text" class="form-control" name="name" placeholder="Username"><br>
				<input type="text" class="form-control" name="email" placeholder="Email"><br>
				<input type="password" class="form-control" name="password" placeholder="Password"><br>
				<input type="password" class="form-control" name="passwordagain" placeholder="Password again"><br>
				<button class="btn btn-primary" name="button">Sign up</button>
				</form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
	  <h2>Login:</h2>
	  <form action="Controllers/userController.php" method="POST" class="signup-form text-center">
		<input type="text" class="form-control" name="namelog" placeholder="Username"><br>
		<input type="password" class="form-control" name="passwordlog" placeholder="Password "><br>
		<button class="btn btn-primary" name="buttonlog">Log in</button>
		</form>
      </div>
    </div>
  </div>
</div>
</div>
</section>