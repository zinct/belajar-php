<?php 
	require 'function.php';

	$id = $_GET['id'];

	//Buat Value

	$mhs = query("SELECT * FROM mahasiswa where id = $id")[0];

	//Function Ubah
	

	//cek Tombol Submit
	if (isset($_POST['submit'])) {

	//Cek Apakah data Berhasil DIubah atau Tidak
	if (ubah($_POST) > 0) { ?>
		<script type="text/javascript">
			alert('Data Berhasil Diubah');
			document.location.href = 'insertdelete.php';
		</script>
<?php
	}
	else {
		echo "Gagal Mengubah Data";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Tambah Data</title>
	<style type="text/css">
		input {
			width: 300px;
		}
	</style>
</head>
<body>

	<h1>Ubah Data</h1>
	<table>
		<form action="" method="post">
			<tr>
				<input type="hidden" name="id" value="<?php echo $mhs['id'] ?>">
			</tr>
			<tr>
				<td>Nis : </td>
				<td><input type="text" name="nis" required value="<?php echo $mhs['nis'] ?>"></td>
			</tr>
			<tr>
				<td>Nama : </td>
				<td><input type="text" name="nama" required value="<?php echo $mhs['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Jurusan : </td>
				<td><input type="text" name="jurusan" required value="<?php echo $mhs['jurusan'] ?>"></td>
			</tr>
			<tr>
				<td>email : </td>
				<td><input type="text" name="email" required value="<?php echo $mhs['email'] ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><button name="submit" type="submit">Kirim Data</button></td>
			</tr>
		</form>
	</table>	
		<a href="insertdelete.php">Kembali</a>
</body>
</html>