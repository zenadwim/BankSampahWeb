<?php

session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
die("Anda belum login");//jika belum login jangan lanjut..
}
require_once "config.php";


$query = mysqli_query($db, "SELECT max(id_sampah) as idTerbesar FROM sampah");
	$data = mysqli_fetch_array($query);
	$idsampah = $data['idTerbesar'];
 
	$urutan = (int) substr($idsampah, 3, 3);
 
	$urutan++;
 
	$huruf = "SMP";
	$idsampah = $huruf . sprintf("%03s", $urutan);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buat sampah</title>
</head>

<body>
    <header>
        <h3>Buat sampah</h3>
    </header>

    <form action="proses-buatsampah.php" method="POST">

        <fieldset>

        <p>
            <label for="id_sampah">id_sampah: </label>
            <input type="text" name="id_sampah" value="<?php echo $idsampah ?>" />
        </p>

        <p>
            <label for="nama_sampah">nama_sampah: </label>
            <input type="text" name="nama_sampah" placeholder="" />
        </p>

        
        <p>
            <label for="id_kategori">kategori: </label>
            <select name="id_kategori" id="id_kategori">
            <option disabled selected> Pilih </option>
            <?php 
            $sql = "SELECT * FROM kategori";
            if($result = mysqli_query($db, $sql)){
            while ($data=mysqli_fetch_array($result)) {
            ?>
            <option value="<?=$data['id_kategori']?>"><?=$data['deskripsi']?></option> 
            <?php
            }}
            ?>
            </select>
        </p>
        <p>
            <label for="harga_pengepul">harga_pengepul: </label>
            <input type="text" name="harga_pengepul"  />
        </p>
        <p>
            <label for="harga_nasabah">harga_nasabah: </label>
            <input type="text" name="harga_nasabah"  />
        </p>
        <p>
            <label for="tanggal">tanggal: </label>
            
            <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" />
        </p>

        <p>
            <label for="id_admin">Admin yang menginput: </label>
            <input type="text" name="id_admin"  value="<?php echo $_SESSION['id_admin'] ?>"readonly />
        </p>

        <p>
            <input type="submit" value="Input" name="Input" />
        </p>

        </fieldset>

    </form>

    </body>
</html>