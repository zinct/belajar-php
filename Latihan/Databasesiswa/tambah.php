<?php 
	require 'function.php';


	if(isset($_POST['submit'])) {
		if (tambah() > 0) { ?>
			<script type="text/javascript">
			alert('Data Berhasil Ditambahkan');
			document.location.href = 'index.php';
		</script>

		<?php		}
		else {
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
 	<input type="text" name="nama" placeholder="nama">
 	<input type="text" name="nis" placeholder="nis">
 	<input type="text" name="jurusan" placeholder="jurusan">
 	<input type="text" name="kelas" placeholder="kelas">
 	<button type="submit" name="submit">Kirim</button>
 </form>
 </body>
 </html>