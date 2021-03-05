<?php
date_default_timezone_set("Asia/Bangkok");
$link = mysqli_connect("localhost", "u1076725_ms", "moha11mmad", "u1076725_visit-pir");
if($_POST['id_rencana_detail']!="0"){
	$mosConfigfoldername = "/"; 
	if(isset($_FILES['image_1'])){
		$file_path = "./upload/checkin/".basename($_FILES['image_1']['name']); 
		if (move_uploaded_file($_FILES['image_1']['tmp_name'], $file_path)) { 
			$id_user = $_POST['id_user'];
			$id_rencana_detail = $_POST['id_rencana_detail']; 
			$lats = $_POST['lats']; 
			$longs = $_POST['longs']; 
			$foto1 = $_POST['foto1']; 
			// $tanggal = date('Y-m-d H-i-s'); 
			$tanggal = $_POST['tanggal']; 
			$nomor_checkin = $id_user.date('ymdhis'); 
			$qDtRcn = "SELECT id_rencana_header,id_customer FROM trx_rencana_detail WHERE id_rencana_detail='$id_rencana_detail'";
			$ExecQ = mysqli_query($link,$qDtRcn);
			$rowDT = mysqli_fetch_assoc($ExecQ);
			$id_customer = $rowDT['id_customer']; 
			$id_rencana_header = $rowDT['id_rencana_header']; 
			$query = "INSERT INTO trx_checkin (tanggal_checkin,nomor_checkin,id_user,id_rencana_detail,kode_customer,lats,longs,foto,id_rencana_header,prospect,id_customer) 
						VALUES ('$tanggal','$nomor_checkin','$id_user','$id_rencana_detail','$id_customer','$lats','$longs','$foto1','$id_rencana_header','0','$id_customer') ";
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
		}else{
			$id_user = $_POST['id_user'];
			$id_rencana_detail = $_POST['id_rencana_detail']; 
			$lats = $_POST['lats']; 
			$longs = $_POST['longs']; 
			$tanggal = $_POST['tanggal']; 
			// $tanggal = date('Y-m-d H-i-s'); 
			$nomor_checkin = $id_user.date('ymdhis'); 
			$qDtRcn = "SELECT id_rencana_header,id_customer FROM trx_rencana_detail WHERE id_rencana_detail='$id_rencana_detail'";
			$ExecQ = mysqli_query($link,$qDtRcn);
			$rowDT = mysqli_fetch_assoc($ExecQ);
			$id_customer = $rowDT['id_customer']; 
			$id_rencana_header = $rowDT['id_rencana_header']; 
			$query = "INSERT INTO trx_checkin (tanggal_checkin,nomor_checkin,id_user,id_rencana_detail,kode_customer,lats,longs,id_rencana_header,prospect,id_customer) 
						 VALUES ('$tanggal','$nomor_checkin','$id_user','$id_rencana_detail','$id_customer','$lats','$longs','$id_rencana_header','0','$id_customer') ";
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
		} 
	} else{
		$id_user = $_POST['id_user'];
		$id_rencana_detail = $_POST['id_rencana_detail']; 
		$lats = $_POST['lats']; 
		$longs = $_POST['longs']; 
		$tanggal = $_POST['tanggal']; 
		// $tanggal = date('Y-m-d H-i-s'); 
		$nomor_checkin = $id_user.date('ymdhis'); 
		$qDtRcn = "SELECT id_rencana_header,id_customer FROM trx_rencana_detail WHERE id_rencana_detail='$id_rencana_detail'";
        $ExecQ = mysqli_query($link,$qDtRcn);
        $rowDT = mysqli_fetch_assoc($ExecQ);
		$id_customer = $rowDT['id_customer']; 
		$id_rencana_header = $rowDT['id_rencana_header']; 
		$query = "INSERT INTO trx_checkin (tanggal_checkin,nomor_checkin,id_user,id_rencana_detail,kode_customer,lats,longs,id_rencana_header,prospect,id_customer) 
					 VALUES ('$tanggal','$nomor_checkin','$id_user','$id_rencana_detail','$id_customer','$lats','$longs','$id_rencana_header','0','$id_customer') ";
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
	} 
} else{
	$response = array('error' => 'True');
		echo json_encode($response);
}
?>