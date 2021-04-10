<?php 

	function faker() {
		require_once 'datafaker/vendor/fzaninotto/Faker/src/autoload.php';
		require 'function.php';
		require 'koneksi.php';

		$faker = Faker\Factory::create("id_ID");

		for ($i=0; $i < 100; $i++) { 
			mysqli_query($conn,"INSERT INTO tb_siswa VALUES ('','$faker->name','$faker->company','$faker->email','$faker->country')");
		}
	}
	

	

 ?>