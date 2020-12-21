<!DOCTYPE html>
<html>
<head>
	<title>REKAP SALESMAN ACTIVITY REPORT</title>
	<style>
	.tbl-inv {
		border-collapse: collapse;
	}
	.tbl-inv th, .tbl-inv td {		
		border: 1px solid #000;
		text-align: center;
		padding: 2px;
	}
	.tbl-invln {
		border-collapse: collapse;
	}
	.tbl-invln td {			
		text-align: center;
		padding: 2px;
	}
	</style>
</head>
<body>
<div style="text-align: center">
	<h2 style="margin:0;">Rekap Kunjungan PPL</h2>
</div>
<hr/>
<!-- <div style="text-align: center">
	<h4 style="margin:0;"><u>REKAP BIAYA PENGGANTI KEGIATAN SALES & DELIVERY</u></h4>
	<br><br>
</div> -->
<table >
	<?php $data_ = $detail_visit->row();?>
	<tr>
		<th style="width: 25%;">PPL </th>
		<th style="width: 25%;"> :</th>
		<th style="width: 25%;"><?php echo $data_->nama_karyawan; ?></th>
	</tr>
	<tr>
		<th style="width: 25%;">Tanggal Rencana</th>
		<th style="width: 25%;"> :</th>
		<th style="width: 25%;"><?php echo $data_->tanggal_rencana; ?></th>
	</tr>
</table>
<br/>
<table class="tbl-inv" cellspacing="0">
				<thead>
						<tr>
							<th style="width:25px;">No</th>									
							<th style="width:125px;">Kunjungan</th>									
							<th style="width:125px;">Absen</th>									
							<th style="width:760px;">Data Sapi</th>
						</tr> 
					</thead>
					<tbody>
								<?php
								$no = 1;
								$jum_total = 0;		
										foreach($detail_visit->result_array() as $data) { ?>
										<tr>
											<td style="width:25px;">
												<?php echo $no; ?>
											</td>										
											<td style="width:125px;">
												<?php echo $data['name1']; ?>
												<br>
												<?php echo $data['desa']; ?>
												<br>
											</td>						
											<td style="width:125px;">
												<?php if($data['foto']){?>
														<img style="width:125px; height:125px"; src="<?php echo base_url();  echo "/upload/checkin/";echo $data['foto']; ?>"/> <br>
												<?php }?>
												<?php echo $data['tanggal_checkout']; ?>
											</td>						
											<td style="width:760px;" >
												<?php 
													$id_rencana_detail = $data['id_rencana_detail'];
													$qa = $this->db->query("SELECT * FROM data_sapi WHERE id_rencana_detail='$id_rencana_detail'"); ?>
														<?php foreach($qa->result_array() as $rows) { ?>
																<img style="width:125px; height:125px"; src="<?php echo base_url(); echo "/upload/data_sapi/";echo $rows['foto']; ?>" />	
														<?php }?>
											</td>												
										</tr>
										<?php
										$no++; } ?>
					</tbody>
</table>
<br/>
<br/>
<br/>
<!-- <table cellspacing="0">
	<tr>
		<th style="width: 30%;  font-size: 10px;">
			<p align="center">
				<p>Prepared by</p>
				<br/><br/><br/><br/>
				<p style="margin: 0">_____________________</p>
				<p >Sales Admin</p>
			</p>
		</th>
		<th style="width: 30%; font-size: 10px;">
			<p align="center">
				<p>Acknowledged by,</p>
				<br/><br/><br/><br/>
				<p style="margin: 0">_____________________</p>
				<p >Head Depo</p>
			</p>
		</th>
		<th style="width: 40%; font-size: 10px;">
			<p align="center">
				<p>Approved by</p>
				<br/><br/><br/><br/>
				<p style="margin: 0">______________________________</p>
				<p >Sales Manager / Commercial Manager</p>
			</p>
		</th>
	</tr>
</table> -->
</body>
</html>
