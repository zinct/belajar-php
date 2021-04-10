<?php 

	session_start();

	if (isset($_SESSION['login'])) {
		header('Location: index.php');
		exit;
	}

	require 'function.php';

	//Jika Tombol login ditekan maka akan lanjut ke proses logical
	if (isset($_POST['login'])) {
		
		//ubah yang sudah kita ketik di field username edan password lalu ubah ke variabel
		$username = $_POST['username'];
		$password = $_POST['password'];

		//query data dari tabel user
		//coba carikan dari semua attribut dari tabel user yang username nya seperti yang sudah diketik
		$result = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$username'");

		// var_dump($result);		

		// var_dump($row);

		//Jika nilai yang dihasilkan dari query adalah 1 maka lanjut ke verifikasi password
		if (mysqli_num_rows($result) == 1) {

			$row = mysqli_fetch_row($result);

			if (password_verify($password, $row[2])) {

			$_SESSION['login'] = true;

			header('Location: index.php');
			exit;
			
			}

			else {
				$passError = true;
			}

		}
		else {
			$userError = true;
		}
	}

?>

<html>
<head>
	<title>Halaman Login</title>
	<style>
		input {
			display: block;
		}
		li {
			list-style-type: none;
			margin-bottom: 10px;
		}
		text {
			color: red;
		}
	</style>
</head>
<body>
	<h1>Form Login</h1>
	<form method="post">
		<ul>
			<li>
				<?php if (isset($passError)) {
					echo "<text>Password Salah</text>";
				} 
			elseif (isset($userError)) {
					echo "<text>Username Tidak Ditemukan</text>";
			}

				?>
			</li>
			<li>
				<label for="username">Username : </label>
				<input type="text" name="username" id="username" required>
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="password" name="password" id="password" required>
				
			</li>
			<li>
				<button type="submit" name="login">Login</button>
				<button><a href="register.php">Register</a></button>
			</li>
		</ul>
	</form>
</body>
</html>