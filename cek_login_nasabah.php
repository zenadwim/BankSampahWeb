<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config.php';
 
// menangkap data yang dikirim dari form login
$id_nasabah = $_POST['id_nasabah'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"select * from nasabah where id_nasabah='$id_nasabah' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	
		$nama=$data['nama'];
		$_SESSION['nama'] =$iduser ;
		$_SESSION['id_nasabah'] =$id_nasabah;
		// alihkan ke halaman dashboard nasabah
		header("location:halaman_nasabah.php");
 
	
		
}else{
	header("location:login.php?pesan=gagal");
}
 
?>