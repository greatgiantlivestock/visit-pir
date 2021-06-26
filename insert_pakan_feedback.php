<?php
date_default_timezone_set("Asia/Bangkok");
$link = mysqli_connect(""localhost"", "u1076725_ms", "moha11mmad", "u1076725_visit-pir-dev");
if(isset($_FILES['image_1'])){
	$mosConfigfoldername = "/"; 
	$file_path = "./upload/pakan/".basename($_FILES['image_1']['name']); 
	if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) {
		$id_rencana_detail = $_POST['id_rencana_detail']; 
		$feedback = $_POST['feedback']; 
		$foto = $_POST['foto1']; 
		
		$query = "INSERT INTO trx_feedback_pakan (id_rencana_detail,feedback_pakan,foto) 
					VALUES ('$id_rencana_detail','$feedback','$foto') ";
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