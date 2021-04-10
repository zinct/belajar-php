<?php 

	require 'koneksi.php';
	require 'function.php';

	session_start();

	if (!isset($_SESSION['login'])) {
		header("location: login.php");
	}

	//pagination
	$dataPerHalaman = 10; //3
	$jumlahData = count(query("SELECT * FROM tb_siswa")); //10
	$jumlahHalaman = ceil($jumlahData / $dataPerHalaman); // 4
	$halamanAktif = ( isset($_GET['page']) ) ? $_GET['page'] : 1; //2
	$awalData = ($dataPerHalaman * $halamanAktif) - $dataPerHalaman; 

	$siswa = query("SELECT * FROM tb_siswa LIMIT $awalData, $dataPerHalaman");

	if (isset($_POST['cari'])) {
		
			$siswa = cari($_POST['ketik']);
		
		
		if (!isset($_POST['ketik'])) {
				return 0;
			}	

	}



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Table Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="textdeconone.css">
	<style>table {margin: auto; text-align: center; width: 90%;}</style>
</head>
<body>
	<h1>Student Data</h1>
	<a href="tambah.php">Create Student Data</a>
	<br><br>
	<form method="post">
		<input type="text" name="ketik" autocomplete="off" placeholder="Cari..."><button type="submit" name="cari">cari</button>
	</form>
	<br>

	<?php if($halamanAktif > 1) : ?>
		<a href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a>
	<?php endif; ?>
		<?php for($x = 1; $x<=$jumlahHalaman; $x++) : ?>
			<?php if( $x == $halamanAktif) : ?>
				<a href="?page=<?= $x; ?>" style="color: red;" ><?= $x; ?></a>
			<?php else: ?>
				<a href="?page=<?= $x; ?>"><?= $x; ?></a>
			<?php endif; ?>
		<?php endfor; ?>
	<?php if($halamanAktif < $jumlahHalaman) : ?>
		<a href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a>
	<?php endif; ?>
	
	<table border="1" cellpadding="30" cellspacing="0"> 
		<form method="post">
			<tr>
				<th>No</th>
				<th>Actions</th>
				<th>Name</th>
				<th>Major</th>
				<th>Email</th>
				<th>Country</th>
				<th>gambar</th>
			</tr>

			<?php $i =1; ?>
			<?php foreach($siswa as $s): ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="update.php?id=<?= $s['id']; ?>">Update</a> | 
					<a href="hapus.php?id=<?= $s['id']; ?>" onclick="return confirm('Yakin ingin dihapus?')">Delete</a>
				</td>
				<td><?= $s['nama']; ?></td>
				<td><img width="100px" src="gambar/<?= $s['gambar']; ?>"></td>
				<td><?= $s['jurusan']; ?></td>
				<td><?= $s['email']; ?></td>
				<td><?= $s['negara']; ?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
		</form>
	</table>
	<br>
	<a href="logout.php" onclick="return confirm('Yakin Ingin logout?')">Logout</a>
</body>
</html>