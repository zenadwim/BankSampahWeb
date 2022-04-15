<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config.php';
 
// menangkap data yang dikirim dari form login
$id_admin = $_POST['id_admin'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"select * from admin where id_admin='$id_admin' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	
		$nama=$data['nama'];
		$_SESSION['nama'] =$iduser ;
		$_SESSION['id_admin'] =$id_admin;
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");
 
	
		
}else{
	header("location:login.php?pesan=gagal");
}
 
?>