<?php 

	function register() {

		global $conn;

		$username = htmlspecialchars(mysqli_escape_string($conn, stripcslashes(strtolower($_POST['username']))));
		$password = htmlspecialchars(mysqli_escape_string($conn, $_POST['password']));
		$password2 = htmlspecialchars(mysqli_escape_string($conn, $_POST['password2']));

		$user = strlen($username);
		$pass = strlen($password);

		$query = "SELECT * FROM tb_user WHERE username = '$username' ";

		$result = mysqli_query($conn,$query);

		if (mysqli_num_rows($result) == 1) {
			echo "Username Already In Use";
			return 0;
		}

		if ($user < 3) {
			echo "Minimal 3 Characters On Username";
			return 0;
		}

		if(!preg_match("/^[_a-zA-Z0-999999999]*$/",$username)){
			echo "Spaci Illegal <br>";
			return 0;
		}

		if (mysqli_num_rows($result) == 0) {
			
			if ($pass < 8) {
				echo "Minimal 8 Characters On Password";
				return 0;
			}

			if ($password !== $password2) {
				echo "Password Doesnt Same..";
				return 0;
			}

			$password = password_hash($password, PASSWORD_DEFAULT);

			mysqli_query($conn, "INSERT INTO tb_user VALUES ('','$username','$password')");

			return mysqli_affected_rows($conn);

		}
	}

	function login() {

		global $conn;

		$username = htmlspecialchars(mysqli_escape_string($conn, stripcslashes(strtolower($_POST['username']))));
		$password = htmlspecialchars(mysqli_escape_string($conn, $_POST['password']));

		$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' ");

		if (mysqli_num_rows($result) == 1) {
			
			$row = mysqli_fetch_assoc($result);

				if ($rows = password_verify($password, $row['password'])){

					//set Session
					$_SESSION['login'] = true;					

						//set Cookie
						if (isset($_POST['remember'])) {						
						
							setcookie('id',$row["id"],time()+36000);
							setcookie('key',hash('gost', $row['username']),time()+36000);

						}

							echo "<script>
									alert('Success Login');
									window.location.href = 'index.php';
							 	  </script>";
						 exit;

				}

				else {
					echo "Wrong Password";
				}	

		}

		else {
			echo "Username Not Found";
		}

	}

	function insert() {

		global $conn;

		$nama = mysqli_escape_string($conn, htmlspecialchars($_POST['nama']));
		$jurusan = mysqli_escape_string($conn, htmlspecialchars($_POST['jurusan']));
		$email = mysqli_escape_string($conn, htmlspecialchars($_POST['email']));
		$negara = mysqli_escape_string($conn, htmlspecialchars($_POST['negara']));

		$gambar = upload($_FILES);

		if ($gambar == false) {
			return 0;
		}


		$query = "INSERT INTO tb_siswa VALUES ('','$nama','$gambar','$jurusan','$email','$negara')";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function upload($data) {
		global $conn;

		$namaFile = $data['gambar']['name'];
		$lokasi = $data['gambar']['tmp_name'];
		$error = $data['gambar']['error'];
		$ukuran = $data['gambar']['size'];

		if ($error == 4) {
			echo "File Tidak ada";
			return false;
		}

		$ukuranValid = ['> 1000000'];
		if (in_array($ukuran, $ukuranValid)) {
			echo "Ukuran File terlalu Besar";
			return false;
		}

		$ekstensiValid = ['jpeg','jpg','webp','png'];

		$ekstensi = pathinfo($namaFile, PATHINFO_EXTENSION);
		$ekstensi = strtolower($ekstensi);

		if (!in_array($ekstensi, $ekstensiValid)) {
			echo "Format File Salah";
			return false;
		}

		$namaAcak = uniqid();

		$namaAcak .= ".";
		$namaAcak .= $ekstensi;

		move_uploaded_file($lokasi, 'gambar/' . $namaAcak);

		return $namaAcak;



	}


	function query($query) {

		global $conn;

		$result = mysqli_query($conn,$query);


		$rows = [];

		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;


	}

	function cari() {

		global $conn;

		$ketik = $_POST['ketik'];

		$query = "SELECT * FROM tb_siswa WHERE nama LIKE '%$ketik%' OR 
											   jurusan LIKE '%$ketik%' OR
											   email LIKE '%$ketik%' OR
											   negara LIKE '%$ketik%'

		";

		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

	function hapus($id) {

		global $conn;

		mysqli_query($conn,"DELETE FROM tb_siswa WHERE id = '$id' ");

		echo "<script>
				alert('berhasil Menghapus');
				window.location.href = 'index.php';
			 </script>";

	}

	function update($id) {
		global $conn;

		$nama = mysqli_escape_string($conn, htmlspecialchars($_POST['nama']));
		$jurusan = mysqli_escape_string($conn, htmlspecialchars($_POST['jurusan']));
		$email = mysqli_escape_string($conn, htmlspecialchars($_POST['email']));
		$negara = mysqli_escape_string($conn, htmlspecialchars($_POST['negara']));
		$gambarLama = $_POST['gambarLama'];


		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarLama;
		}
		else {
			$gambar = upload($_FILES);
		}


		$query = "UPDATE tb_siswa SET nama = '$nama',gambar = '$gambar', jurusan = '$jurusan', email = '$email',negara='$negara' WHERE id = '$id'";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

 ?>