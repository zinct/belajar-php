<?php 
	session_start();

	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
		exit;
	}
	
	require 'function.php';

	//Ambil id dari url lalu masukan ke variabel id
	$id = $_GET['id'];

	//Tampilkan Semua Data untuk Dimasukan ke value menggunakan query lalu masukan ke variabel buku
	//Gunakan query yang ada di function query
	$b = query("SELECT * FROM tb_buku WHERE id = $id")[0];

	//Cek Apakah tombol submit sudah di tekan atau belum
	if (isset($_POST['submit'])) {
		//Jika Sudak Maka Lanjutkan Ke Pengisian Data
		if (ubah($_POST) > 0) { ?>
			<script type="text/javascript">
				alert("Data Berhasil Diubah");
				window.location.href = "index.php";
			</script>
		<?php }
		else {
			echo "Gagal Mengubah Data <br>";
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
			<!-- Menggunakan Cara Input Hidden -->
			<!-- <input type="hidden" name="id"> -->
			<tr>
				<td><label for="nama">nama : </label></td>
				<td><input type="text" name="nama" id="nama" required value="<?= $b['nama']; ?>"></td>
			</tr>
			<tr>
				<td><label for="jenis">jenis : </label></td>
				<td><input type="text" name="jenis" id="jenis" required value="<?= $b['jenis']; ?>"></td>
			</tr>
			<tr>
				<td><label for="penerbit">penerbit : </label></td>
				<td><input type="text" name="penerbit" id="penerbit" required value="<?= $b['penerbit']; ?>"></td>
			</tr>
			<tr>
				<td><label for="tahun">tahun : </label></td>
				<td><input type="text" name="tahun" id="tahun" required value="<?= $b['tahun']; ?>"></td>
			</tr>
			<tr>
				<td><button type="submit" name="submit">Tambah</button></td>
		</form>
				<td><button type="submit"><a href="index.php">Kembali</a></button></td>
			</tr>
	</table>
</body>
</html>