<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir");
if(isset($_FILES['image_1'])){
	if(isset($_FILES['image_2'])){
		if(isset($_FILES['image_3'])){
			if(isset($_FILES['image_4'])){
				$mosConfigfoldername = "/"; 
				$file_path1 = "./upload/data_sapi/".basename($_FILES['image_1']['name']); 
				$file_path2 = "./upload/data_sapi/".basename($_FILES['image_2']['name']); 
				$file_path3 = "./upload/data_sapi/".basename($_FILES['image_3']['name']); 
				$file_path4 = "./upload/data_sapi/".basename($_FILES['image_4']['name']); 
				if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path1)) {
					if (move_uploaded_file($_FILES['image_2']['tmp_name'], $file_path2)) {
						if (move_uploaded_file($_FILES['image_3']['tmp_name'], $file_path3)) {
							if (move_uploaded_file($_FILES['image_4']['tmp_name'], $file_path4)) {
								$id_rencana_detail = $_POST['id_rencana_detail']; 
								$eartag = $_POST['eratag4']; 
								$keterangan = $_POST['keterangan4']; 
								$assessment = $_POST['assessment']; 
								$foto = $_POST['foto4']; 
								$tanggal = date('Y-m-d H-i-s'); 
								
								$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
											VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
								$insert4 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");
							}
							$id_rencana_detail = $_POST['id_rencana_detail']; 
							$eartag = $_POST['eratag3']; 
							$keterangan = $_POST['keterangan3']; 
							$assessment = $_POST['assessment']; 
							$foto = $_POST['foto3']; 
							$tanggal = date('Y-m-d H-i-s'); 
							
							$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
										VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
							$insert3 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");
						}
						$id_rencana_detail = $_POST['id_rencana_detail']; 
						$eartag = $_POST['eratag2']; 
						$keterangan = $_POST['keterangan2']; 
						$assessment = $_POST['assessment']; 
						$foto = $_POST['foto2']; 
						$tanggal = date('Y-m-d H-i-s'); 
						
						$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
									VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
						$insert2 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");	
					}
					$id_rencana_detail = $_POST['id_rencana_detail']; 
					$eartag = $_POST['eratag1']; 
					$keterangan = $_POST['keterangan1']; 
					$assessment = $_POST['assessment']; 
					$foto = $_POST['foto1']; 
					$tanggal = date('Y-m-d H-i-s'); 
					
					$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
								VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
					$insert1 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");

					if ($insert4) {
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
			}else{
				$mosConfigfoldername = "/"; 
				$file_path1 = "./upload/data_sapi/".basename($_FILES['image_1']['name']); 
				$file_path2 = "./upload/data_sapi/".basename($_FILES['image_2']['name']); 
				$file_path3 = "./upload/data_sapi/".basename($_FILES['image_3']['name']); 
				if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path1)) {
					if (move_uploaded_file($_FILES['image_2']['tmp_name'], $file_path2)) {
						if (move_uploaded_file($_FILES['image_3']['tmp_name'], $file_path3)) {
							$id_rencana_detail = $_POST['id_rencana_detail']; 
							$eartag = $_POST['eratag3']; 
							$keterangan = $_POST['keterangan3']; 
							$assessment = $_POST['assessment']; 
							$foto = $_POST['foto3']; 
							$tanggal = date('Y-m-d H-i-s'); 
							
							$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
										VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
							$insert3 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");
						}
						$id_rencana_detail = $_POST['id_rencana_detail']; 
						$eartag = $_POST['eratag2']; 
						$keterangan = $_POST['keterangan2']; 
						$assessment = $_POST['assessment']; 
						$foto = $_POST['foto2']; 
						$tanggal = date('Y-m-d H-i-s'); 
						
						$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
									VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
						$insert2 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");	
					}
					$id_rencana_detail = $_POST['id_rencana_detail']; 
					$eartag = $_POST['eratag1']; 
					$keterangan = $_POST['keterangan1']; 
					$assessment = $_POST['assessment']; 
					$foto = $_POST['foto1']; 
					$tanggal = date('Y-m-d H-i-s'); 
					
					$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
								VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
					$insert1 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");

					if ($insert3) {
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
			}
		}else{
			$mosConfigfoldername = "/"; 
			$file_path1 = "./upload/data_sapi/".basename($_FILES['image_1']['name']); 
			$file_path2 = "./upload/data_sapi/".basename($_FILES['image_2']['name']); 
			if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path1)) {
				if (move_uploaded_file($_FILES['image_2']['tmp_name'], $file_path2)) {
					$id_rencana_detail = $_POST['id_rencana_detail']; 
					$eartag = $_POST['eratag2']; 
					$keterangan = $_POST['keterangan2']; 
					$assessment = $_POST['assessment']; 
					$foto = $_POST['foto2']; 
					$tanggal = date('Y-m-d H-i-s'); 
					
					$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
								VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
					$insert2 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");	
				}
				$id_rencana_detail = $_POST['id_rencana_detail']; 
				$eartag = $_POST['eratag1']; 
				$keterangan = $_POST['keterangan1']; 
				$assessment = $_POST['assessment']; 
				$foto = $_POST['foto1']; 
				$tanggal = date('Y-m-d H-i-s'); 
				
				$query = "INSERT INTO data_sapi (id_rencana_detail,eartag,foto,keterangan,assessment,tanggal) 
							VALUES ('$id_rencana_detail','$eartag','$foto','$keterangan','$assessment','$tanggal') ";
				$insert1 = mysqli_query($link,$query) or die("Error, insert query failed : $query ");

				if ($insert2) {
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
		}
	}else{
		$mosConfigfoldername = "/"; 
		$file_path = "./upload/data_sapi/".basename($_FILES['image_1']['name']); 
		if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) {
			$id_rencana_detail = $_POST['id_rencana_detail']; 
			$eartag = $_POST['eratag1']; 
			$keterangan = $_POST['keterangan1']; 
			$assessment = $_POST['assessment']; 
			$foto = $_POST['foto1']; 
			$tanggal = date('Y-m-d H-i-s'); 
			
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
	}
} else{
	$response = array('error' => 'True');
		echo json_encode($response);
}
?>