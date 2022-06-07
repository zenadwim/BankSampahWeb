<?php
include("config.php");
$data = json_decode(file_get_contents('php://input'), true);

$jumlah = $data['jumlah'];
$min = $data['min'];

if ($jumlah < $min) {
     
     $tanggal_pengajuan = $data['tanggal_pengajuan'];
     $id_nasabah = $data['id_nasabah'];
     
     $sql = "INSERT INTO pengajuan (id_pengajuan, jumlah, tanggal_pengajuan, tanggal_penarikan, status, id_nasabah) VALUE ('NULL', '$jumlah', '$tanggal_pengajuan', '$tanggal_pengajuan', 'Sedang diproses','$id_nasabah' )";
     $query = mysqli_query($db, $sql);

     

     echo "Data Inserted";
     
} else {
     echo "Masukan data dengan benar";
}
?>