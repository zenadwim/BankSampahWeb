<?php
    if(isset($_POST["from_date"], $_POST["to_date"])){  
        require_once "config.php";
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $output = '';  
        $query = "SELECT * FROM harga_pengepul INNER JOIN admin ON harga_pengepul.id_admin=admin.id_admin where tanggal BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."';";
        $result = mysqli_query($db, $query);  
        $output .= '  
            <table class="table table-bordered table-striped"> 
                <thead> 
                    <tr>  
                        <th>ID Harga Pengepul </th>
                        <th>ID Sampah</th>
                        <th>Harga Lama</th>
                        <th>Harga Baru</th>
                        <th>Tanggal</th>
                        <th>Admin</th>
                    </tr> 
                </thead> 
        ';  
        if(mysqli_num_rows($result) > 0)  
        {  
            while($row = mysqli_fetch_array($result))  
            {  
                $cr_date=date_create($row['tanggal']);
                            
                $for_date=strftime('%e-%B-%Y', $cr_date->getTimestamp());
                $output .= '  
                        <tr>  
                        <td>' . $row["id_hrgpengepul"] . '</td>
                        <td>' . $row["id_sampah"] . '</td>
                        <td>' . $row["harga_lama"] . '</td>
                        <td>' . $row["harga_baru"] . '</td>
                        <td>' . $for_date . '</td>
                        <td>' . $row["nama"] . '</td>
                        </tr>  
                ';  
            }  
        }  
        else  
        {  
            $output .= '  
                <tr>  
                        <td colspan="6">No Order Found</td>  
                </tr>  
            ';  
        }  
        $output .= '</table>';  
        echo $output;  
    }
?>