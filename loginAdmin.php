<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" type="image/png" href="ico/favicon1.png">
</head>
<body>
  <div class="header">
  	<h2>Login Admin</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
		<p> <a href="login.php"> Login Customers </a></p>
  </form>
</body>
</html>