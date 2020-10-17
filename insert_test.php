<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_salestrax");

	
// 		$id = $_POST['id_staff'];
// 		$nama = $_POST['keterangan']; 
		
        
		$query = "INSERT INTO new_dummy (nama,alamat,hp) 
					 VALUES ('Sholeh','kemayoran','082186838585') ";
		$insert = mysqli_query($link,$query) or die("Error, insert query failed : $query ");

        if ($insert) {
			$response = array('error' => 'False');
			echo json_encode($response);	
		} else{
			$response = array('error' => 'True');
			echo json_encode($response);
		}  
	
?>