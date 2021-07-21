<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
	body {font-family: Arial, Helvetica, sans-serif;}

	#rotater {
		transition: all 0.3s ease;
		border: 0.0625em solid black;
		border-radius: 3.75em;
		width:200px; height:200px;
	}

	#rotater1 {
		transition: all 0.3s ease;
		border: 0.0625em solid black;
		border-radius: 3.75em;
		width:200px; height:200px;
	}

	/* Add Animation */
	.modal-content, #caption {    
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)} 
		to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
		from {transform:scale(0)} 
		to {transform:scale(1)}
	}
</style>
<script>
	let rotateAngle = 90;
	function rotate(image) {
		image.setAttribute("style", "transform: rotate(" + rotateAngle + "deg)");
		rotateAngle = rotateAngle + 90;
	}
	function rotate1(image1) {
		image1.setAttribute("style", "transform: rotate(" + rotateAngle + "deg)");
		rotateAngle = rotateAngle + 90;
	}
</script>
<div class="w3-container">
  <h2>Detail Aktifitas Kunjungan PPL</h2>
</div>
<div>					    
	<div class="widget-box" id="widget-box-9">
		<div class="widget-header">
			<h5 class="widget-title">
			    <?php if($detail_visit==''){ ?>
			    
				<?php }else{?>
				    <?php $data_= $detail_visit->row();?>
    				<?php echo "PPL : "; echo $data_->nama_karyawan; ?>
    
    				<a style="float:right;margin-right:10px;" class="btn btn-xs btn-success text-center" href="<?php echo base_url().'Rekap_salesman/cetak/';echo $data_->id_rencana_header; ?>"  
    					onclick="window.open(this.href, 'newwindow', 'width=600, height=470'); return false;">
    					<i class="ace-icon fa fa-print"></i>
    					<span class="bigger-110">Print</span>
    				</a>
				<?php }?>
			</h5>
		</div>
		<div class="widget-body" id="print_area">
			<div class="widget-main">
					<?php if($this->session->flashdata('success')) { ?>
						<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<?php echo $this->session->flashdata('success'); ?>
						</div> 
 					<?php }else if($this->session->flashdata('error')){ ?>
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<?php echo $this->session->flashdata('error'); ?>
						</div>
					<?php }?>
				<table id="sample-table-4" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th style="background: #22313F;color:#fff;">No</th>									
							<th style="background: #22313F;color:#fff;">Kunjungan</th>									
							<th style="background: #22313F;color:#fff;">Absen</th>									
							<th style="background: #22313F;color:#fff;">Foto Sapi</th>
							<th style="background: #22313F;color:#fff;">Map</th>
						</tr> 
					</thead>

					<tbody>
								<?php
								$no = 1;
								$jum_total = 0;		
										foreach($detail_visit->result_array() as $data) { ?>
										<tr>
											<td>
												<?php echo $no; ?>
											</td>										
											<td>
												<?php echo $data['name1']; ?>
												<br>
												<?php echo $data['desa']; ?>
												<br>
												<?php echo $data['tanggal_checkout']; ?>
											</td>						
											<td>
												<?php if($data['foto']){?>
														<a  
															href="#">
															<img style="width:200px; height:200px"; id="rotater" onclick="rotate(this)" src="<?php echo base_url(); echo "/upload/checkin/";echo $data['foto']; ?>" border="0"/> 
														</a>
														<br>
												<?php }?>
												<?php echo $data['alamat_gps']; ?>
												<br>
												<?php echo $data['tanggal_checkin']; ?>
												<br>
												<?php echo $data['alamat_gps']; ?>
												<br>
												<?php echo $data['tanggal_checkout']; ?>
												<br>
												<?php echo $data['realisasi_kegiatan']; ?>
											</td>						
											<td>
												<?php 
													$id_rencana_detail = $data['id_rencana_detail'];
													$qa = $this->db->query("SELECT * FROM data_sapi WHERE id_rencana_detail='$id_rencana_detail'"); 
												?>
												<?php foreach($qa->result_array() as $rows) { ?>
													<a  
														href="<?php echo base_url(); ?>Rekap_salesman/downloadDisplay/<?php echo $rows['foto']; ?>">
														<img style="width:200px; height:200px"; id="rotater1" onclick="rotate1(this)" src="<?php echo base_url(); echo "/upload/data_sapi/";echo $rows['foto']; ?>" border="0"/> <br>
													</a>	
													<?php echo $rows['eartag']; echo "<br>" ?>
													<?php echo $rows['keterangan']; ?>
													<br>
												<?php }?>
											</td>											
											<td>
												<?php if($data['lats']){?>
													<?php echo '<iframe width="200" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$data['lats'].','.$data['longs'].'&hl=es;z=16&amp;output=embed"></iframe>'?>
												<?php }?>
											</td>						
										</tr>
										<?php
										$no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>