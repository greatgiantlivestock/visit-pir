<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_Visit PIR");

	$query=mysqli_query($link,"SELECT * FROM news ORDER BY id_news");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		//$result = mysqli_query($link,"SELECT * FROM trx_rencana_detail trd JOIN trx_rencana_master trm ON 
		//						trd.id_rencana_header=trm.id_rencana_header WHERE trd.id_karyawan='$id_karyawan' AND status_rencana='0'");
		$result = mysqli_query($link,"SELECT * FROM news ORDER BY id_news");
		if (!$result) {
    		die(mysql_error());
		}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"news":' . json_encode($arr) . '}';
	}	
?>