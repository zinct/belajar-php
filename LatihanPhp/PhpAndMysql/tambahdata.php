<?php 
	require 'function.php';

	//cek Tombol Submit
	if (isset($_POST['submit'])) {

	//Logical
	if (tambah($_POST) > 0) { ?>
		<script type="text/javascript">
			alert('Data Berhasil Ditambahkan');
			document.location.href = 'insertdelete.php';
		</script>
	<?php } 
	else {
		echo "Gagal Menambahkan Data";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Tambah Data</title>
</head>
<body>

	<h1>Tambah Data</h1>
	<table>
		<form action="" method="post">
			<tr>
				<td>Nis : </td>
				<td><input type="text" name="nis" required></td>
			</tr>
			<tr>
				<td>Nama : </td>
				<td><input type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Jurusan : </td>
				<td><input type="text" name="jurusan" required></td>
			</tr>
			<tr>
				<td>email : </td>
				<td><input type="text" name="email" required></td>
			</tr>
			<tr>
				<td colspan="2"><button name="submit" type="submit">Kirim Data</button></td>
			</tr>
		</form>
	</table>	
		<a href="insertdelete.php">Kembali</a>
</body>
</html>