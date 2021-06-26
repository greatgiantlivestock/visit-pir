<?php
    if ($folder = opendir('../interface/Backup/')) {
        while (false !== ($file = readdir($folder))) {
            if ($file != "." && $file != "..") {
                $trim = substr($file,0,2);
                if($trim =="PR"){
                    $fh = fopen('../interface/Backup/'.$file,'r');
                    $linecount=0;
                    $linecount1=0;
                    $linecountgagal=0;

                    while ($line = fgets($fh)) {
                        if(strlen($line)>70) {
                            $cn = mysqli_connect("localhost","u1076725_ms","moha11mmad","u1076725_visit-pir-dev");
                            $indnr=substr($line,0,8);
                            $lifnr=substr($line,8,18);
                            $name1=substr($line,18,53);
                            $prtype=substr($line,53,61);
                            $regdate=substr($line,61,69);
                            $desa=substr($line,69,104);
                            $veraa_user=substr($line,104,116);
                            $beastid=substr($line,116,128);
                            $vistgid=substr($line,128,138);
                            $lotid=substr($line,138,148);
                            $sexdesc=substr($line,148,173);
                            $bredesc=substr($line,173,198);
                            $catdesc=substr($line,198,228);
                            $status_pir=substr($line,228,230);
                            $id_history = 0;
                            $Chostory = "SELECT max(id_history)as mtid FROM trans_index";
                            $exChstry = mysqli_query($cn,$Chostory);
                            while($row =$exChstry-> fetch_assoc()){
                                $id_history = $row['mtid']+1; 
                            }
                            
                            $sql = "INSERT INTO trans_index1(id_history,indnr,lifnr,name1,prtype,regdate,desa,veraa_user,beastid,vistgid,lotid,sexdesc,bredesc,catdesc,status_pir)
                                    values ($id_history,'$indnr','$lifnr','$name1','$prtype','$regdate','$desa','$veraa_user','$beastid','$vistgid','$lotid','$sexdesc','$bredesc','$catdesc','$status_pir')";
                            $result = mysqli_query($cn,$sql);
                            
                            if ($result) {
                                $linecount++;
                            }  
                        } 
                    }

                    if(!$linecount==0){
                        echo "success";
                        $sebelum = "../interface/Backup/".$file;
                        $sesudah = "../interface/Backup2/".$file;
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