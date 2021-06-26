<?php
	$name1 = $_GET['id_user'];
	$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir-dev");
	$query=mysqli_query($link,"SELECT mp.* FROM mst_pakan mp JOIN (SELECT MAX(id_history) AS maxid, indnr,lifnr,veraa_user FROM trans_index GROUP BY lifnr) AS dt1 ON dt1.indnr=mp.indnr JOIN mst_user mu ON mu.nama_karyawan=dt1.veraa_user WHERE id_user='$name1'");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT mp.* FROM mst_pakan mp JOIN (SELECT MAX(id_history) AS maxid, indnr,lifnr,veraa_user FROM trans_index GROUP BY lifnr) AS dt1 ON dt1.indnr=mp.indnr JOIN mst_user mu ON mu.nama_karyawan=dt1.veraa_user WHERE id_user='$name1'");
		if (!$result) {
    		die(mysql_error());
		}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"mst_pakan":' . json_encode($arr) . '}';
	}	
?>