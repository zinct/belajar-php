<?php 
	$mahasiswa = [
		[
			"nama" => "Indra Mahesa",
			"nis"=>"130183103",
			"tinggi"=>"13 cm",
			"email"=>"indramahes128@gmail.com"
		],	
		[
			"nama" =>"Doddy Demanysah",
			"nis"=>"13018321",
			"tinggi"=>"14 cm",
			"email"=>"demansay@gmail.com"
		],
		[
			"nama"=>"Agung Hapsah",
			"nis"=>"130183243",
			"tinggi"=>"15 cm",
			"email"=>"Agung12@gmail.com"
		]
				]; 	
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Mahasiswa</title>
 	<style type="text/css">
 		a {
 			text-decoration: none;
 		}
 	</style>
 </head>
 <body>
 	<h2>Daftar Mahasiswa</h2>
 	<ul>
 		<?php foreach ($mahasiswa as $m) : ?>
 			<li>
 				<a href="latihan2.php?
 				nama=<?php echo $m["nama"] ?> & 
 				nis=<?php echo $m["nis"] ?> & 
 				tinggi=<?php echo $m["tinggi"]?> & 
 				email=<?php echo $m["email"] ?>
 				">
				<?php echo $m["nama"] ?></a>		
 			</li>
 		<?php endforeach; ?>
 	</ul>
 </body>
 </html>