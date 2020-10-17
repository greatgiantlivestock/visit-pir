<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_salestrax");
// $link = mysqli_connect("localhost", "root", "", "absen_android");
if($_GET['id_user']) { 
	$id_user = $_GET['id_user'];
	$tanggal1 = $_GET['tanggal1'];
	$tanggal2 = $_GET['tanggal2'];
	$query=mysqli_query($link,"SELECT * FROM ((SELECT mc.nama_customer,trm.nomor_rencana,mc.alamat,
							   ckin.tanggal_checkin,ckout.tanggal_checkout FROM trx_checkin ckin JOIN trx_checkout ckout 
							   ON ckin.id_checkin = ckout.id_checkin JOIN mst_customer mc 
							   ON mc.kode_customer=ckin.kode_customer JOIN trx_rencana_master trm 
							   ON trm.id_rencana_header = ckin.id_rencana_header 
							   WHERE ckout.id_user = '$id_user' AND ckout.tanggal_checkout BETWEEN '$tanggal1 00:00:00' 
							   AND '$tanggal2 23:59:59')
							   UNION
							   (SELECT tmp.nama_customer,trm.nomor_rencana,tmp.alamat,ckin.tanggal_checkin,
							   ckout.tanggal_checkout FROM trx_checkin ckin JOIN trx_checkout ckout 
							   ON ckin.id_checkin = ckout.id_checkin JOIN tmp_customer tmp 
							   ON tmp.kode_customer=ckin.kode_customer JOIN trx_rencana_master trm 
							   ON trm.id_rencana_header = ckin.id_rencana_header 
							   WHERE ckout.id_user = '$id_user' AND ckout.tanggal_checkout BETWEEN '$tanggal1 00:00:00' 
							   AND '$tanggal2 23:59:59')) AS union_");
	if (!$query) {
    die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}
	else {
		$result = mysqli_query($link,"SELECT * FROM ((SELECT mc.nama_customer,trm.nomor_rencana,mc.alamat,
							   ckin.tanggal_checkin,ckout.tanggal_checkout FROM trx_checkin ckin JOIN trx_checkout ckout 
							   ON ckin.id_checkin = ckout.id_checkin JOIN mst_customer mc 
							   ON mc.kode_customer=ckin.kode_customer JOIN trx_rencana_master trm 
							   ON trm.id_rencana_header = ckin.id_rencana_header 
							   WHERE ckout.id_user = '$id_user' AND ckout.tanggal_checkout BETWEEN '$tanggal1 00:00:00' 
							   AND '$tanggal2 23:59:59')
							   UNION
							   (SELECT tmp.nama_customer,trm.nomor_rencana,tmp.alamat,ckin.tanggal_checkin,
							   ckout.tanggal_checkout FROM trx_checkin ckin JOIN trx_checkout ckout 
							   ON ckin.id_checkin = ckout.id_checkin JOIN tmp_customer tmp 
							   ON tmp.kode_customer=ckin.kode_customer JOIN trx_rencana_master trm 
							   ON trm.id_rencana_header = ckin.id_rencana_header 
							   WHERE ckout.id_user = '$id_user' AND ckout.tanggal_checkout BETWEEN '$tanggal1 00:00:00' 
							   AND '$tanggal2 23:59:59')) AS union_");
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