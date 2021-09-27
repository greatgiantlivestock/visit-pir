<?php         
    $cn = mysqli_connect("localhost","u1076725_ms","moha11mmad","u1076725_pir_visit");   
    $QUser = "SELECT mu.id_user,mu.id_karyawan,mu.nama FROM mst_user mu JOIN trx_rencana_master trm ON mu.id_user=trm.id_user_input_rencana GROUP BY mu.id_user";
    $ResQU = mysqli_query($cn,$QUser);  
    
    while ($URows = $ResQU-> fetch_assoc()) {
        $nama=$URows['nama'];
        $QCust = "SELECT indnr,lifnr,name1,desa FROM trans_index WHERE veraa_user like '%$nama%' GROUP BY indnr";
        $ResQC = mysqli_query($cn,$QCust);
        while ($CRows = $ResQC-> fetch_assoc()) {
            $month = (int)date("m");
            $id_user=$URows['id_user'];
            $indnr=$CRows['indnr'];
            $QRMonnth = "SELECT count(*)as jml FROM trx_rencana_master trm JOIN trx_rencana_detail trd ON trm.id_rencana_header=trd.id_rencana_header 
                        WHERE id_user_input_rencana='$id_user' AND month(tanggal_rencana)='$month' AND indnr='$indnr'";
            $ResQR = mysqli_query($cn,$QRMonnth);
            while ($QRRows = $ResQR-> fetch_assoc()) {
                $jmlR = $QRRows['jml'];
                if($jmlR<2){
                    echo $URows['nama']." : ";
                    echo $CRows['name1']." : ";
                    echo $QRRows['jml']."<br>";
                }
            }
        }
    }         
?>