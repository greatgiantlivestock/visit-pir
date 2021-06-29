<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir-dev");
// $link = mysqli_connect("localhost", "root", "", "absen_android");
// if($_GET['id_wilayah']) { 
	$name1=$_GET['id_user'];
		$query=mysqli_query($link,"SELECT * FROM (SELECT lifnr,name1,desa,veraa_user,indnr FROM(SELECT MAX(id_history) AS maxid, indnr,lifnr,veraa_user,name1,desa 
		FROM trans_index GROUP BY lifnr)as dt1 UNION ALL SELECT lifnr,name1,desa,veraa_user,indnr FROM trans_indexp GROUP BY lifnr) as data_final JOIN mst_user mu ON mu.nama_karyawan=data_final.veraa_user WHERE id_user='$name1'");
	if (!$query) {
    	die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}else {
		$result = mysqli_query($link,"SELECT * FROM (SELECT lifnr,name1,desa,veraa_user,indnr FROM(SELECT MAX(id_history) AS maxid, indnr,lifnr,veraa_user,name1,desa 
		FROM trans_index GROUP BY lifnr)as dt1 UNION ALL SELECT lifnr,name1,desa,veraa_user,indnr FROM trans_indexp GROUP BY lifnr) as data_final JOIN mst_user mu ON mu.nama_karyawan=data_final.veraa_user WHERE id_user='$name1'");
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