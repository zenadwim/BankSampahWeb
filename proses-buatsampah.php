<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['Input'])){

    // ambil data dari formulir
    $id_sampah = $_POST['id_sampah'];
    $nama_sampah = $_POST['nama_sampah'];
    $id_kategori = $_POST['id_kategori'];
    $satuan = $_POST['satuan'];
    $harga_pengepul = $_POST['harga_pengepul'];
    $harga_nasabah = $_POST['harga_nasabah'];
    $tanggal = $_POST['tanggal'];
    $id_admin = $_POST['id_admin'];
    // buat query
    $sql = "INSERT INTO sampah (id_sampah, nama_sampah, harga_pengepul, harga_nasabah, id_kategori, satuan) VALUE ('$id_sampah', '$nama_sampah', '$harga_pengepul', '$harga_nasabah', '$id_kategori', '$satuan')";
    $sql2 = "INSERT INTO harga_pengepul (id_hrgpengepul,id_sampah, harga_lama, harga_baru, tanggal,id_admin) VALUE ('NULL','$id_sampah', '0', '$harga_pengepul', '$tanggal', '$id_admin')";
    $sql3 = "INSERT INTO harga_nasabah (id_hrgnasabah,id_sampah, harga_lama, harga_baru, tanggal,id_admin) VALUE ('NULL','$id_sampah', '0', '$harga_nasabah', '$tanggal', '$id_admin')";
    $query = mysqli_query($db, $sql);
    $query = mysqli_query($db, $sql2);
    $query = mysqli_query($db, $sql3);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: sampah.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: sampah.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>