<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_nasabah'])){
die("Anda belum login");//jika belum login jangan lanjut..
}


?>
<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
     $id_nasabah= $_SESSION['id_nasabah'];
    require_once "config.php";
    setlocale(LC_ALL, 'id-ID', 'id_ID');
      $output = '';  
      $query = "  
      SELECT pengajuan.id_pengajuan , pengajuan.tanggal_pengajuan,pengajuan.id_nasabah , pengajuan.status,pengajuan.jumlah FROM pengajuan  where id_nasabah='$id_nasabah' AND tanggal_pengajuan BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' GROUP BY pengajuan.id_pengajuan ORDER BY tanggal_pengajuan desc  
      ";  
      $result = mysqli_query($db, $query);  
      $output .= '  
           <table class="table table-bordered">  
                 <tr>  
                               <th>ID</th>  
                               <th >tanggal setor</th>  
                               <th>Admin</th>
                               <th>Setor</th>
                               <th>Aksi</th>  

                          </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
               $cr_date=date_create($row['tanggal_pengajuan']);
                         
               $for_date=strftime('%B-%Y', $cr_date->getTimestamp());
                $output .= '  
                     <tr>  
                          <td>'. $row["id_pengajuan"] .'</td>  
                          <td>'. $for_date .'</td>  
                          
                          <td>'. $row["jumlah"] .'</td>  
                          <td><a href="detil_setor.php?id_pengajuan='.$row['id_pengajuan'].'" >Detil</a></td>
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>