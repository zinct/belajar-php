<?php 
	$conn = mysqli_connect("localhost", "root", "", "db_perpustakaan");

	function query($query) {
		global $conn;
		$result = mysqli_query($conn,$query);

		$rows=[];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah() {
		global $conn;

		$nama = htmlspecialchars($_POST['nama']);
		$nis = htmlspecialchars($_POST['nis']);
		$jurusan = htmlspecialchars($_POST['jurusan']);
		$kelas = htmlspecialchars($_POST['kelas']);

		$query = "INSERT INTO tb_siswa VALUES ('','$nama','$nis','$jurusan','$kelas')";

		$result = mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function hapus($data) {
		global $conn;

		$id = $data['id'];

		$query = "DELETE FROM tb_siswa WHERE id = $id";

		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
	}

	function ubah() {
		global $conn;

		$id = $_POST['id'];
		$nama = htmlspecialchars($_POST['nama']);
		$nis = htmlspecialchars($_POST['nis']);
		$jurusan = htmlspecialchars($_POST['jurusan']);
		$kelas = htmlspecialchars($_POST['kelas']);

		$query = "UPDATE tb_siswa SET nama = '$nama', nis = '$nis', jurusan = '$jurusan', kelas = '$kelas' WHERE id = $id";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
?>