<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_salestrax");
if(isset($_FILES['image_1'])){
	$mosConfigfoldername = "/"; 
	// $file_path = $_SERVER['DOCUMENT_ROOT'] . $mosConfigfoldername . "/upload/checkin/".basename($_FILES['image_1']['name']); 
	$file_path = "./upload/checkin/".basename($_FILES['image_1']['name']); 
	if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) { 		
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
?>