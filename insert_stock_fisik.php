<?php
$link = mysqli_connect(""localhost"", "root", "", "homt3248_salestrax");
if($_POST['id_rencana_detail']) { 

	$id_rencana_detail = $_POST['id_rencana_detail'];
	$qty = $_POST['jumlah_order'];
	$date_update =  date("Y-m-d");
	$date_update1 =  date("Y-m-d H:i:s");
	$id_product = $_POST['id_product']; 
	$batch = $_POST['batch'];

	$q_stockAvailable = mysqli_query($link,"SELECT * from trx_rencana_detail  
										where id_rencana_detail='$id_rencana_detail'");
		while ($rec =$q_stockAvailable-> fetch_assoc()) {
			$id_customer = $rec['id_customer'];
		}

	// for($_POST['id_product']){
	// 	$id_rencana_detail1 = $_POST['id_rencana_detail'];
	// 	$id_product1 = $_POST['id_product']; 
	// 	$batch1 = $_POST['batch'];
	// 	$q_stockAvailable = mysqli_query($link,"SELECT data_max.* from (select stock_customer.* from (select max(id_stock) as id_stock from stock_customer 
	// 									group by id_customer,id_product) as max_stock join stock_customer on max_stock.id_stock=stock_customer.id_stock) 
	// 									as data_max join trx_rencana_detail on data_max.id_customer=trx_rencana_detail.id_customer 
	// 									where id_rencana_detail='$id_rencana_detail1' and id_product = '$id_product1'");
	// 	while ($rec =$q_stockAvailable-> fetch_assoc()) {
	// 		$qty_new = $rec['qty']+
	// 	}
	// }
	
	$query = "INSERT INTO stock_fisik (id_rencana_detail,id_product,batch,date_update,qty) 
					 VALUES ('$id_rencana_detail','$id_product','$batch','$date_update','$qty') ";
	$insert = mysqli_query($link,$query) or die("Error, insert query failed : $query ");

	// $query1 = "INSERT INTO stock_customer (id_customer,id_product,qty,tanggal_update) 
	// 				 VALUES ('$id_customer','$id_product','$qty','$date_update1') ";
	// $insert1 = mysqli_query($link,$query1) or die("Error, insert query failed : $query1 ");

	if ($insert) {
		$response = array('error' => 'False');
		echo json_encode($response);	
	} else{
		$response = array('error' => 'True');
		echo json_encode($response);
	} 
	  
	 
} 
?>