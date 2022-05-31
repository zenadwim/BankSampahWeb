<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_sampah = $_POST['id_sampah'];
    $harga_pengepul_lama = $_POST['harga_pengepul_lama'];
    $harga_pengepul = $_POST['harga_pengepul'];
    $harga_nasabah_lama = $_POST['harga_nasabah_lama'];
    $harga_nasabah = $_POST['harga_nasabah'];
    $tanggal = $_POST['tanggal'];
    $id_admin = $_POST['id_admin'];

    // buat query update
    $sql = "UPDATE sampah SET harga_pengepul='$harga_pengepul', harga_nasabah='$harga_nasabah' WHERE id_sampah='$id_sampah'";
    $sql2 = "INSERT INTO harga_pengepul (id_sampah, harga_lama, harga_baru, tanggal, id_admin) VALUE ('$id_sampah', '$harga_pengepul_lama', '$harga_pengepul', '$tanggal', '$id_admin')";
    $sql3 = "INSERT INTO harga_nasabah (id_sampah, harga_lama, harga_baru, tanggal, id_admin) VALUE ('$id_sampah', '$harga_nasabah_lama', '$harga_nasabah', '$tanggal', '$id_admin')";
    $query = mysqli_query($db, $sql);
    $query = mysqli_query($db, $sql2);
    $query = mysqli_query($db, $sql3);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: sampah.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>