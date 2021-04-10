<?php 	
	//Cek Data
	if (!isset($_GET['nama']) || !isset($_GET['nis']) || !isset($_GET['tinggi']) || !isset($_GET['email'])) {
		//Redirect
		header('Location: latihan1.php');
		exit;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data</title>
</head>
<body>
	<h2><?php echo $_GET['nama']; ?></h2>
	<ul>
		<li><?php echo $_GET['nama']; ?></li>
		<li><?php echo $_GET['nis']; ?></li>
		<li><?php echo $_GET['tinggi']; ?></li>
		<li><?php echo $_GET['email']; ?></li>
	</ul>

	<a href="latihan1.php">Kembali</a>
</body>
</html>