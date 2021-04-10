<?php 
	//Koneksi Ke database
	$conn = mysqli_connect("localhost","root","","phpdasar");

	//Function Query
	function query($query) {
		//Variabel Scope
		global $conn;

		$result = mysqli_query($conn,$query);
		//Cek Query Mengambil Data
		if (!$result) {
			echo mysqli_error($conn);
		}

		//Membuat Wadah MEnggunaka Array
		$rows = [];

		//Ambil Semua Data Sekaligus Mengambil Semua Data Jika Masih ada Menggunakan While
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($post) {
		global $conn;

		$nis = htmlspecialchars($post['nis']);
		$nama = htmlspecialchars($post['nama']);
		$jurusan = htmlspecialchars($post['jurusan']);
		$email = htmlspecialchars($post['email']);

		$query = "INSERT INTO mahasiswa VALUES ('','$nis','$nama','$jurusan','$email')";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function hapus($id) {
		global $conn;

		$query = "DELETE FROM mahasiswa WHERE id = $id";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function ubah($data) {
		global $conn;

		$id = $data['id'];
		$nis = htmlspecialchars($data['nis']);
		$nama = htmlspecialchars($data['nama']);
		$jurusan = htmlspecialchars($data['jurusan']);
		$email = htmlspecialchars($data['email']);

		$query = "UPDATE mahasiswa SET 
				nis = '$nis', nama = '$nama', jurusan = '$jurusan', email = '$email' WHERE id = $id";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
?>