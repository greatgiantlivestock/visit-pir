<?php
$link = mysqli_connect(""localhost"", "root", "", "homt3248_salestrax");
// $link = mysqli_connect(""localhost"", "root", "", "absen_android");
if($_GET['id_karyawan']) { 
	$id_karyawan = $_GET['id_karyawan'];
	$query=mysqli_query($link,"SELECT mst_kegiatan.* FROM mst_kegiatan JOIN mst_user 
	ON mst_kegiatan.id_departemen=mst_user.id_departemen WHERE mst_user.id_karyawan=$id_karyawan");
	if (!$query) {
    die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}
	else {
		$result = mysqli_query($link,"SELECT mst_kegiatan.* FROM mst_kegiatan JOIN mst_user 
	ON mst_kegiatan.id_departemen=mst_user.id_departemen WHERE mst_user.id_karyawan=$id_karyawan");
	if (!$result) {
    die(mysql_error());
	}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"kegiatan":' . json_encode($arr) . '}';
	}	
}
?>