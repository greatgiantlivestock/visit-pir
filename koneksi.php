<?php
$server = "localhost"; 
$username = "root";  
$password = ""; 
$database = "homt3248_so";

$konek = mysql_connect($server, $username, $password) or die ("Gagal konek ke server MySQL" .mysql_error());
$bukadb = mysql_select_db($database) or die ("Gagal membuka database $database" .mysql_error());

date_default_timezone_set("Asia/Bangkok");
//Asia/Kuala_Lumpur

$mosConfigfoldername = '/android_canvassing';
?>