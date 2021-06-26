<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir-dev");
	$query=mysqli_query($link,"SELECT ti.id,ti.indnr,ti.lifnr,ti.beastid,ti.vistgid 
					FROM trans_index ti JOIN(SELECT MAX(id_history)AS id_history,lifnr FROM trans_index 
					GROUP BY lifnr)AS dataMax ON dataMax.id_history=ti.id_history AND dataMax.lifnr=ti.lifnr");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT ti.id,ti.indnr,ti.lifnr,ti.beastid,ti.vistgid 
					FROM trans_index ti JOIN(SELECT MAX(id_history)AS id_history,lifnr FROM trans_index 
					GROUP BY lifnr)AS dataMax ON dataMax.id_history=ti.id_history AND dataMax.lifnr=ti.lifnr");
	if (!$result) {
    die(mysql_error());
	}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"data_sapi":' . json_encode($arr) . '}';
	}	
?>