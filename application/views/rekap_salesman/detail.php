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
<script src="<?php echo base_url('vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/datatables-responsive/dataTables.responsive.js')?>"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example7').DataTable({
                responsive: true,
				bPaginate: false,
                "order": [[ 0, "desc" ]]
            });
        });
</script>
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
				<table id="dataTables-example7" width="100%" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th style="background: #22313F;color:#fff;">No</th>									
							<th style="background: #22313F;color:#fff;">Kunjungan</th>									
							<th style="background: #22313F;color:#fff;">Absen</th>									
							<th style="background: #22313F;color:#fff;">Foto Sapi</th>
							<th style="background: #22313F;color:#fff;">Pakan</th>
							<th style="background: #22313F;color:#fff;">Pengobatan</th>
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
												<?php echo "Detail Checkin : ";echo "<br>";?>
												<?php if($data['foto']){?>
														<a  
															href="#">
															<img style="width:200px; height:200px"; id="rotater" onclick="rotate(this)" src="<?php echo base_url(); echo "/upload/checkin/";echo $data['foto']; ?>" border="0"/> 
														</a>
														<br>
												<?php }?>
												<?php echo "<br>"; echo $data['alamat_gps']; ?>
												<br>
												<?php echo $data['tanggal_checkin']; ?>
												<br>
												<br>
												<?php echo "Detail Checkout : ";echo "<br>";?>
												<?php echo $data['alamat_gps1']; ?>
												<br>
												<?php  echo $data['tanggal_checkout']; ?>
												<br>
												<?php echo "Keterangan Checkout : "; echo $data['realisasi_kegiatan']; ?>
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
													<?php echo "Eartag : "; echo $rows['eartag']; echo "<br>" ?>
													<?php echo "Keterangan : "; echo $rows['keterangan']; ?>
													<br>
												<?php }?>
											</td>	
											<td>
													<?php 
														$id_rencana_detail = $data['id_rencana_detail'];
														$qa = $this->db->query("SELECT * FROM trx_feedback_pakan WHERE id_rencana_detail='$id_rencana_detail'"); 
													?>
													<?php foreach($qa->result_array() as $rowsPakan) { ?>
														<a >
															<img style="width:200px; height:200px"; id="rotater" src="<?php echo base_url(); echo "/upload/pakan/";echo $rowsPakan['foto']; ?>" border="0"/> <br>
														</a>	
														<?php echo $rowsPakan['feedback_pakan']; ?>
														<br>
													<?php }?>
												</td>											
												<td>
													<?php 
														$id_rencana_detail = $data['id_rencana_detail'];
														$qa = $this->db->query("SELECT nama_obat,qty,unit_obat,tanggal,foto FROM trx_pengobatan tob JOIN mst_obat mo ON tob.kode_obat=mo.kode_obat WHERE id_rencana_detail='$id_rencana_detail'"); 
														$qaRow = $this->db->query("SELECT nama_obat,qty,unit_obat,tanggal,foto FROM trx_pengobatan tob JOIN mst_obat mo ON tob.kode_obat=mo.kode_obat WHERE id_rencana_detail='$id_rencana_detail'")->row(); 
													?>
													<a>
														<?php if(isset($qa->row()->foto)){?>
															<img style="width:200px; height:200px"; id="rotater" src="<?php echo base_url(); echo "/upload/pengobatan/";echo $qa->row()->foto; ?>" border="0"/> <br>
														<?php }?>
													</a>
													<?php foreach($qa->result_array() as $rowsObat) { ?>	
														<?php echo "- "; echo $rowsObat['nama_obat']; echo " "; echo $rowsObat['qty']; echo " "; echo $rowsObat['unit_obat']; ?>
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

	<!-- The Modal -->
	<div id="myModal" class="modal">
	<span class="close">&times;</span>
	<img class="modal-content" id="img01">
	<div id="caption"></div>
	</div>

	<div class="modal fade" id="ModalAddShp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Shipping Point</h4>
            </div>
            <div class="modal-body">
            	 	<form  class="form-horizontal"  action="<?php echo base_url(); ?>User/save_shipping_point" method="post"/>	
						<input id="tipe_shp" type="hidden" name="tipe" readonly>	
						<input id="id_user_shp" type="hidden" name="id_user" readonly>			

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Shipping Point </label>
								<div class="col-sm-9">
									<select class='select_kegiatan' style="width:60%;" name="description">
										<?php echo $combo_shipping_point_user; ?>
									</select>
								</div>
							</div>	

							<div>												
								<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-12">
											<button class="btn btn-success">
												<i class="ace-icon fa fa-check bigger-110"></i>Simpan
											</button>
											<button type="button" class="btn btn-standar" style="margin-left: 40px;" data-dismiss="modal"> 
												<i class="ace-icon fa fa-undo bigger-110"></i>Batal
											</button>
										</div>
								</div>
							</div>								
					</form>			
			</div>		   
        </div>
		</div>
	</div>