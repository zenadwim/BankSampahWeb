<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
die("Anda belum login");//jika belum login jangan lanjut..
}
?>

<?php
include 'config.php';
$id_nasabah= $_GET['id_nasabah'];
$tabungan  = mysqli_query($db, "select * from tabungan where id_nasabah='$id_nasabah'");
$row        = mysqli_fetch_array($tabungan);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Setor Sampah</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halaman_admin.php">
                <div class="sidebar-brand-text mx-3">BSPBS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="halaman_admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Admin -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_admin.php">
                    <i class="fas fa-user-cog"></i>
                    <span>Admin</span></a>
            </li>

            <!-- Nav Item - Nasabah -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_nasabah.php">
                    <i class="fas fa-users"></i>
                    <span>Nasabah</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Sampah -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-cart-plus"></i>
                    <span>Sampah</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu Sampah:</h6>
                        <a class="collapse-item" href="sampah.php">Tabel Sampah</a>
                        <a class="collapse-item" href="tabel_kategori.php">Kategori Sampah</a>
                        <a class="collapse-item" href="harga_nasabah.php">Detil Harga Nasabah</a>
                        <a class="collapse-item" href="harga_pengepul.php">Detil Harga Pengepul</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tabungan -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_penabung.php">
                    <i class="fas fa-book"></i>
                    <span>Tabungan</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['id_admin']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
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
                    <h1 class="h3 mb-2 text-gray-800" align="center">Setor Sampah</h1>

                    <div class="mb-4">
                         <form name="setor" id="setor">
                                   <div class="table-responsive">
                                   <table>
                                        <tr>
                                             <td>
                                                  <label for="id_setoran">ID Setoran: </label>
                                                  <input type="text" name="id_setoran" id="id_setoran" value="<?php echo $row['id_nasabah'].date('nY'); ?>" />
                                             </td>
                                        </tr>

                                        <tr>
                                             <td>
                                                  <label for="tgl_setor">Tanggal Setor: </label>
                                                  <input type="date" name="tgl_setor" id="tgl_setor" value="<?php echo date('Y-m-d'); ?>" />
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                             <label for="id_nasabah">ID Nasabah: </label>
                                             <input type="text" name="id_nasabah" id="id_nasabah"value="<?php echo $row['id_nasabah'] ?>"  />
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                             <label for="id_admin">ID Admin: </label>
                                             <input type="text" name="id_admin" id="id_admin" value="<?php echo $_SESSION['id_admin'] ?>"  />
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                             <label for="saldo">Saldo: </label>
                                             <input type="text" name="saldo" id="saldo" value="<?php echo $row['saldo'] ?>"  />
                                             </td>
                                        </tr>

                                   </table>
                              </div>
                              <div class="table-responsive">
                              <?php
                                   // Include config file
                                   require_once "config.php";

                                   $i=0;
                                   $sql = "SELECT * FROM sampah INNER JOIN kategori ON sampah.id_kategori=kategori.id_kategori;";
                                   if($result = mysqli_query($db, $sql)){
                                   if(mysqli_num_rows($result) > 0){
                                        
                                        echo "<table class='table table-bordered' id='dynamic_field'>";
                                        echo "<thead>";
                                             echo "<tr>";
                                                  echo "<th>Nama Sampah</th>";
                                                  echo "<th>Bobot</th>";
                                                  echo "<th>Satuan</th>";
                                             echo "</tr>";
                                        echo "</thead>";  
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                             $i++;
                                             echo "<tr id='row-$i'>";
                                             echo "<td style='display: none;'><input type='text' name='sampah' class='form-control' value=". $row['id_sampah'] ."  /></td>";
                                             echo "<td><input type='text' name='nama_sampah' class='form-control' value=". $row['nama_sampah'] ." readonly /></td>";
                                             echo "<td style='display: none;'><input type='text' name='harga_nasabah' class='form-control' value=". $row['harga_nasabah'] ."  /></td>";
                                             echo "<td style='display: none;'><input type='text' name='harga_pengepul' class='form-control' value=". $row['harga_pengepul'] ."  /></td>";
                                             echo "<td><input type='number' name='jumlah' class='form-control' value='0'/></td>";
                                             echo "<td style='display: none;'><input type='text' name='hrg_nasabah' class='form-control' value='0'/></td>";
                                             echo "<td style='display: none;'><input type='text' name='hrg_pengepul' class='form-control' value='0'/></td>";
                                             echo "<td><input type='text' name='satuan' class='form-control' value=". $row['satuan'] ." readonly /></td>";
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
                                        
                                   <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                              </div>
                         </form>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
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
          $(document).ready(function() {
               $(document).on('change', 'input[name="jumlah"]', function() {
                    //Get parent row
                    var parent = $(this).parent().parent();
                    //get row ID
                    var id = $(parent).attr("id").replace("row-", "");
                    //Get amount
                    var jumlah = $(parent).find('input[name="jumlah"]').val();
                    //Get Price value
                    var harga_nasabah = $(parent).find('input[name="harga_nasabah"]').val();
                    var harga_pengepul = $(parent).find('input[name="harga_pengepul"]').val();
                    //Calculate
                    var credit = jumlah * harga_nasabah;
                    var credit2 = jumlah * harga_pengepul;
                    //Set into Total
                    var hrg_nasabah = $(parent).find('input[name="hrg_nasabah"]');
                    $(hrg_nasabah).val(credit);
                    var hrg_pengepul = $(parent).find('input[name="hrg_pengepul"]');
                    $(hrg_pengepul).val(credit);
               });

               
               $('#submit').click(function() {

                    var json = Object();

                    var rowData = [];
                    json["id_setoran"] = $("#id_setoran").val();
                    json["tanggal_setor"] = $("#tgl_setor").val();
                    json["id_nasabah"] = $("#id_nasabah").val();
                    json["id_admin"] = $("#id_admin").val();
                    json["saldo"] = $("#saldo").val();

                    
                    var row = $('#dynamic_field > tbody > tr');
                    $.each(row, function(index, value) {  
                         
                         var id = $(value).attr("id").replace("row-", "");
                         var sampah = $(value).find('input[name="sampah"]').val();
                         var harga_nasabah = $(value).find('input[name="hrg_nasabah"]').val();
                         var harga_pengepul = $(value).find('input[name="hrg_pengepul"]').val();
                         var total = $(value).find('input[name="jumlah"]').val();
                         var data = {
                              id: id,
                              sampah: sampah,
                              harga_nasabah: harga_nasabah,
                              harga_pengepul: harga_pengepul,
                              total: total
                         };
                         rowData.push(data);
                    });
                    json["data"] = rowData;

                    console.log(JSON.stringify(json));
                    
                    $.ajax({  
                    url:"proses_setor.php",  
                    method:"POST",  
                    data:JSON.stringify(json),  
                    success:function(data)  
                    {  
                         alert(data);  
                         window.location.assign("tabel_penabung.php") 
                    }  
               });
               });
          });
     </script>
</body>