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
$detil  = mysqli_query($db, "select * from detil_setor where id_sampah='$id_sampah' AND id_setor='$id_setor' ");
$row        = mysqli_fetch_array($detil);

$setor  = mysqli_query($db, "select * from setoran where id_setor='$id_setor' ");
$baris  = mysqli_fetch_array($setor);
$id_nasabah = $baris['id_nasabah'];

$tabungan  = mysqli_query($db, "select * from tabungan where id_nasabah='$id_nasabah' ");
$tabung  = mysqli_fetch_array($tabungan);

$sampah  = mysqli_query($db, "select * from sampah where id_sampah='$id_sampah' ");
$smp  = mysqli_fetch_array($sampah);

$saldo_sekarang=$tabung['saldo']-$row['harga_nasabah'];
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
            <label for="harga_pengepul">nama sampah: </label>
            <input type="text" name="nama_sampah" value="<?php echo $smp['nama_sampah'] ?>" />
        </p>
        
        
        
        
        <table>
                <tr>
                    <td>Bobot</td> <td> : </td> <td><input type="text" name="jumlah" id="jumlah" value="<?php echo $row['total'] ?>" /> </td>
                </tr>
                <tr>
                    <td>harga_nasabah</td> <td> : 
                    </td> <td><input type="text" name="harga_nasabah" id="harga_nasabah" value="<?php echo $smp['harga_nasabah'] ?>" /> </td>
                </tr>
                <tr>
                    <td>harga_pengepul</td> <td> :    
                    </td> <td><input type="text" name="harga_pengepul" id="harga_pengepul" value="<?php echo $smp['harga_pengepul'] ?>" /> </td>
                </tr>
                <tr>
                    <td>hrg_nasabah</td> <td> : </td>
                    <td><input type="text" name="hrg_nasabah" id="hrg_nasabah"  value="<?php $hrg_n=$row['total']*$smp['harga_nasabah']; echo $hrg_n ?>"  readonly="readonly" /> </td>
                </tr>
                <tr>
                    <td>hrg_pengepul</td> <td> : </td>
                    <td><input type="text" name="hrg_pengepul" id="hrg_pengepul"  value="<?php $hrg_p=$row['total']*$smp['harga_pengepul']; echo $hrg_p ?>"  readonly="readonly" /> </td>
                </tr>
        <table>
        <p style="display:none">
            <input type="text" name="saldo" value="<?php echo $saldo_sekarang ?>" />
            <input type="text" name="id_nasabah" value="<?php echo $id_nasabah ?>" />
            <input type="text" name="id_setor" value="<?php echo $id_setor ?>" />
            <input type="text" name="id_sampah" value="<?php echo $id_sampah ?>" />
        <p>
        
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    
     
            <script type="text/javascript">
            $(document).ready(function() {
                $('#jumlah').change(function(){
                
                var jumlah=parseInt($('#jumlah').val());
                var harga_nasabah=parseInt($('#harga_nasabah').val());
                var harga_pengepul=parseInt($('#harga_pengepul').val());
                
                var credit=jumlah*harga_nasabah;
                var credit2=jumlah*harga_pengepul;
                $('#hrg_nasabah').val(credit);
                $('#hrg_pengepul').val(credit2);
                });
            });
            </script>
    </body>
</html>