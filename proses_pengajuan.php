<?php
include("config.php");
$data = json_decode(file_get_contents('php://input'), true);

$jumlah = $data['jumlah'];
$min = $data['min'];

if ($jumlah != "") {
     
     $tanggal_pengajuan = $data['tanggal_pengajuan'];
     $id_nasabah = $data['id_nasabah'];
     $id_pengajuan = $data['id_pengajuan'];
     
     $sql = "INSERT INTO pengajuan (id_pengajuan, jumlah, tanggal_pengajuan, status, id_nasabah) VALUE ('$id_pengajuan', '$jumlah', '$tanggal_pengajuan', 'Sedang diproses','$id_nasabah' )";
     $query = mysqli_query($db, $sql);

     

     echo "Data Inserted";
     
} else {
     echo "Masukan data dengan benar";
}
?>