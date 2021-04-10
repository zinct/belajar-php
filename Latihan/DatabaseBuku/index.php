<?php 

	session_start();

	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
		exit;
	}

	require 'function.php';

	//tampilkan seluruh data lalu simpan ke variabel buku Menggunakan function query
	$buku = query("SELECT * FROM tb_buku");

	//Menimpa variabel Buku Dengan Yang sudah Diketikan User ke keyword
	//Jika Tombol cari di tekan
	if (isset($_POST['cari'])) {
		//maka akan menimpa variabel Buku Dengan Yang sudah Diketikan User ke keyword
		$buku = cari($_POST['keyword']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Buku</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Data Buku</h1>
	<br>
	<div>
		<form method="post">
			<input type="text" name="keyword" required autocomplete="off" autofocus>
			<button type="submit" name="cari">Cari!</button>
		</form>
	</div>
	<table border="1" cellspacing="0" cellpadding="20" class="index">
		
		<form action="" method="post">
			<tr>
				<th rowspan="100%"><a href="tambah.php">Tambah data</a></th>
				<th>no</th>
				<th>aksi</th>
				<th>nama</th>
				<th>jenis</th>
				<th>penerbit</th>
				<th>tahun</th>
			</tr>
			<?php $no = 1; ?>
			<?php foreach ($buku as $b): ?>
			<tr>
				<td><?= $no; ?></td>
				<td>
					<a href="ubah.php?id=<?= $b['id']; ?>">update</a> | 
					<a href="hapus.php?id=<?= $b['id']; ?>" onclick="return confirm('Yakin Akan Dihapus?')">delete</a>
				</td>
				<td><?= $b['nama']; ?></td>
				<td><?= $b['jenis']; ?></td>
				<td><?= $b['penerbit']; ?></td>
				<td><?= $b['tahun']; ?></td>
			</tr>
			<?php $no++; ?>
		<?php endforeach; ?>
		</form>
	</table>

	<a href="logout.php" onclick="return confirm('Yakin Ingin Logout?')">Logout</a>
</body>
</html>