<?php 
	require 'function.php';

	$siswa = query("SELECT * FROM tb_siswa  ");


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="tambah.php">Taambah data</a>
	<table border="1" cellpadding="10" cellspacing="0" width="100%">
		<caption><h1>Database Siswa</h1></caption>
		<form action="" method="post">
			<tr>
				<th>No</th>
				<th>Aksi</th>
				<th>Nama</th>
				<th>nis</th>
				<th>jurusan</th>
				<th>kelas</th>
			</tr>
			<?php $i=1; ?>
			<?php foreach($siswa as $s) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td>
					<a href="ubah.php?id=<?php echo	$s['id']; ?>">Update</a> |
					<a href="hapus.php?id=<?php echo $s['id']; ?> ">Delete</a>
				</td>
				<td><?php echo $s['nama']; ?></td>
				<td><?php echo $s['nis']; ?></td>
				<td><?php echo $s['jurusan']; ?></td>
				<td><?php echo $s['kelas']; ?></td>
			</tr>
			<?php $i++ ?>
		<?php endforeach; ?>
		</form>
	</table>
</body>
</html>