<style>
	@import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400);
	.font-roboto {
	font-family: 'roboto condensed';
	}
	* {
	box-sizing: border-box;
	}
	body {
	.font-roboto();
	}
	.modal {
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	overflow: hidden;
	}
	.modal-dialog {
	position: fixed;
	margin: 0;
	width: 100%;
	height: 100%;
	padding: 0;
	}
	.modal-content {
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	border: 2px solid #3c7dcf;
	border-radius: 0;
	box-shadow: none;
	}
	.modal-header {
	position: absolute;
	top: 0;
	right: 0;
	left: 0;
	height: 50px;
	padding: 10px;
	background: #6598d9;
	border: 0;
	}
	.modal-title {
	font-weight: 300;
	font-size: 2em;
	color: #fff;
	line-height: 30px;
	}
	.modal-body {
	position: absolute;
	top: 50px;
	bottom: 60px;
	width: 100%;
	font-weight: 300;
	overflow: scroll;
	}
	.modal-footer {
	position: absolute;
	right: 0;
	bottom: 0;
	left: 0;
	height: 50px;
	padding: 10px;
	background: #f1f3f5;
	}
	// first
	&:first-child {
		margin-top: 0;
	}
	}
	p {
	font-size: 1.4em;
	line-height: 1.5;
	color: lighten(#5f6377, 20%);
	// last
	&:last-child {
		margin-bottom: 0;
	}
	}
	::-webkit-scrollbar {
	-webkit-appearance: none;
	width: 10px;
	background: #f1f3f5;
	border-left: 1px solid darken(#f1f3f5, 10%);
	}
	::-webkit-scrollbar-thumb {
	background: darken(#f1f3f5, 20%);
	}

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

	#rotater2 {
		transition: all 0.3s ease;
		border: 0.0625em solid black;
		border-radius: 3.75em;
		width:200px; height:200px;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/datatables-responsive/dataTables.responsive.js')?>"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
				searching:false,
                responsive: true,
				bPaginate: false,
                "order": [[ 0, "desc" ]]
            });
        });
	// $(function(){
	// 	$.ajaxSetup({
	// 		type:"POST",
	// 		url: "<?php echo base_url('rekap_salesman/ambil_data') ?>",
	// 		cache: false,
	// 	});
	// 	$("#wilayah_").change(function(){
	// 		var value=$(this).val();
	// 		if(value != ""){
	// 			$.ajax({
	// 				data:{modul:'get_karyawan',nama_wilayah:value},
	// 				success: function(respond){
	// 					$("#karyawan_").html(respond);
	// 				}
	// 			})
	// 		}
	// 	});
	// })
	// function Detail_visit(x){
	// 		var table = document.getElementById("dataTables-example");
	// 		var count = x.parentNode.parentNode.rowIndex;
	// 		var str = table.rows[count].cells[2].innerHTML;
	// 		var url = '<?php echo base_url('Rekap_salesman/get_row/')?>'+str;
	// 		$.ajax({
	// 				type: 'get',
	// 				url: url,
	// 				success: function (msg) {
	// 					$('.modal-dt').html(msg);
	// 				}
	// 		});
	// 	}
	</script>
	<div  id="widget-box-9">
		<div class="widget-body">
		<form class="form-horizontal"  action="<?php echo base_url(); ?>Rekap_salesman/lihat_report" method="post"/>
			<input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
			<div class="widget-main">
			</form>
				<div class="space-10"></div>
				<div class="row">
					<div class="col-md-12">
					<?php if($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <?php echo $this->session->flashdata('error'); ?>
                    </div> 
 					<?php } ?>
 						</a>
				<div style="margin-bottom: 10px;" class="row">
						</div>
						<table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>							
									<th style="background: #22313F;color:#fff;">Kunjungan</th>										
									<th style="background: #22313F;color:#fff;"></th>										
									<th style="background: #22313F;color:#fff;"></th>									
									<th style="background: #22313F;color:#fff;"></th>									
									<th style="background: #22313F;color:#fff;"></th>
									<th style="background: #22313F;color:#fff;"></th>
								</tr> 
							</thead>
							<tbody>
								<?php
								$no = 1;
								$jum_total = 0;		
										foreach($q_rekap_biaya->result_array() as $data) { ?>
											<tr>									
												<td>
													<?php echo $data['name1']; ?>
													<br>
													<?php echo $data['desa']; ?>
													<br>
													<?php echo $data['tanggal_checkout']; ?>
													<br>
													<?php echo "Klik Disini Untuk Lihat Detail";?>
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
													<?php echo "Data Sapi";?><br>
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
													<?php echo "Feedback Pakan";?><br>
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
													<?php echo "Penggunaan Obat";?><br>
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
													<?php echo "Peta Kunjungan";?><br>
													<?php if($data['lats']){?>
														<?php echo '<iframe width="200" id="rotater2" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$data['lats'].','.$data['longs'].'&hl=es;z=16&amp;output=embed"></iframe>'?>
													<?php }?>
												</td>						
											</tr>
										<?php
										$no++; } ?>
							</tbody>
							</table>							
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
<?php 
	if($this->session->userdata("error_duplicate") == true) { 
		$this->session->unset_userdata('error_duplicate');
?>
<script type="text/javascript">    
	$(document).ready(function(){
		$("#ModalInput2 #tipe").val("add");
		$('#ModalInput2').modal('show');
	});
</script>
<?php } ?>