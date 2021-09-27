<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_pir_visit");
if($_GET['id_rencana_detail']) { 
	$id_rencana_detail = $_GET['id_rencana_detail'];
	$query=mysqli_query($link,"SELECT * FROM trx_checkin WHERE id_rencana_detail ='$id_rencana_detail'");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT * FROM trx_checkin WHERE id_rencana_detail ='$id_rencana_detail'");
		if (!$result) {
    		die(mysql_error());
		}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"trx_checkin":' . json_encode($arr) . '}';
	}	
}
?>