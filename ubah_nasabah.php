<?php

include("config.php");

// ambil data dari formulir
$id_nasabah = $_GET['id_nasabah'];
$alamat = $_GET['alamat'];
$password = $_GET['password'];
$nama = $_GET['nama'];
$no_hp = $_GET['no_hp'];

// buat query update
$sql = "UPDATE nasabah SET alamat='$alamat', password='$password', nama='$nama', no_hp='$no_hp' WHERE id_nasabah='$id_nasabah'";
$query = mysqli_query($db, $sql);

// apakah query update berhasil?
if( $query ) {
    // kalau berhasil alihkan ke halaman tabel_nasabah.php
    header('Location: tabel_nasabah.php');
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}

?>