<?php 

	session_start();

	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
		exit;
	}

	require 'function.php';
	//ambil data yang ada di url lalu masukan ke variabel id
	$id = $_GET['id'];

	//Jika Pengapusan Berhasil maka Akan Tampil nilai true
	if (hapus($id) > 0) { ?>
		<script type="text/javascript">
			alert("Data Berhasil Dihapus");
			window.location.href = "index.php";
		</script>
	<?php }
	//Jika Ada Kesalahan Maka Tampilkan Nilai False
	else { ?>
		<script type="text/javascript">
			alert("Data Gagal Dihapus");
			window.location.href = "index.php";
		</script>
	<?php }
?>