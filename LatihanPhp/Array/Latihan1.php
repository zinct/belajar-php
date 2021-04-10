<?php 
	$pegawai = [
		[
			"nama" => "Indra Mahesa",
			"nis"=>"130183103",
			"tinggi"=>"13 cm",
			"email"=>"indramahes128@gmail.com",
			"nilai"=>[10,20,30]
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
<?php 
	function waktu(){
		echo date("D m Y");
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Array</title>
 	<style type="text/css">
 		.clear {clear: both;}
 	</style>
 </head>
 <body>
 	<H2>Data Pegawai</H2>

 	<?php foreach ( $pegawai as $pgw) : ?>
	 	<ul>
	 			<li><?php echo $pgw["nama"]; ?></li>
	 			<li><?php echo $pgw["nis"]; ?></li>
	 			<li><?php echo $pgw["tinggi"]; ?></li>
	 			<li><?php echo $pgw["email"]; ?></li>
	 			 <?php endforeach; ?>
	 			<li><?php echo $pgw["nilai"][0]; ?></li>
	 	</ul>
	
	
 </body>
 </html>