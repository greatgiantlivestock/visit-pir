<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir-dev");
if($_GET['id_user']) { 
	$id_user = $_GET['id_user'];
	$tanggal1 = $_GET['tanggal1'];
	$tanggal2 = $_GET['tanggal2'];
	$query=mysqli_query($link,"SELECT mc.name1,trm.nomor_rencana,mc.desa,
					ckin.tanggal_checkin,ckout.tanggal_checkout,ckout.id_rencana_detail FROM trx_checkin ckin JOIN trx_checkout ckout 
					ON ckin.id_rencana_detail = ckout.id_rencana_detail JOIN trx_rencana_detail mc 
					ON mc.id_customer=ckin.id_customer JOIN trx_rencana_master trm 
					ON trm.id_rencana_header = ckin.id_rencana_header 
					WHERE ckout.id_user = '$id_user' AND ckout.tanggal_checkout BETWEEN '$tanggal1 00:00:00' 
					AND '$tanggal2 23:59:59' GROUP BY ckout.id_rencana_detail
					UNION ALL
					SELECT mc.name1,trm.nomor_rencana,mc.desa,
					ckin.tanggal_checkin,ckout.tanggal_checkout,ckout.id_rencana_detail FROM trx_checkin ckin JOIN trx_checkout ckout 
					ON ckin.id_rencana_detail = ckout.id_rencana_detail JOIN trans_indexp mc 
					ON mc.lifnr=ckin.id_customer JOIN trx_rencana_master trm 
					ON trm.id_rencana_header = ckin.id_rencana_header 
					WHERE ckout.id_user = '$id_user' AND ckout.tanggal_checkout BETWEEN '$tanggal1 00:00:00' 
					AND '$tanggal2 23:59:59' GROUP BY ckout.id_rencana_detail");
	if (!$query) {
    die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}
	else {
		$result = mysqli_query($link,"SELECT mc.name1,trm.nomor_rencana,mc.desa,
							ckin.tanggal_checkin,ckout.tanggal_checkout,ckout.id_rencana_detail FROM trx_checkin ckin JOIN trx_checkout ckout 
							ON ckin.id_rencana_detail = ckout.id_rencana_detail JOIN trx_rencana_detail mc 
							ON mc.id_customer=ckin.id_customer JOIN trx_rencana_master trm 
							ON trm.id_rencana_header = ckin.id_rencana_header 
							WHERE ckout.id_user = '$id_user' AND ckout.tanggal_checkout BETWEEN '$tanggal1 00:00:00' 
							AND '$tanggal2 23:59:59' GROUP BY ckout.id_rencana_detail
							UNION ALL
							SELECT mc.name1,trm.nomor_rencana,mc.desa,
							ckin.tanggal_checkin,ckout.tanggal_checkout,ckout.id_rencana_detail FROM trx_checkin ckin JOIN trx_checkout ckout 
							ON ckin.id_rencana_detail = ckout.id_rencana_detail JOIN trans_indexp mc 
							ON mc.lifnr=ckin.id_customer JOIN trx_rencana_master trm 
							ON trm.id_rencana_header = ckin.id_rencana_header 
							WHERE ckout.id_user = '$id_user' AND ckout.tanggal_checkout BETWEEN '$tanggal1 00:00:00' 
							AND '$tanggal2 23:59:59' GROUP BY ckout.id_rencana_detail");
	if (!$result) {
    die(mysql_error());
	}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"canvassing":' . json_encode($arr) . '}';
	}	
}
?>