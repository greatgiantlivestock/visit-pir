<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_Visit PIR");
// $link = mysqli_connect("localhost", "root", "", "homt3248_salestra");
	$query=mysqli_query($link,"SELECT * FROM do_gantung");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT * FROM do_gantung");
		if (!$result) {
			die(mysql_error());
		}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"do":' . json_encode($arr) . '}';
	}	
?>