<?php
$link = mysqli_connect("localhost", "root", "", "homt3248_salestrax");
// $link = mysqli_connect("localhost", "root", "", "absen_android");
if($_GET['id_rencana_detail']) { 
	$id_rencana_detail = $_GET['id_rencana_detail'];
	$query=mysqli_query($link,"SELECT oneone.*, nama_satuan FROM (SELECT cust_filter.*, nama_product,id_satuan FROM (SELECT group_by.* 
							FROM (SELECT stock_customer.* FROM (SELECT MAX(id_stock) AS id_stock FROM stock_customer GROUP BY id_customer,id_product) 
							AS max_ JOIN stock_customer ON max_.id_stock=stock_customer.id_stock) AS group_by JOIN trx_rencana_detail 
							ON group_by.id_customer=trx_rencana_detail.id_customer WHERE id_rencana_detail='$id_rencana_detail')AS cust_filter 
							JOIN mst_product ON cust_filter.id_product=mst_product.id_product)AS oneone JOIN satuan ON satuan.id_satuan=oneone.id_satuan");
	if (!$query) {
    die(mysql_error());
	}

	$ada2 = mysqli_num_rows($query);
	if ($ada2 == 0) { 
		$response = array('error' => 'True');
		echo json_encode($response);
	}
	else {
		$result = mysqli_query($link,"SELECT oneone.*, nama_satuan FROM (SELECT cust_filter.*, nama_product,id_satuan FROM (SELECT group_by.* 
							FROM (SELECT stock_customer.* FROM (SELECT MAX(id_stock) AS id_stock FROM stock_customer GROUP BY id_customer,id_product) 
							AS max_ JOIN stock_customer ON max_.id_stock=stock_customer.id_stock) AS group_by JOIN trx_rencana_detail 
							ON group_by.id_customer=trx_rencana_detail.id_customer WHERE id_rencana_detail='$id_rencana_detail')AS cust_filter 
							JOIN mst_product ON cust_filter.id_product=mst_product.id_product)AS oneone JOIN satuan ON satuan.id_satuan=oneone.id_satuan");
	if (!$result) {
    die(mysql_error());
	}
		while ($rec =$result-> fetch_assoc()) {
			$arr[] = array_map('utf8_encode', $rec);
		}
		echo '{"stock_customer":' . json_encode($arr) . '}';
	}	
}
?>