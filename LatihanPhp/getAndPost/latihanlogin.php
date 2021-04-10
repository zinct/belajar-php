<?php 
	//logical System
	//Cek Buton
	if (isset($_POST['btn'])) {

	//Username Dan Password
		if ($_POST['user'] == "admin" && $_POST['pass'] == "root") {
			
		//Benar Akan Di Redirect
			header("Location: index.php");
		}
	//Salah Akan Ada Pesan Kesalahan
		else {
			$error = true;
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Login Username Password
	</title>
	<style type="text/css">
		p {
			color: red;
		}
	</style>
</head>
<body>
	
	<?php 
		if (isset($error)) : ?>
			<p>Username Dan Password Anda Salah!</p>
		<?php endif; ?>
	
	<table  cellspacing="0">
		<form action="" method="post">
			<tr>
				
				<td>
					<label for="hes">Nama : </label>
				</td>
				<td>	
					<input type="text" name="nama" id="hes">
				</td>
				
			</tr>
			<tr>
				<td>
					<label for="he">Username : </label>
				</td>
				<td>	
					<input type="text" name="user" id="he">
				</td>
			</tr>
			<tr>		
				<td>
					<label for="ha">Password : </label>
				</td>
				<td>
					<input type="password" name="pass" id="ha">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" name="btn">Kirim</button>
				</td>
			</tr>
		</form>
	</table>
</body>
</html>