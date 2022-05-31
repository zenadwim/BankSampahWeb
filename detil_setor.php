<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_nasabah'])){
die("Anda belum login");//jika belum login jangan lanjut..
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Bank Sampah</h2>
                        <a href="logout.php" class="btn btn-success pull-right">Log out/keluar</a>
                        <a href="halaman_nasabah.php" class="btn btn-success pull-right">Halaman Utama</a>
                    </div>
                   <div>
                   <h1>Detil Transaksi</h1>
 <?php
 include 'config.php';
 $id_setor= $_GET['id_setor'];
 $id_nasabah= $_SESSION['id_nasabah'];
 $rekening  = mysqli_query($db, "select * from setoran where id_setor='$id_setor'");
 $row        = mysqli_fetch_array($rekening);

 ?>
 <br/>
 <table class="table table-bordered">
     <tr>
         <td style="width: 50%;">
             Nama Admin
         </td>
         <td style="width: 50%;">
         <?php echo $row['id_admin'] ?>
         </td>
    </tr>
    <tr>
         <td style="width: 50%;">
             Tanggal
         </td>
         <td style="width: 50%;">
         <?php echo $row['tgl_setor'] ?>
         </td>
    </tr>
    </table>  

        
    <div>
    
    <div class="container" style="width:100%;">  
    <h3>Daftar Sampah</h3>          
                 
                <div style="clear:both"></div>                 
                  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>ID</th>  
                               <th>Sampah</th>  
                               <th>harga_nasabah</th>
                                 

                          </tr>  
                     <?php
                     $query = "SELECT * FROM detil_setor where id_setor='$id_setor'";  
                     $result = mysqli_query($db, $query);
                     $x=0;  
                     while($row = mysqli_fetch_array($result))  
                     {
                        
                        $x= $x + $row["harga_nasabah"];
                     ?>  
                          <tr>  
                               <td><?php echo $row["id_setor"]; ?></td>  
                               <td><?php echo $row["id_sampah"]; ?></td>  
                               <td><?php echo $row["harga_nasabah"]; ?></td>
                                 
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>
                     <table class="table table-bordered">
                    <tr>
                        <td style="width: 50%;">
                            Total
                        </td>
                        <td style="width: 50%;">
                            <?php echo $x ?>
                        </td>
                    </tr>
                    </table>  
                </div>  
           </div>  
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>