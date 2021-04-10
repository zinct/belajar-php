<?php 
	require 'function.php';

	//Ambil Id Dri url
	$id = $_GET['id'];

	$s = query("SELECT * FROM tb_siswa WHERE id = $id")[0];




	if(isset($_POST['submit'])) {
		if (ubah() > 0) { ?>
			<script type="text/javascript">
			alert('Data Berhasil Diubah');
			document.location.href = 'index.php';
		</script>

		<?php		}
		else {
			echo "Gagal Diubah";
			echo mysqli_error($conn);
		}
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="" method="post">
 		<input type="hidden" name="id" value="<?php echo $s['id'] ?>">
 	<input type="text" name="nama" placeholder="nama" value="<?php echo $s['nama'] ?>">
 	<input type="text" name="nis" placeholder="nis" value="<?php echo $s['nis'] ?>">
 	<input type="text" name="jurusan" placeholder="jurusan" value="<?php echo $s['jurusan'] ?>">
 	<input type="text" name="kelas" placeholder="kelas" value="<?php echo $s['kelas'] ?>">
 	<button type="submit" name="submit">Kirim</button>
 </form>
 </body>
 </html>