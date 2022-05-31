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
                   <h1>Rekening Anda</h1>
 <?php
 include 'config.php';
 $id_nasabah= $_SESSION['id_nasabah'];
 $rekening  = mysqli_query($db, "select * from tabungan where id_nasabah='$id_nasabah'");
 $row        = mysqli_fetch_array($rekening);
 ?>
 <input type="hidden" value="<?php echo $row['saldo']; ?>" name="money" id="money" />
 <p>Total Uang Direkening anda sebesar : <span id="formattedMoney"></span></p>
 

 <br/>
 <br/>
    <div>
    <p><b>Riwayat Penabungan </b> </p>
    <br/>
    <div class="container" style="width:100%;">  
                 
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>ID</th>  
                               <th >tanggal setor</th>  
                               <th>Admin</th>
                               <th>Aksi</th>  

                          </tr>  
                     <?php
                     $query = "SELECT * FROM setoran where id_nasabah='$id_nasabah' ORDER BY tgl_setor desc";  
                     $result = mysqli_query($db, $query);  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["id_setor"]; ?></td>  
                               <td><?php echo $row["tgl_setor"]; ?></td>  
                               <td><?php echo $row["id_admin"]; ?></td>
                              <?php echo " <td><a href='detil_setor.php?id_setor=".$row['id_setor']."' >Detil</a></td>";?>   
                          </tr>  
                     <?php  
                     }  
                     ?>  
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
</html>