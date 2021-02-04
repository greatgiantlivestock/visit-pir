<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir");
// $link = mysqli_connect("localhost", "root", "", "absen_android");
if($_GET['id_karyawan']) { 
	$id_karyawan = $_GET['id_karyawan'];
	$query=mysqli_query($link,"SELECT * FROM trx_rencana_master WHERE id_user_input_rencana='$id_karyawan'");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT * FROM trx_rencana_master WHERE id_user_input_rencana='$id_karyawan'");
		if (!$result) {
    		die(mysql_error());
		}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"rencana_master":' . json_encode($arr) . '}';
	}	
}
?>