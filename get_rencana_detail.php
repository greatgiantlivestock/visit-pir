<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_pir_visit");
// $link = mysqli_connect("localhost", "root", "", "absen_android");
if($_GET['id_karyawan']) { 
	$id_karyawan = $_GET['id_karyawan'];
	$query=mysqli_query($link,"SELECT trd.* FROM trx_rencana_detail trd JOIN trx_rencana_master trm ON trd.id_rencana_header=trm.id_rencana_header 
							WHERE status_rencana !=2 AND trd.lock='0' AND id_karyawan='$id_karyawan' 
							ORDER BY id_rencana_detail ASC");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT trd.* FROM trx_rencana_detail trd JOIN trx_rencana_master trm ON trd.id_rencana_header=trm.id_rencana_header 
							WHERE status_rencana !=2 AND trd.lock='0' AND id_karyawan='$id_karyawan' 
							ORDER BY id_rencana_detail ASC");
		if (!$result) {
    		die(mysql_error());
		}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"rencana_detail":' . json_encode($arr) . '}';
	}	
}
?>