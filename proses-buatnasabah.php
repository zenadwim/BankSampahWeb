<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['Input'])){

    // ambil data dari formulir
    
    $id_nasabah = $_POST['id_nasabah'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
   
    // buat query
    $sql = "INSERT INTO nasabah (id_nasabah, alamat, password, nama) VALUE ('$id_nasabah','$alamat','$password','$nama')";
    $sql2 = "INSERT INTO tabungan (id_nasabah, saldo) VALUE ('$id_nasabah','0')";
    $query = mysqli_query($db, $sql);
    $query2 = mysqli_query($db, $sql2);


    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: tabel_nasabah.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tabel_nasabah.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>