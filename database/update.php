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
	$id = $_GET['id'];

	if (isset($_POST['ubah'])) {
		if (update($id) > 0) {
			echo "<script>
				alert('berhasil Mengubah');
				window.location.href = 'index.php';
			 </script>";
		}
		else {
			echo mysqli_error($conn);
		}
	}

	$siswa = query("SELECT * FROM tb_siswa WHERE id = '$id' ")[0];


 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="textdeconone.css">
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="gambarLama" required value="<?= $siswa['gambar']; ?>">
				<label for="nama">Name : </label>
				<input type="text" name="nama" id="nama" required value="<?= $siswa['nama']; ?>">
			</li>
			<li>
				<label for="gambar">Images : </label>
				<input type="file" name="gambar" id="gambar"> <br>
				<img height="100" src="gambar/<?= $siswa['gambar']; ?>">
			</li>
			<li>
				<label for="jurusan">Major : </label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $siswa['jurusan']; ?>">
			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required value="<?= $siswa['email']; ?>">
			</li>
			<li>
				<label for="negara">Country : </label>
				<input type="text" name="negara" id="negara" required value="<?= $siswa['negara']; ?>">
			</li>
			<li>
				<button type="submit" name="ubah">Update</button>
			</form>
			</li>
		</ul>
			<a href="index.php">Back</a>
</body>
</html>