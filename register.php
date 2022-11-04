<?php 
require 'functions.php';

if(isset($_POST['register'])){

	if(registrasi($_POST) > 0){
		echo "<script>
					alert('User baru berhasil ditambahkan');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<form action="" method="post">
	<div class="login">
		<h2>Sign Up</h2>
		<div class="input-group">
			<input type="text" name="username" required="">
			<span>Username</span>
			<i class="fas fa-envelope"></i>
		</div>
		<div class="input-group">
			<input type="password" name="password" required="" id="Show">
			<span>Password</span>
			<i class="fas fa-lock"></i>
		</div>
		<div class="input-group">
			<input type="password" name="repass" required="" id="Show">
			<span>Re-Password</span>
			<i class="fas fa-lock"></i>
		</div>
			<div class="input-group">
				<input type="submit" name = "register" value="Register">
				<p>If you have account <a href="login.php">Login</a></p>
			</div>
		</div>
	</div>
</form>
</body>
</html>