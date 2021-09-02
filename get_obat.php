<?php
	$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_pir_visit");
	$query=mysqli_query($link,"SELECT * FROM mst_obat");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT * FROM mst_obat");
		if (!$result) {
    		die(mysql_error());
		}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"mst_obat":' . json_encode($arr) . '}';
	}	
?>