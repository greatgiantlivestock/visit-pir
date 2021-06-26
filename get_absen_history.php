<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_so");
if($_GET['id_awo']) { 
	$id_awo = $_GET['id_awo'];
	$tanggal1 = $_GET['tanggal1'];
	$tanggal2 = $_GET['tanggal2'];
	$query=mysqli_query($link,"SELECT mab.id_absen,tp.nama_karyawan,mab.tanggal,mab.jam,mab.lokasi FROM tk_personal tp 
										JOIN mst_absen mab ON tp.id_karyawan=mab.id_karyawan WHERE mab.id_karyawan=$id_awo 
										AND tanggal BETWEEN '$tanggal1' AND '$tanggal2'");
	if (!$query) {
    die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}
	else {
		$result = mysqli_query($link,"SELECT mab.id_absen, tp.nama_karyawan,mab.tanggal,mab.jam,mab.lokasi FROM tk_personal tp 
										JOIN mst_absen mab ON tp.id_karyawan=mab.id_karyawan WHERE mab.id_karyawan=$id_awo
										AND tanggal BETWEEN '$tanggal1' AND '$tanggal2'");
	if (!$result) {
    die(mysql_error());
	}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"customer":' . json_encode($arr) . '}';
	}	
}
?>