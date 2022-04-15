<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user

include 'config.php';


?>
<!DOCTYPE html>
<html>
<head>
    <title>Create sampah</title>
</head>

<body>
    <header>
        <h3>Create sampah</h3>
    </header>

    <form action="proses-buatkategori.php" method="POST">

        <fieldset>

       

        <p>
            <label for="deskripsi">kategori: </label>
            <input type="text" name="deskripsi" placeholder="" />
        </p>

        
       
      

        <p>
            <input type="submit" value="Input" name="Input" />
        </p>

        </fieldset>

    </form>

    </body>
</html>