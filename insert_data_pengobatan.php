<?php
date_default_timezone_set("Asia/Bangkok");
$link = mysqli_connect(""localhost"", "u1076725_ms", "moha11mmad", "u1076725_visit-pir-dev");
if(isset($_FILES['image_pengobatan'])){
	$mosConfigfoldername = "/"; 
	$file_path = "./upload/pengobatan/".basename($_FILES['image_pengobatan']['name']); 
	if (move_uploaded_file($_FILES['image_pengobatan']['tmp_name'], $file_path)) {
		$id_rencana_detail = $_POST['id_rencana_detail']; 
		$kode_obat = $_POST['kode_obat']; 
		$qty = $_POST['qty'];  
		$foto = $_POST['foto_pengobatan']; 
		$tanggal = $_POST['tanggal'];
		
		$query = "INSERT INTO trx_pengobatan(id_rencana_detail,kode_obat,qty,foto,tanggal) 
					VALUES ('$id_rencana_detail','$kode_obat','$qty','$foto','$tanggal')";
		$insert1 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");

		if ($insert1) {
			$response = array('error' => 'False');
			echo json_encode($response);	
		} else{
			$response = array('error' => 'True');
			echo json_encode($response);
		}  
		
	} else{
		$response = array('error' => 'True');
		echo json_encode($response);
	} 
} else{
	$response = array('error' => 'True');
		echo json_encode($response);
}
?>