<?php 
	//Koneksi Ke database
	$conn = mysqli_connect("localhost","root","","phpdasar");

	//Query Data || Ambil Data Dari Database
	$result = mysqli_query($conn, "SELECT * FROM Mahasiswa");
	if (!$result) {
		echo mysqli_error($conn);
	}
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
			<?php //Ambil Semua Data Sekaligus Mengambil Semua Data Jika Masih ada Menggunakan While ?>
			<?php while($row = mysqli_fetch_assoc($result)) :?>
			<tr>
				<td><?php echo $i; ?></td>
				<td>
					<a href="">Ubah</a> | 
					<a href="">Hapus</a>
				</td>
				<td><?php echo $row['nis']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['jurusan']; ?></td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<?php $i++; ?>
			<?php endwhile; ?>
		</form>
	</table>
</body>
</html>