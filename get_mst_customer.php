<?php
$link = mysqli_connect(""localhost"", "root", "", "homt3248_salestrax");
// $link = mysqli_connect(""localhost"", "root", "", "absen_android");
if($_GET['id_wilayah']) { 
	$id_wilayah=$_GET['id_wilayah'];
	$query=mysqli_query($link,"SELECT * from mst_customer WHERE id_wilayah='$id_wilayah' OR id_wilayah='0'");
	if (!$query) {
    die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}
	else {
		$result = mysqli_query($link,"SELECT * from mst_customer WHERE id_wilayah='$id_wilayah' OR id_wilayah='0'");
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