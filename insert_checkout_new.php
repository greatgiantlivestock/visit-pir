<?php
date_default_timezone_set("Asia/Bangkok");
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir-dev");
// if(isset($_FILES['image_1'])){
	// $mosConfigfoldername = "/"; 
	// $file_path = "./upload/checkin/".basename($_FILES['image_1']['name']); 
	// if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) { 
		$id_user = $_POST['id_user'];
		$id_rencana_detail = $_POST['id_rencana_detail']; 
		$lats = $_POST['lats']; 
		$longs = $_POST['longs']; 
		// if($_POST['id_checkin']){
		// 	$id_checkin = $_POST['id_checkin'];
		// } 
		$keterangan = $_POST['keterangan']; 
		// $tanggal = date('Y-m-d h:i:s'); 
		$tanggal = $_POST['tanggal']; 
		$address = $_POST['address']; 
		$qDtRcn = "SELECT id_checkin FROM trx_checkin WHERE id_rencana_detail='$id_rencana_detail'";
        $ExecQ = mysqli_query($link,$qDtRcn);
        $rowDT = mysqli_fetch_assoc($ExecQ);
		$id_checkin = $rowDT['id_checkin']; 
        
		$query = "INSERT INTO trx_checkout (id_checkin,id_user,lats,longs,tanggal_checkout,realisasi_kegiatan,id_rencana_detail,alamat_gps) 
					 VALUES ('$id_checkin','$id_user','$lats','$longs','$tanggal','$keterangan','$id_rencana_detail','$address') ";
		$insert = mysqli_query($link,$query) or die("Error, insert query failed : $query ");
        
		$query1 = "UPDATE trx_rencana_detail SET status_rencana='2' WHERE id_rencana_detail='$id_rencana_detail'";
		$update = mysqli_query($link,$query1) or die("Error, insert query failed : $query1 ");

        if ($insert) {
			$response = array('error' => 'False');
			echo json_encode($response);	
		} else{
			$response = array('error' => 'True');
			echo json_encode($response);
		}  
	
	// } else{
	// 	$response = array('error' => 'True');
	// 	echo json_encode($response);
	// } 
// } else{
// 	$response = array('error' => 'True');
// 		echo json_encode($response);
// }
?>