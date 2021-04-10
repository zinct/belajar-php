<!DOCTYPE html>
<?php 

	include 'function.php';

	//Jika Tombol Ditekan maka akan Lanjut Ke Function Register
	if (isset($_POST['button'])) {
		//Jika Function Bernilai True Atau Satu maka kode ini akan dijalankan
		if (register($_POST) > 0) {
			echo "<script>
					alert('Data User Berhasil Dibuat');
				  </script>";

				  header('location: login.php');
		}

		//jika function bernilai false atau nol maka kode ini akan dijalankan--
		else {
			echo "Gagal Membuat Akun <br>";
		}


	}

?>

<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		input {
			display: block;
		}
		li {
			list-style-type: none;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<h1>Form Register</h1>
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
				<label for="password2">Konfirmasi Password : </label>
				<input type="password" name="password2" id="password2" required>
			</li>
			<li>
				<button type="submit" name="button">Sign Up</button>
				<button><a href="login.php">Login</a></button>
			</li>
		</ul>
	</form>
</body>
</html>