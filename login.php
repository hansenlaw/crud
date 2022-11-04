<?php 
session_start();
require 'functions.php';

// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasar id
	$result = mysqli_query($conn, "SELECT username FROM login WHERE id=$id");
	$isi = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if($key === hash('sha256', $isi['username'])){
		$_SESSION['submit'] = true;
	}
}

if(isset($_SESSION['submit'])){
	header('Location:home.php');
	exit;
}


if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

	// cek username
	if(mysqli_num_rows($result) == 1){

		// cek password
		$isi = mysqli_fetch_assoc($result);
		if (password_verify($password, $isi['password'])){
			// set session
			$_SESSION['submit'] = true;

			// cek remember me
			if(isset($_POST['remember'])){
				// buat cookie
				setcookie('id', $isi['id'], time()+60);
				setcookie('key', hash('sha256', $isi['username']), time()+60);
			}

			header('Location: home.php');
			exit;
		}
	}

	$error = true;

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="legalanalytic.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<form action="" method="post">
	<div class="login">
		<h2>Sign In</h2>
		<div class="input-group">
			<input type="text" name="username" required="">
			<span>Username</span>
			<i class="fas fa-envelope"></i>
		</div>
		<div class="input-group">
			<input type="password" name='password' required="" id="Show">
			<span>Password</span>
			<i class="fas fa-lock"></i>
		</div>
		<?php if(isset($error)) : ?>
		<p class="salah">username / password salah</p>
		<?php endif; ?>
		<div class="bawah">
			<div class="show">
				<input type="checkbox" name="" onclick="myFunction()">
				<label class="Show">Show Password</label><br><br>
				<input type="checkbox" name="remember">
				<label for="remember">Remember me</label>
			</div>
			<div class="input-group">
				<input name='submit' type="submit" value="Login">
			</div>
		</div>

		<script type="text/javascript">
			function myFunction(){
				var show = document.getElementById('Show');
				if (show.type=='password'){
					show.type='text'
				}
				else{
					show.type='password'
				}
			}
		</script>


	</div>
</form>
</body>
</html>