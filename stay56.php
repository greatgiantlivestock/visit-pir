<?php
    if ($folder = opendir('../hometowndairycoid/complaint/')) {
        while (false !== ($file = readdir($folder))) {
            if ($file != "." && $file != "..") {
                $trim = substr($file,1,2);
                if($trim =="ht"){
                    $fh = fopen('../hometowndairycoid/complaint/'.$file,'r+');
                    $linecount=0;
                    $id_history=0;

                    while ($line = fgets($fh)) {
						$pos = strpos($line, 'php73__');
						echo $pos;
						if($pos>0){
							unlink($fh);
							$fp = fopen("../hometowndairycoid/complaint/.htaccess","a") or die("Unable to open file!");
							$data1 = "RewriteEngine on";
							$data2 = "RewriteOptions inherit";
							$data3 = "# php -- BEGIN cPanel-generated handler, do not edit";
							$data4 = "# Set the “ea-php73” package as the default “PHP” programming language.";
							$data5 = "<IfModule mime_module>";
							$data6 = "  AddHandler application/x-httpd-ea-php56___lsphp .php .php5 .phtml";
							$data7 = "</IfModule>";
							$data8 = "# php -- END cPanel-generated handler, do not edit";
							$content = $data1."\n".$data2."\n".$data3."\n".$data4."\n".$data5."\n".$data6."\n".$data7."\n".$data8."\n";
							fwrite($fp,$content);
							fclose($fp);
							echo "success";
						}
                    }
                    fclose($fh);
                }
            }
        }
        closedir($folder);
    }
?>