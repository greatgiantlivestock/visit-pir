<?php
    if ($folder = opendir('../interface/From/')) {
        while (false !== ($file = readdir($folder))) {
            if ($file != "." && $file != "..") {
                $trim = substr($file,0,2);
                if($trim =="PP"){
                    $fh = fopen('../interface/From/'.$file,'r');
                    $linecount=0;
                    $linecount1=0;
                    $linecountgagal=0;

                    $cn = mysqli_connect("localhost","u1076725_ms","moha11mmad","u1076725_visit-pir-dev");
                    $sqlTrc = "TRUNCATE mst_pakan";
                    $execTrc = mysqli_query($cn,$sqlTrc);

                    while ($line = fgets($fh)) {
                        if(strlen($line)>187) {
                            $INDNR = substr($line,0,8);
                            $PIR_TYPE = substr($line,8,3);
                            $STATUS = substr($line,11,2);
                            $NOFANIM = substr(substr($line,13,15),-15,-2);
                            $DOF = substr(substr($line,28,15),-15,-2);
                            $PAKAN_TYPE = substr($line,43,3);
                            $STD = substr(substr($line,46,15),-15,-2);
                            $SATUAN = substr($line,61,3);
                            $BUDGET = substr(substr($line,64,15),-15,-2);
                            $TERKIRIM = substr(substr($line,79,15),-15,-2);
                            $SISA = substr(substr($line,94,15),-15,-2);
                            $TGL_KIRIM = substr($line,109,8);
                            $KODE = substr($line,117,15);
                            $DESCRIPTION = substr($line,132,40);
                            $QTY_TERIMA = substr(substr($line,172,15),-15,-2);
                            $DATE_CREATED = date("Y-m-d H:i:s");
                            
                                $sql = "INSERT INTO mst_pakan(indnr,kode_pakan,desc_pakan,std,budget,terkirim,sisa,pir_type,pir_status,nofanim,dof,pakan_type,satuan,tanggal_kirim,qty_terima,created_date)
                                        values ('$INDNR','$KODE','$DESCRIPTION','$STD','$BUDGET','$TERKIRIM','$SISA','$PIR_TYPE','$STATUS','$NOFANIM','$DOF','$PAKAN_TYPE','$SATUAN','$TGL_KIRIM','$QTY_TERIMA','$DATE_CREATED')";
                                $result = mysqli_query($cn,$sql);
                            if ($result) {
                                $linecount++;
                            }   
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