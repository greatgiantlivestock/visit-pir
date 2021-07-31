<?php
    date_default_timezone_set("Asia/Bangkok");
    $link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir-dev");
    $queryNR=mysqli_query($link,"SELECT max(nomor_release) as jml FROM trx_release");
    while ($rec =$queryNR-> fetch_assoc()) {
        $noRelease = $rec['jml']+1;
    }
	$date = date("Ymd_His");
    $query=mysqli_query($link,"SELECT id_trx_pengobatan,indnr,kode_obat,qty,DATE(tanggal)as tanggal,unit_obat FROM trx_pengobatan tp JOIN trx_rencana_detail trd 
                        ON tp.id_rencana_detail=trd.id_rencana_detail JOIN mst_obat mo on tp.kode_obat=mo.kode_obat WHERE status_release=0");
    
    $sukses = 0;
    $gagal = 0;
    while ($rec1 =$query-> fetch_assoc()) {
        $fp = fopen("../interface/To/RP_".$date.".txt","a") or die("Unable to open file!");
		$fp1 = fopen("../interface/To_backup/RP_".$date.".txt","a") or die("Unable to open file!");
		$data1 = $rec1['indnr'];
		$data2 = $rec1['kode_obat'];
		$data3a = strpos($rec1['qty'],'.');
		$data3b = strpos($rec1['qty'],',');
		$data4 = str_replace("-","",$rec1['tanggal']);
		$data5 = $rec1['unit_obat'].'   ';
		if($data3a==''){
			if($data3b==''){
				$data3 = '000000000000000'.$rec1['qty'].'00';
			}else{
				$data3 = '000000000000000'.number_format((float)$rec1['qty'], 2, '', '');
			}
		}else{
			$data3 = '000000000000000'.number_format((float)$rec1['qty'], 2, '', '');
		}
		$content = $data1.$data2.substr($data3,-8).substr($data5,0,3).$data4."\n";
		if($data1 != ''){
			fwrite($fp,$content);
			fclose($fp);
			fwrite($fp1,$content);
			fclose($fp1);
			$id_trx_pengobatan = $rec1['id_trx_pengobatan'];
            $queryUpdate=mysqli_query($link,"UPDATE trx_pengobatan SET status_release='1' WHERE id_trx_pengobatan=$id_trx_pengobatan");
            mysqli_query($link,$queryUpdate);
            
            $queryInsert=mysqli_query($link,"INSERT INTO trx_release(id_trx_pengobatan,nomor_release) VALUE('$id_trx_pengobatan','$noRelease')");
            $Insert = mysqli_query($link,$queryInsert);
            $sukses+=1;
		}else{
			fclose($fp);
			fclose($fp1);
            $gagal+=1;
		}
    }
    echo "Sukses ".$sukses."\n";
    echo "Gagal ".$gagal;
?>