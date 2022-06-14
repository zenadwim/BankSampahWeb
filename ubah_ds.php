<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
    die("Anda belum login");//jika belum login jangan lanjut..
    }
?>

<?php
include 'config.php';
$id_setor = $_GET['id_setor'];
$id_sampah = $_GET['id_sampah'];

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

    <form action="proses-ubahds.php" method="POST">

        <fieldset>


        <p>
            <label for="id_admin">id_setor: </label>
            <input type="text" name="id_admin" value="<?php echo $id_setor ?>" />
        </p>
        <p>
            <label for="id_admin">id_sampah: </label>
            <input type="text" name="id_admin" value="<?php echo $id_sampah ?>" />
        </p>
        
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>