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

                    $cn = mysqli_connect("localhost","u1076725_ms","moha11mmad","u1076725_pir_visit");
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
                            $PAKAN_TYPE_DESC = substr($line,46,40);
                            $STD = substr(substr($line,86,15),-15,-2);
                            $SATUAN = substr($line,101,3);
                            $BUDGET = substr(substr($line,104,15),-15,-2);
                            $TERKIRIM = substr(substr($line,119,15),-15,-2);
                            // $SISA = substr(substr($line,134,15),-15,-2);
                            $TGL_KIRIM = substr($line,134,8);
                            $KODE = substr($line,142,15);
                            $DESCRIPTION = substr($line,157,40);
                            $QTY_TERIMA = substr(substr($line,197,15),-15,-2);
                            $DATE_CREATED = date("Y-m-d H:i:s");
                            
                                $sql = "INSERT INTO mst_pakan(indnr,kode_pakan,desc_pakan,std,budget,terkirim,pir_type,pir_status,nofanim,dof,pakan_type,satuan,tanggal_kirim,qty_terima,created_date,pakan_type_desc)
                                        values ('$INDNR','$KODE','$DESCRIPTION','$STD','$BUDGET','$TERKIRIM','$PIR_TYPE','$STATUS','$NOFANIM','$DOF','$PAKAN_TYPE','$SATUAN','$TGL_KIRIM','$QTY_TERIMA','$DATE_CREATED','$PAKAN_TYPE_DESC')";
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