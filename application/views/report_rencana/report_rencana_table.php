<script src="<?php echo base_url('vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('vendor/datatables-responsive/dataTables.responsive.js')?>"></script>
<script>
	$(document).ready(function() {
		$('#dataTables-exampleR1').DataTable({
			"dom":'<"toolbar">frtip',
			responsive: true,
			bPaginate: false,
			bLengthChange: false,
			bFilter: true,
			bInfo: false,
			bAutoWidth: false,
			order: [[ 1, "desc" ]]
		});
	});
</script>
	<div class="widget-box widget-color-nurmal" id="widget-box-9">
		<div class="widget-body">
		<form class="form-horizontal"  action="<?php echo base_url(); ?>Report_rencana/lihat_report" method="post"/>
			<input type="hidden" name="tanggal1" value="<?php echo $tanggal_mulai; ?>">
			<input type="hidden" name="tanggal2" value="<?php echo $tanggal_sampai; ?>">
			<input type="hidden" name="nama_karyawan" value="<?php echo $nama_karyawan; ?>">
			<input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
			<div class="widget-main">
				<div class="row">
					<div class="col-md-8">
						<table class="tbl_input">
							<tr>
								<td>
									Tanggal Mulai
								</td>
								<td>
									<div class="input-group col-xs-8">
										<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i>
										</span>
										<input <?php echo $color; ?>  class="form-control " type="date" name="tanggal_mulai" value="<?php echo $tanggal_mulai; ?>" required>						
									</div>
								</td>
							</tr> 
							<tr>
								<td>
									Tanggal Sampai
								</td>
								<td>
									<div class="input-group col-xs-8">
										<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i>
										</span>
										<input <?php echo $color; ?>  class="form-control " type="date" name="tanggal_sampai" value="<?php echo $tanggal_sampai; ?>" required>						
									</div>
								</td>
							</tr>
							<tr>
								<td>
									Nama Karyawan
								</td>
								<td>
									<select required style="width:80%;" <?php echo $disable; ?> <?php echo $color; ?> name="nama_karyawan">
										<?php echo $combo_user; ?>
									</select>
								</td>
							</tr>				
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr/ style="margin-top: 10px; margin-bottom: 10px;">
						<?php echo $btn_nota; ?>
						<hr/ style="margin-top: 10px; margin-bottom: 10px;">
					</div>
				</div>
			</form>
				<div class="space-10"></div>
				<div class="row">
					<div class="col-md-12">
					<div class="col-md-12 text-center">
						<a class="btn btn-xs btn-primary text-center"
							href="javascript://" onclick="exportRealisasiKunjungan('xls');"
							<?php echo $disable; ?>>
							<i class="glyphicon glyphicon-export"></i>
							<span class="bigger-110"> Export to Excel</span>
						</a>
					</div>
						<table id="dataTables-exampleR1" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th colspan="6" style="background: #22313F;color:#fff;text-align:center;">Data Kunjungan Terealisasi<br></th>		
								</tr> 
								<tr>
									<th style="background: #22313F;color:#fff;">PPL</th>																	
									<th style="background: #22313F;color:#fff;">Index</th>																	
									<th style="background: #22313F;color:#fff;">Petani</th>									
									<th style="background: #22313F;color:#fff;">Alamat</th>		
									<th style="background: #22313F;color:#fff;">Tipe Kunjungan</th>
									<th style="background: #22313F;color:#fff;">Total Kunjungan</th>
								</tr> 
							</thead>
							<tbody>
								<?php
								$no = 1;
								$jum_total = 0;
								if($this->session->userdata("id_role") <=2){
									$q_tarik_data = $this->db->query("SELECT trm.nomor_rencana,trm.tanggal_penetapan,trm.tanggal_rencana,
																	trm.keterangan, mcs.nama_customer,mu.nama,trd.status_rencana
																	FROM trx_rencana_master trm JOIN trx_rencana_detail trd
																	ON trm.id_rencana_header = trd.id_rencana_header 
																	JOIN mst_customer mcs ON mcs.id_customer = trd.id_customer
																	JOIN mst_user mu ON mu.id_karyawan = trd.id_karyawan
																	WHERE trm.tanggal_rencana BETWEEN '$tanggal_mulai' AND '$tanggal_sampai'
																	AND nama LIKE '%$nama_karyawan' AND id_aplikasi='2'
																	ORDER BY trm.nomor_rencana ASC");
								}else if($this->session->userdata("id_role") == 3 || $this->session->userdata("id_role") == 4 || $this->session->userdata("id_role") == 6){
									$q_tarik_data = $this->db->query("SELECT id_rencana_detail,indnr,name1,desa,SUM(a) AS durasi,COUNT(id_rencana_detail)AS jml,urgent FROM
																	(SELECT trd.id_rencana_detail,trd.indnr,name1,desa,TIMESTAMPDIFF(SECOND, tanggal_checkin,tanggal_checkout)AS a,urgent 
																	FROM trx_rencana_master trm JOIN trx_rencana_detail trd 
																	ON trm.id_rencana_header=trd.id_rencana_header JOIN trx_checkin tci 
																	ON tci.id_rencana_detail=trd.id_rencana_detail JOIN trx_checkout tco ON tco.id_rencana_detail=trd.id_rencana_detail
																	JOIN mst_user mu ON trm.id_user_input_rencana=mu.id_user
																	WHERE trm.tanggal_rencana BETWEEN '$tanggal_mulai' AND '$tanggal_sampai'
																	AND nama LIKE '%$nama_karyawan%' AND id_aplikasi='2' GROUP BY trd.id_rencana_detail
																	ORDER BY trm.nomor_rencana ASC) AS data1 GROUP BY indnr");
								}else if($this->session->userdata("id_role") == 5){
									$departemen=$this->session->userdata('id_departemen');
									$id_karyawan=$this->session->userdata('id_karyawan');
									$q_tarik_data = $this->db->query("SELECT trm.nomor_rencana,trm.tanggal_penetapan,trm.tanggal_rencana,
																	trm.keterangan, mcs.nama_customer,mu.nama,trd.status_rencana
																	FROM trx_rencana_master trm JOIN trx_rencana_detail trd
																	ON trm.id_rencana_header = trd.id_rencana_header 
																	JOIN mst_customer mcs ON mcs.id_customer = trd.id_customer
																	JOIN mst_user mu ON mu.id_karyawan = trd.id_karyawan
																	WHERE trm.tanggal_rencana BETWEEN '$tanggal_mulai' AND '$tanggal_sampai'
																	AND mu.id_karyawan ='$id_karyawan' AND id_aplikasi='2'
																	ORDER BY trm.nomor_rencana ASC");
								}else{
									redirect("Login");
								}		
								foreach($q_tarik_data->result_array() as $data) { ?>
									<tr>
										<td><?php echo $nama_karyawan; ?></td>											
										<td><?php echo $data['indnr']; ?></td>											
										<td><?php echo $data['name1']; ?></td>						
										<td><?php echo $data['desa']; ?></td>						
										<!-- <td>
											<?php 
												$seconds = (int)$data['durasi']; 
												$hours = floor($seconds / 3600);
												$mins = floor($seconds / 60 % 60);
												$secs = floor($seconds % 60);
												echo $hours; echo " Jam, "; echo $mins; echo " Menit ";echo $secs;echo " Detik";  
											?>
										</td> -->
										<td><?php if($data['urgent']=='1'){echo "Urgent";}else{echo "Reguler";} ?></td>
										<td><?php echo $data['jml']; ?></td>
									</tr>
									<?php
									$no++; 
								} ?>
							</tbody>							
						</table>

						<br>
						<br>
						<div class="col-md-12 text-center">
							<a class="btn btn-xs btn-primary text-center"
								href="javascript://" onclick="exportRealisasiKunjunganAll('xls');"
								<?php echo $disable; ?>>
								<i class="glyphicon glyphicon-export"></i>
								<span class="bigger-110"> Export to Excel</span>
							</a>
						</div>
						<table id="dataTables-example1" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th colspan="5" style="background: #22313F;color:#fff;text-align:center;">All Petani VS Banyak Kunjungan</th>		
								</tr> 
								<tr>
									<th style="background: #22313F;color:#fff;">PPL</th>																	
									<th style="background: #22313F;color:#fff;">Index</th>																	
									<th style="background: #22313F;color:#fff;">Petani</th>									
									<th style="background: #22313F;color:#fff;">Alamat</th>		
									<th style="background: #22313F;color:#fff;">Total Kunjungan</th>
								</tr> 
							</thead>
							<tbody>
								<?php
								$no = 1;
								$jum_total = 0;
								if($this->session->userdata("id_role") <=2){
									$q_tarik_data = $this->db->query("SELECT trm.nomor_rencana,trm.tanggal_penetapan,trm.tanggal_rencana,
																	trm.keterangan, mcs.nama_customer,mu.nama,trd.status_rencana
																	FROM trx_rencana_master trm JOIN trx_rencana_detail trd
																	ON trm.id_rencana_header = trd.id_rencana_header 
																	JOIN mst_customer mcs ON mcs.id_customer = trd.id_customer
																	JOIN mst_user mu ON mu.id_karyawan = trd.id_karyawan
																	WHERE trm.tanggal_rencana BETWEEN '$tanggal_mulai' AND '$tanggal_sampai'
																	AND nama LIKE '%$nama_karyawan' AND id_aplikasi='2'
																	ORDER BY trm.nomor_rencana ASC");
								}else if($this->session->userdata("id_role") == 3 || $this->session->userdata("id_role") == 4 || $this->session->userdata("id_role") == 6){
									$q_tarik_data1 = $this->db->query("SELECT data1.indnr,data1.name1,id_rencana_detail,data1.desa,durasi,jml FROM(SELECT indnr,name1,desa FROM trans_index WHERE veraa_user ='$nama_karyawan' GROUP BY indnr)AS data1 LEFT JOIN
																	(SELECT id_rencana_detail,indnr,name1,desa,SUM(a) AS durasi,COUNT(id_rencana_detail)AS jml,urgent FROM
																	(SELECT trd.id_rencana_detail,trd.indnr,name1,desa,TIMESTAMPDIFF(SECOND, tanggal_checkin,tanggal_checkout)AS a,urgent 
																	FROM trx_rencana_master trm JOIN trx_rencana_detail trd 
																	ON trm.id_rencana_header=trd.id_rencana_header JOIN trx_checkin tci 
																	ON tci.id_rencana_detail=trd.id_rencana_detail JOIN trx_checkout tco ON tco.id_rencana_detail=trd.id_rencana_detail
																	JOIN mst_user mu ON trm.id_user_input_rencana=mu.id_user
																	WHERE trm.tanggal_rencana BETWEEN '$tanggal_mulai' AND '$tanggal_sampai'
																	AND nama LIKE '%$nama_karyawan%' AND id_aplikasi='2' GROUP BY trd.id_rencana_detail
																	ORDER BY trm.nomor_rencana ASC) AS data1 GROUP BY indnr) AS data_realisasi ON data_realisasi.indnr=data1.indnr");
								}else if($this->session->userdata("id_role") == 5){
									$departemen=$this->session->userdata('id_departemen');
									$id_karyawan=$this->session->userdata('id_karyawan');
									$q_tarik_data = $this->db->query("SELECT trm.nomor_rencana,trm.tanggal_penetapan,trm.tanggal_rencana,
																	trm.keterangan, mcs.nama_customer,mu.nama,trd.status_rencana
																	FROM trx_rencana_master trm JOIN trx_rencana_detail trd
																	ON trm.id_rencana_header = trd.id_rencana_header 
																	JOIN mst_customer mcs ON mcs.id_customer = trd.id_customer
																	JOIN mst_user mu ON mu.id_karyawan = trd.id_karyawan
																	WHERE trm.tanggal_rencana BETWEEN '$tanggal_mulai' AND '$tanggal_sampai'
																	AND mu.id_karyawan ='$id_karyawan' AND id_aplikasi='2'
																	ORDER BY trm.nomor_rencana ASC");
								}else{
									redirect("Login");
								}		
								foreach($q_tarik_data1->result_array() as $data) { ?>
									<tr>
										<td><?php echo $nama_karyawan; ?></td>											
										<td><?php echo $data['indnr']; ?></td>											
										<td><?php echo $data['name1']; ?></td>						
										<td><?php echo $data['desa']; ?></td>						
										<td><?php if($data['jml']=="") {echo "0";}else{echo $data['jml'];} ?></td>
									</tr>
									<?php
									$no++; 
								} ?>
							</tbody>							
						</table>
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