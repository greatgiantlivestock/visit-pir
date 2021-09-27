<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_pir_visit");
	$query=mysqli_query($link,"SELECT id,indnr,lifnr,beastid,vistgid FROM trans_index WHERE beastid <>''");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT id,indnr,lifnr,beastid,vistgid FROM trans_index WHERE beastid <>''");
	if (!$result) {
    die(mysql_error());
	}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"data_sapi":' . json_encode($arr) . '}';
	}	
?>