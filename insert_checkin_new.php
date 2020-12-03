<?php
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir");
if(isset($_FILES['image_1'])){
	$mosConfigfoldername = "/"; 
	$file_path = "./upload/checkin/".basename($_FILES['image_1']['name']); 
	if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) { 
		$id_user = $_POST['id_user'];
		$id_rencana_detail = $_POST['id_rencana_detail']; 
		$lats = $_POST['lats']; 
		$longs = $_POST['longs']; 
		$foto1 = $_POST['foto1']; 
		$tanggal = date('Y-m-d H-i-s'); 
		$nomor_checkin = $id_user.date('ymdhis'); 
        
		$query = "INSERT INTO trx_checkin (tanggal_checkin,nomor_checkin,id_user,id_rencana_detail,kode_customer,lats,longs,foto,id_rencana_header,prospect) 
					 VALUES ('$tanggal','$nomor_checkin','$id_user','$id_rencana_detail','11111','$lats','$longs','$foto1','101212','0') ";
		$insert = mysqli_query($link,$query) or die("Error, insert query failed : $query ");
        
		$query1 = "UPDATE trx_rencana_detail SET status_rencana='1' WHERE id_rencana_detail='$id_rencana_detail'";
		$update = mysqli_query($link,$query1) or die("Error, insert query failed : $query1 ");

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