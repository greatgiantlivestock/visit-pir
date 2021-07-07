<?php
    if ($folder = opendir('../interface/From/')) {
        while (false !== ($file = readdir($folder))) {
            if ($file != "." && $file != "..") {
                $trim = substr($file,0,2);
                if($trim =="DP"){
                    $fh = fopen('../interface/From/'.$file,'r');
                    $linecount=0;

                    while ($line = fgets($fh)) {
                        if(strlen($line)>55) {
                            $cn = mysqli_connect("localhost","u1076725_ms","moha11mmad","u1076725_visit-pir-dev");
                            $matnr = substr($line,0,15);
                            $nama = substr($line,15,40);
                            $satuan = substr($line,55,3);
                            
                            $cekjml = "SELECT count(*) as jml FROM mst_obat WHERE kode_obat='$matnr'";
                            $countjml = mysqli_query($cn,$cekjml);
                            $row = mysqli_fetch_assoc($countjml);
                            $jml = $row['jml'];
                            if($jml == 0){
                                $sql = "INSERT INTO mst_obat(kode_obat,nama_obat,unit_obat)
                                        values ('$matnr','$nama','$satuan')";
                                $result1 = mysqli_query($cn,$sql);
                                $linecount++;
                            }else if ($jml > 0){
                                $sql1 = "UPDATE mst_obat SET nama_obat='$nama',unit_obat='$satuan' WHERE kode_obat='$matnr'";
                                $result = mysqli_query($cn,$sql1);
                                $linecount++;
                            }else{
                                echo "ada yang gagal";
                            }
                            // if ($result1) {
                            //     $linecount++;
                            // }  
                            // if ($result1) {
                            //     $linecount1++;
                            // }   
                        } 
                    }

                    if(!$linecount==0){
                        echo "success";
                        $sebelum = "../interface/From/".$file;
                        $sesudah = "../interface/Backup/".$file;
                        echo copy($sebelum, $sesudah);

                        if (!copy($sebelum, $sesudah)) {
                            echo " File gagal dipindahkan di folder backup";
                        }else{
                            unlink($sebelum);
                            echo " File berhasil dipindahkan ke folder backup.";
                        }
                    }
                    fclose($fh);
                }
            }
        }
        closedir($folder);
    }
?>