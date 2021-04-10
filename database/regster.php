<?php 

	require 'koneksi.php';
	require 'function.php';

	session_start();

	if (isset($_SESSION['login'])) {
		header("location: index.php");
	}

	if (isset($_POST['register'])) {
		if (register() > 0) {
			echo "<script>
					alert('Account Has Been Created');
					window.location.href = 'login.php';
			 	  </script>";
			// header('location: login.php');
		}
		else {
			mysqli_error($conn);
		}
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="textdeconone.css">
</head>
<body>
	<h2>Register</h2>
	<form method="post">
	<ul>
		<li>
			<label for="username">Username : </label>
			<input type="text" name="username" id="username" required>
		</li>
		<li>
			<label for="password">Password : </label>
			<input type="password" name="password" id="password" required>
		</li>
		<li>
			<label for="password2">Confirm Password : </label>
			<input type="password" name="password2" id="password2" required>
		</li>
		<li>
			<button type="submit" name="register">Register</button>
		</li>
	</ul>
	</form>
	<a href="login.php">Already have account?</a>
</body>
</html>