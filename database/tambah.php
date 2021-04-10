<?php 

	require 'koneksi.php';
	require 'function.php';

	session_start();

	if (!isset($_SESSION['login'])) {
		header("location: login.php");
	}


	if (isset($_POST['insert'])) {
		if (insert() > 0) {
			echo "<script>
					alert('Data Has Been Added');
			 	  </script>";
			header('location: index.php');
		}

		else {
		
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
	<form method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Name : </label>
				<input type="text" name="nama" id="nama" required >
			</li>
			<li>
				<label for="gambar">Images : </label>
				<input type="file" name="gambar" id="gambar" >
			</li>
			<li>
				<label for="jurusan">Major : </label>
				<input type="text" name="jurusan" id="jurusan" required>
			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required>
			</li>
			<li>
				<label for="negara">Country : </label>
				<input type="text" name="negara" id="negara" required>
			</li>
			<li>
				<button type="submit" name="insert">Insert</button>
			</form>
			</li>
		</ul>
			<a href="index.php">Back</a>
</body>
</html>