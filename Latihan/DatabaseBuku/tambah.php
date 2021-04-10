<?php 
	session_start();

	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
		exit;
	}
	
	require 'function.php';

	//Cek Apakah tombol submit sudah di tekan atau belum
	if (isset($_POST['submit'])) {
		//Jika Sudak Maka Lanjutkan Ke Pengisian Data
		if (tambah($_POST) > 0) { ?>
			<script type="text/javascript">
				alert("Data Berhasil Ditambah");
				window.location.href = "index.php";
			</script>
		<?php }
		else {
			echo "Gagal Menambah Data <br>";
			echo mysqli_error($conn);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>tambah</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table class="tambah">
		<caption><h2>tambah data</h2></caption>
		<form method="post">
			<tr>
				<td><label for="nama">nama : </label></td>
				<td><input type="text" name="nama" id="nama" required></td>
			</tr>
			<tr>
				<td><label for="jenis">jenis : </label></td>
				<td><input type="text" name="jenis" id="jenis" required></td>
			</tr>
			<tr>
				<td><label for="penerbit">penerbit : </label></td>
				<td><input type="text" name="penerbit" id="penerbit" required></td>
			</tr>
			<tr>
				<td><label for="tahun">tahun : </label></td>
				<td><input type="text" name="tahun" id="tahun" required></td>
			</tr>
			<tr>
				<td><button type="submit" name="submit">Tambah</button></td>
		</form>
				<td><button type="submit"><a href="index.php">Kembali</a></button></td>
			</tr>
	</table>
</body>
</html>