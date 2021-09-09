<?php
// $link = mysqli_connect("localhost", "root", "", "homt3248_so");
// if(isset($_FILES['image_1'])){
// 	$mosConfigfoldername = "/Visit PIR"; 
// 	$file_path = $_SERVER['DOCUMENT_ROOT'] . $mosConfigfoldername . "/upload/display_report/".basename($_FILES['image_1']['name']); 
// 	if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) { 
// 		$id_staff = $_POST['id_staff'];

// 		if(isset($_FILES['image_2'])){
// 			$mosConfigfoldername = "/Visit PIR";
// 			$file_path = $_SERVER['DOCUMENT_ROOT'] . $mosConfigfoldername . "/upload/display_report/".basename($_FILES['image_2']['name']); 
// 			if(move_uploaded_file($_FILES['image_2']['tmp_name'], $file_path)){
// 				if(isset($_FILES['image_3'])){
// 					$mosConfigfoldername = "/Visit PIR";
// 					$file_path = $_SERVER['DOCUMENT_ROOT'] . $mosConfigfoldername . "/upload/display_report/".basename($_FILES['image_3']['name']); 
// 					move_uploaded_file($_FILES['image_3']['tmp_name'], $file_path); 		
// 				}
// 			} 		
// 		}else if(isset($_FILES['image_3'])){
// 			$mosConfigfoldername = "/Visit PIR";
// 			$file_path = $_SERVER['DOCUMENT_ROOT'] . $mosConfigfoldername . "/upload/display_report/".basename($_FILES['image_3']['name']); 
// 			move_uploaded_file($_FILES['image_3']['tmp_name'], $file_path); 		
// 		}
// 	} 
// 	$keterangan = $_POST['keterangan1'];
// 	$keterangan1 = $_POST['keterangan2'];
// 	$keterangan2 = $_POST['keterangan3'];
	
// 	$foto1 = $_POST['foto1'];
// 	$foto2 = $_POST['foto2'];
// 	$foto3 = $_POST['foto3'];
	
		
// 	$query = "INSERT INTO md_display (foto_display,foto_display1,foto_display2,keterangan_display,keterangan_display1,keterangan_display2,id_rencana_detail) 
// 						VALUES ('$foto1','$foto2','$foto3','$keterangan','$keterangan1','$keterangan2','$id_staff') ";
// 	$insert = mysqli_query($link,$query) or die("Error, insert query failed : $query ");

// 	if ($insert) {
// 		$response = array('error' => 'False');
// 		echo json_encode($response);	
// 	} else{
// 		$response = array('error' => 'True');
// 		echo json_encode($response);
// 	}  
// } else{
// 	$response = array('error' => 'True');
// 		echo json_encode($response);
// }

$link = mysqli_connect("localhost", "root", "", "homt3248_Visit PIR");
if(isset($_FILES['image_1'])){
	$mosConfigfoldername = "/"; 
	// $file_path = $_SERVER['DOCUMENT_ROOT'] . $mosConfigfoldername . "/upload/display_report/".basename($_FILES['image_1']['name']); 
	$file_path = "./upload/display_report/".basename($_FILES['image_1']['name']); 
	if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) { 
		$id_staff = $_POST['id_staff'];
		$keterangan = $_POST['keterangan']; 
		
		$foto1 = $_POST['foto1']; 
        
		$query = "INSERT INTO md_display (foto_display,keterangan_display,id_rencana_detail) 
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