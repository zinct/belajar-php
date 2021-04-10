 <?php 
 	//Hubungkan Ke database
 	$conn = mysqli_connect("localhost", "root", "", "db_perpustakaan");


 	 //ambil data dari tabel buku
 	 //menggunakan function
 	function query($query) {
 	 global $conn;

 	 //ambil atau query field dari tabel buku
 	 $result = mysqli_query($conn,$query);
 	 
 	 //buat wadah menggunakan array
 	 $wadah = [];
 	 //ambil data dari field tabel buku
 	 //Tampilkan seluruh data jika masih ada menggunakan while
 	 while ($row = mysqli_fetch_assoc($result)) {
 	 	//masukan hasil seluruh data ke wadah
 	 	$wadah[] = $row;
 	 	}
 	 //kembalikan nilai wadah
 	 	return $wadah;

 	 }

 	 function tambah($post) {
 	 	global $conn;

 	 	//Ambil Data Yang Sudah diInput lalu masukan ke variabel
 	 	$nama = mysqli_escape_string( htmlspecialchars($_POST['nama']));
 	 	$jenis = mysqli_escape_string($conn, htmlspecialchars($_POST['jenis']));
 	 	$penerbit = mysqli_escape_string($conn, htmlspecialchars($_POST['penerbit']));
 	 	$tahun = mysqli_escape_string($conn, htmlspecialchars($_POST['tahun']));

 	 	//Buat Query
 	 	$query = "INSERT INTO tb_buku VALUES ('', '$nama', '$jenis', '$penerbit', '$tahun')";

 	 	//Masukan Query untuk diproses
 	 	mysqli_query($conn,$query);

 	 	//kembalikan Nilai error Supaya Bisa Menampilkan Error
 	 	return mysqli_affected_rows($conn);
 	 }

 	 function hapus() {
 	 	global $conn;

 	 	//ambil id dari url lalu masukan ke variabel
 	 	$id = $_GET['id'];

 	 	//Buat query Sekaligus Proses Query
 	 	//Hapus Tabel Dari Id Yang sudah diambil dari url
 	 	mysqli_query($conn, "DELETE FROM tb_buku WHERE id = $id");

 	 	return mysqli_affected_rows($conn);

 	 }


 	 function ubah() {
 	 	global $conn;

 	 	//Menggunakan Cara ambil id lewat url
 	 	$id = $_GET['id'];

 	 	//Ambil Data Yang Sudah diInput lalu masukan ke variabel

 	 	//Menggunakan Cara Input hidden
 	 	// $id = $_GET['id'];
 	 	$nama = htmlspecialchars($_POST['nama']) ;
 	 	$jenis = mysqli_escape_string($conn, htmlspecialchars($_POST['jenis']));
 	 	$penerbit = mysqli_escape_string($conn, htmlspecialchars($_POST['penerbit']));
 	 	$tahun = mysqli_escape_string($conn, htmlspecialchars($_POST['tahun']));

 	 	//Buat Query
 	 	$query = "UPDATE tb_buku SET 
 	 			nama = '$nama',
 	 			jenis = '$jenis',
 	 			penerbit = '$penerbit',
 	 			tahun = '$tahun' 
 	 		WHERE id = $id 
			";


 	 	//Masukan Query untuk diproses
 	 	mysqli_query($conn,$query);

 	 	//kembalikan Nilai error Supaya Bisa Menampilkan Error
 	 	return mysqli_affected_rows($conn);
 	 }

 	 function cari($keyword) {
 	 	global $conn; 	

 	 	$query = "SELECT * FROM tb_buku WHERE
 	 				nama LIKE '%$keyword%' OR
 	 				jenis LIKE '%$keyword%' OR
 	 				penerbit LIKE '%$keyword%' OR
 	 				tahun LIKE '%$keyword%'

 	 	";

 	 	return query($query);
 	 }

 	 function register($data) {
 	 	global $conn;

 	 	$username = strtolower((stripcslashes($data['username'])));
 	 	$password = mysqli_real_escape_string($conn, $data['password']);
 	 	$password2 = mysqli_real_escape_string($conn,$data['password2']);

 	 	$panjangUser = strlen($username);
 	 	$panjangPass = strlen($password);
 	 	


 	 	//Cek Apakah Username Sudah Ada atau tidak
 	 	$result = mysqli_fetch_assoc( mysqli_query($conn,"SELECT username FROM tb_user WHERE username = '$username' ") );

 	 	if(!preg_match("/^[a-zA-Z]*$/",$username)){
			echo "Dilarang Menggunakan Spasi <br>";
			return 0;
		}

 	 	//Jika Sudah ada maka Tampilkan pesan pesan
 	 	if ($result > 0) {
 	 		echo "Username Sudah Terpakai.";
 	 		return 0;
 	 	}

 	 	// Cek apakah password sama dengan konfirmasi password
 	 	
		if ($password !== $password2) {
 	 		echo "Password Tidak Sama <br>";

			return 0;
 	 	}

 	 	if ($panjangUser < 3){

			echo "Minimal 3 karakter pada username <br>";

			return 0;

		}

		if ($panjangPass < 8){

			echo "Minimal 8 karakter pada Password <br>";

			return 0;

		}
		

 	 	//enkripsi Password
 	 	$password = password_hash($password, PASSWORD_DEFAULT);
 	 	
 	 	
 	 	//Tambahkan User baru ke database
 	 	mysqli_query($conn,"INSERT INTO tb_user VALUES ('','$username','$password')");

 	 	return mysqli_affected_rows($conn);

 	 }


 	 function login($data) {

 	 	global $conn;

 	 	$username = $data['username'];
 	 	$password = $data['password'];

 	 	$result = mysqli_fetch_assoc( mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$username'") );


 	 	if (mysqli_num_rows($result) == 1) {
 	 			

 	 			$row = mysqli_fetch_assoc($result);
	 	 			if (password_verify($password, $row['password'])) {
	 	 			return 1;
	 	 			
	 	 		}

	 	 		else {
	 	 			return 0;
	 	 		}

 	 		}

 	 	else {
 	 		return 0;
 	 	}
 	 	

 	 }

 	

 ?>