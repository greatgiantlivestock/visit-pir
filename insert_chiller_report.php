<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_Visit PIR");
if(isset($_FILES['image_1'])){
	$mosConfigfoldername = "/"; 
	// $file_path = $_SERVER['DOCUMENT_ROOT'] . $mosConfigfoldername . "/upload/chiller_report/".basename($_FILES['image_1']['name']); 
	$file_path = "./upload/chiller_report/".basename($_FILES['image_1']['name']); 
	if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) { 
		$id_staff = $_POST['id_staff'];
		$keterangan = $_POST['keterangan']; 
		
		$foto1 = $_POST['foto1']; 
        
		$query = "INSERT INTO md_chiller (foto_chiller,suhu,id_rencana_detail) 
					 VALUES ('$foto1','$keterangan','$id_staff') ";
		$insert = mysqli_query($link,$query) or die("Error, insert query failed : $query ");

        if ($insert) {
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