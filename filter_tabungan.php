<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
    require_once "config.php";
      $output = '';  
      $query = "  
           SELECT * FROM setoran  
           WHERE tgl_setor BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($db, $query);  
      $output .= '  
           <table class="table table-bordered">  
                 <tr>  
                               <th>ID</th>  
                               <th>tanggal setor</th>  
                               <th>Admin</th>
                               <th>Aksi</th>  

                          </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["id_setor"] .'</td>  
                          <td>'. $row["tgl_setor"] .'</td>  
                          <td>'. $row["id_admin"] .'</td>  
                          <td><a href="detil_setor.php?id_setor='.$row['id_setor'].'" >Detil</a></td>
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