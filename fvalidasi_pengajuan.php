<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
    die("Anda belum login");//jika belum login jangan lanjut..
    }
?>

<?php
include 'config.php';
$id_pengajuan = $_GET['id_pengajuan'];


$pengajuan  = mysqli_query($db, "select * from pengajuan where id_pengajuan='$id_pengajuan' ");
$baris  = mysqli_fetch_array($pengajuan);
$id_nasabah = $baris['id_nasabah'];

$tabungan  = mysqli_query($db, "select * from tabungan where id_nasabah='$id_nasabah' ");
$tabung  = mysqli_fetch_array($tabungan);

$nasabah  = mysqli_query($db, "select * from nasabah where id_nasabah='$id_nasabah' ");
$nsb  = mysqli_fetch_array($nasabah);

$saldo_sekarang=$tabung['saldo'];
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

    <form action="proses-validasipengajuan.php" method="POST" onSubmit="return validasi_data(this)">
    
        <fieldset>
        <input type="text" value="<?php echo $tabung['saldo']; ?>" name="money" id="money" />
        <p>
            <label for="harga_pengepul">nama pengaju: </label>
            <input type="text" name="nama" value="<?php echo $nsb['nama'] ?>" />
        </p>
        
        
            
        <p>Total Uang Yang Ada Direkening : <span id="formattedMoney"></span></p>
        
        
        
        <table>
                
                <tr>
                    <td>Jumlah yang di ajukan</td> <td> : 
                    </td> <td><input type="text" name="jumlah" id="jumlah" value="<?php echo $baris['jumlah'] ?>" /> </td>
                </tr>

                <tr>
                    <td>status</td> <td> :</td> 
                    <td>
                        <select name="status" id="status">
                        <option value="Sedang diproses">Sedang diproses</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                        
                        </select>
                    </td>
                </tr>
                
        <table>
        <p style="display:none">
            <input type="text" id ="saldo" name="saldo" value="<?php $tabung['saldo']; ?>" />
            <input type="text" name="id_admin" value="<?php echo $_SESSION['id_admin']; ?>" />
            <input type="text" name="id_nasabah" value="<?php echo $id_nasabah ?>" />
            <input type="text" name="id_pengajuan" value="<?php echo $id_pengajuan ?>" />
            
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

    <script>
            var uang = document.getElementById('money').value;
            // var min_saldo = document.getElementById('minsaldo').value;
            // var coba_saldo=uang-min_saldo
          //1st way
          var moneyFormatter = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 2
          });
          document.getElementById('formattedMoney').innerText = moneyFormatter.format(uang);
        //   document.getElementById('bisaditarik').innerText = moneyFormatter.format(coba_saldo);
        //   document.getElementById('min').value=coba_saldo ;
     </script>
    
    <script type="text/javascript">
  function validasi_data(form) {  
    var jumlah = document.getElementById("jumlah").value;
		var money = document.getElementById("money").value;
        var a =parseInt(jumlah);
        var b =parseInt(money);
    if (a>=b) {
      alert('test');
      form.jumlah.focus();
      return false;
    }else
    return true;
  }
</script>
     
            
    </body>
</html>