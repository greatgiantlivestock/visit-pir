<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_salestrax");
	$query=mysqli_query($link,"SELECT * FROM mst_product");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT * FROM mst_product");
		if (!$result) {
			die(mysql_error());
		}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"product":' . json_encode($arr) . '}';
	}	
?>