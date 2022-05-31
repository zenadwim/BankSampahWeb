<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
    die("Anda belum login");//jika belum login jangan lanjut..
    }
?>

<?php
include 'config.php';
$id_sampah         = $_GET['id_sampah'];
$sampah  = mysqli_query($db, "select * from sampah where id_sampah='$id_sampah'");
$row        = mysqli_fetch_array($sampah);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit </title>
</head>

<body>
    <header>
        <h3>Formulir Edit </h3>
    </header>

    <form action="proses-ubahharga.php" method="POST">

        <fieldset>

            <input type="hidden" name="id_sampah" value="<?php echo $row['id_sampah'] ?>" />
            <input type="hidden" name="harga_pengepul_lama" value="<?php echo $row['harga_pengepul'] ?>" />
            <input type="hidden" name="harga_nasabah_lama" value="<?php echo $row['harga_nasabah'] ?>" />

        
        
        <p>
            <label for="harga_pengepul">harga_pengepul: </label>
            <input type="text" name="harga_pengepul" value="<?php echo $row['harga_pengepul'] ?>" />
        </p>
        <p>
            <label for="harga_nasabah">harga_nasabah: </label>
            <input type="text" name="harga_nasabah" value="<?php echo $row['harga_nasabah'] ?>" />
        </p>
        <p>
            <label for="tanggal">tanggal: </label>
            <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" />
        </p>
        <p>
            <label for="id_admin">Admin yang mengubah: </label>
            <input type="text" name="id_admin" value="<?php echo $_SESSION['id_admin'] ?>" />
        </p>
        
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>