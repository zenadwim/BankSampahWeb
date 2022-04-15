<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user

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
                        <h2 class="pull-left">Informasi kategori sampah</h2>
                        <a href="logout.php" class="btn btn-success pull-right">Log out/keluar</a>
                        
                        <a href="halaman_admin.php" class="btn btn-success pull-right">index</a>
                    </div>
                    <p>Halo <b><?php echo $_SESSION['id_admin']; ?></b> Anda telah login sebagai <b>Admin</b>.</p>
                    <a href="sampah.php" class="btn btn-success pull-right">tabel sampah</a>
                    <a href="buat_kategori.php" class="btn btn-success pull-right">Tambah Baru</a>
                </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM kategori";
                    if($result = mysqli_query($db, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                      
                                        echo "<th>kategori</th>";
                                        
                                        echo "<th>Opsi</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_kategori'] . "</td>";
                                        
                                        echo "<td>" . $row['deskripsi'] . "</td>";
                                       
                                        echo "<td>";
                                            
                                            echo "<a href='update_kategori.php?id_kategori=".$row['id_kategori']."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";

                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                    }

                    // Close connection
                    mysqli_close($db);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>