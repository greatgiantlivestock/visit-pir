<?php
date_default_timezone_set("Asia/Bangkok");
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir");
if(isset($_FILES['image_1'])){
	$mosConfigfoldername = "/"; 
	$file_path = "./upload/data_sapi/".basename($_FILES['image_1']['name']); 
	if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) {
		$id_rencana_detail = $_POST['id_rencana_detail']; 
		$eartag = $_POST['eratag1']; 
		$keterangan = $_POST['keterangan1']; 
		$assessment = $_POST['assessment']; 
		$foto = $_POST['foto1']; 
		$tanggal = $_POST['tanggal'];
		
		$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
					VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
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