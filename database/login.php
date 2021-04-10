<?php 

	session_start();

	require 'koneksi.php';
	require 'function.php';

	//Cek Cookie
	if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
		
		$key = $_COOKIE['key'];
		$cookId = $_COOKIE['id'];

		//ambil data username berdasarkan id
		$result = mysqli_query($conn,"SELECT username FROM tb_user WHERE id = '$cookId'");
		$row = mysqli_fetch_assoc($result);

		if ( $key === hash('gost', $row['username']) ) {
			$_SESSION['login'] = true;
		}

	}

	if (isset($_SESSION['login'])) {
		header("location: index.php");
	}

	if (isset($_POST['login'])) {
		
		login();

	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="textdeconone.css">
</head>
<body>
	<h2>Login</h2>
	<form method="post">
	<ul>
		<li>
			<label for="username">Username : </label>
			<input type="text" name="username" id="username" required >
		</li>
		<li>
			<label for="password">Password : </label>
			<input type="password" name="password" id="password" required autocomplete="off">
		</li>
		<li>
			<input type="checkbox" name="remember" id="remember" >
			<label for="remember"> Remember Me</label>
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
	</form>

	<a href="regster.php">Dont Have Account?</a>
</body>
</html>