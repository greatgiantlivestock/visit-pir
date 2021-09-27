<?php
    if ($folder = opendir('../interface/Backup/')) {
        while (false !== ($file = readdir($folder))) {
            if ($file != "." && $file != "..") {
                $trim = substr($file,0,2);
                if($trim =="PR"){
                    $fh = fopen('../interface/Backup/'.$file,'r');
                    $linecount=0;
                    $id_history=0;
                    // $linecountgagal=0;

                    $cn = mysqli_connect("localhost","u1076725_ms","moha11mmad","u1076725_pir_visit");
                    $sqlTrc = "TRUNCATE trans_index";
                    $execTrc = mysqli_query($cn,$sqlTrc);

                    while ($line = fgets($fh)) {
                        if(strlen($line)>100) {
                            $indnr=substr($line,0,8);
                            $lifnr=substr($line,8,10);
                            $name1=substr($line,18,35);
                            $prtype=substr($line,53,8);
                            $regdate=substr($line,61,8);
                            $desa=substr($line,69,35);
                            $veraa_user=substr($line,104,12);
                            $beastid=substr($line,116,12);
                            $vistgid=substr($line,128,10);
                            $lotid=substr($line,138,10);
                            $sexdesc=substr($line,148,25);
                            $bredesc=substr($line,173,25);
                            $catdesc=substr($line,198,30);
                            $status_pir=substr($line,228,2);
                            if($id_history==0){
                                $Chostory = "SELECT max(id_history)as mtid FROM trans_index";
                                $exChstry = mysqli_query($cn,$Chostory);
                                while($row =$exChstry-> fetch_assoc()){
                                    $id_history = $row['mtid']+1; 
                                }
                            }
                            
                            $sql = "INSERT INTO trans_index(id_history,indnr,lifnr,name1,prtype,regdate,desa,veraa_user,beastid,vistgid,lotid,sexdesc,bredesc,catdesc,status_pir)
                                    values ($id_history,'$indnr','$lifnr','$name1','$prtype','$regdate','$desa','$veraa_user','$beastid','$vistgid','$lotid','$sexdesc','$bredesc','$catdesc','$status_pir')";
                            $result = mysqli_query($cn,$sql);
                            
                            if ($result) {
                                $linecount++;
                            }  
                        } 
                    }

                    // $cn1 = mysqli_connect("localhost","u1076725_ms","moha11mmad","u1076725_pir_visit");
                    // $Chostory = "SELECT max(id_history)as mtid FROM trans_index";
                    // $exChstry = mysqli_query($cn1,$Chostory);
                    // while($row =$exChstry-> fetch_assoc()){
                    //     $id_history = $row['mtid']+1; 
                    // }

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