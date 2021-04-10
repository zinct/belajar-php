<?php 
	require 'function.php';

	//Query
	$mahasiswa = query("SELECT * FROM Mahasiswa")
?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>
	<h1 style="text-align: center;">Data Mahasiswa</h1>
	<br><br>

	<table border="1" cellpadding="10" cellspacing="0" style="text-align: center; margin: auto;">
		<form>
			<tr>
				<td>No.</td>
				<td>Aksi</td>
				<td>Nis</td>
				<td>Nama</td>
				<td>Jurusan</td>
				<td>Email</td>
			</tr>
			<?php $i = 1; ?>
			<?php foreach($mahasiswa as $mhs) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td>
					<a href="">Ubah</a> | 
					<a href="">Hapus</a>
				</td>
				<td><?php echo $mhs['nis']; ?></td>
				<td><?php echo $mhs['nama']; ?></td>
				<td><?php echo $mhs['jurusan']; ?></td>
				<td><?php echo $mhs['email']; ?></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
		</form>
	</table>
</body>
</html>