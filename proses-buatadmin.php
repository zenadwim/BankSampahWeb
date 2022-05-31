<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['Input'])){

    // ambil data dari formulir
    
    $id_admin = $_POST['id_admin'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
   
    // buat query
    $sql = "INSERT INTO admin (id_admin, alamat, password, nama) VALUE ('$id_admin','$alamat','$password','$nama')";
    $query = mysqli_query($db, $sql);


    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: tabel_admin.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tabel_admin.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>