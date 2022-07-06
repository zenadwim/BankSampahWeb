<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id_nasabah'])){
die("Anda belum login");//jika belum login jangan lanjut..
}
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nasabah | Tabungan</title>
    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halaman_nasabah.php">
                <div class="sidebar-brand-text mx-3">BSPBS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="halaman_nasabah.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Profile -->
            <li class="nav-item active">
                <a class="nav-link" href="profile_nasabah.php">
                    <i class="fas fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tabungan -->
            <li class="nav-item active">
                <a class="nav-link" href="tabungan.php">
                    <i class="fas fa-user-cog"></i>
                    <span>Tabungan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pengajuan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-cart-plus"></i>
                    <span>Pengajuan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu Pengajuan:</h6>
                        <a class="collapse-item" href="pengajuan.php">Pengajuan</a>
                        <a class="collapse-item" href="riwayat_pengajuan.php">Riwayat Pengajuan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['id_nasabah']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" align="center">Detil Transaksi</h1>
                    <div class="mb-4">
                    <?php
                    include '../config.php';
                    $id_setor= $_GET['id_setor'];
                    $id_nasabah= $_SESSION['id_nasabah'];
                    $rekening  = mysqli_query($db, "select * from setoran where id_setor='$id_setor'");
                    $row        = mysqli_fetch_array($rekening);
                    $id_admin=$row['id_admin'];
                    $admin  = mysqli_query($db, "select * from admin where id_admin='$id_admin'");
                    $adm        = mysqli_fetch_array($admin);

                    ?>
                    <br/>
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 50%;">
                                Nama Admin
                            </td>
                            <td style="width: 50%;">
                            <?php echo $adm['nama'] ?>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    Copyright &copy; <strong><span>2022</span></strong>. All Rights Reserved
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Anda </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        // Include config file
                        require_once "../config.php";

                        // Attempt select query execution
                        $sql = "SELECT * FROM nasabah";
                        if($result = mysqli_query($db, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                $row = mysqli_fetch_array($result);
                                ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nama</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['nama']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">No Handphone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['no_telepon']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Alamat</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['alamat']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script>
          var calculation = document.getElementById('money').value;

          //1st way
          var moneyFormatter = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 2
          });
          document.getElementById('formattedMoney').innerText = moneyFormatter.format(calculation);
     </script>

     <script>  
          $(document).ready(function(){  
               $.datepicker.setDefaults({  
                    dateFormat: 'yy-mm-dd'   
               });  
               $(function(){  
                    $("#from_date").datepicker();  
                    $("#to_date").datepicker();  
               });  
               $('#filter').click(function(){  
                    var from_date = $('#from_date').val();  
                    var to_date = $('#to_date').val();  
                    if(from_date != '' && to_date != '')  
                    {  
                         $.ajax({  
                              url:"filter_tabungan.php",  
                              method:"POST",  
                              data:{from_date:from_date, to_date:to_date},  
                              success:function(data)  
                              {  
                                   $('#order_table').html(data);  
                              }  
                         });  
                    }  
                    else  
                    {  
                         alert("Please Select Date");  
                    }  
               });  
          });  
     </script>

</body>
</html>