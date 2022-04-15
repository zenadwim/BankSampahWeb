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
                        
                    </div>
                   <div>
                   <h1>Halaman nasabah</h1>
 
 <p>Halo <b><?php echo $_SESSION['id_nasabah']; ?></b> Anda telah login sebagai <b>nasabah</b>.</p>
 

 <br/>
 <br/>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>