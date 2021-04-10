<?php 
	
	session_start();
	require 'koneksi.php';
	require 'function.php';

	if (!isset($_SESSION['login'])) {
		header('location: login.php');
	}

	$id = $_GET['id'];

	

	hapus($id);
		


 ?>