<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir");
// $link = mysqli_connect("localhost", "root", "", "absen_android");
// if($_GET['id_wilayah']) { 
// 	$id_wilayah=$_GET['id_wilayah'];
	$query=mysqli_query($link,"SELECT lifnr,name1,desa,veraa_user FROM trans_index GROUP BY lifnr");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT lifnr,name1,desa,veraa_user FROM trans_index GROUP BY lifnr");
	if (!$result) {
    die(mysql_error());
	}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"customer":' . json_encode($arr) . '}';
	}	
// }
?>