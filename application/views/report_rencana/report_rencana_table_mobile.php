<script src="<?php echo base_url('vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('vendor/datatables-responsive/dataTables.responsive.js')?>"></script>
<script>
	$(document).ready(function() {
		$('#dataTables-exampleR1').DataTable({
			bPaginate: false,
			bLengthChange: false,
			bFilter: true,
			bInfo: false,
			bAutoWidth: false,
			order: [[ 0, "desc" ]]
		});
	});

	function myFunction() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("dataTables-exampleR1");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				if (td) {
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}       
			}
		}
</script>
<style>
	.label{
			color: black;
			padding: 5px;
			padding-left: 10px;
			line-height: 1.3;
		}
</style>
	<div class="widget-box widget-color-nurmal" id="widget-box-9">
		<div class="widget-body">
		<form class="form-horizontal"  action="<?php echo base_url(); ?>Report_rencana_mobile/lihat_report" method="post"/>
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
					<!-- <div class="col-md-12 text-center">
						<a class="btn btn-xs btn-primary text-center"
							href="javascript://" onclick="exportRealisasiKunjungan('xls');"
							<?php echo $disable; ?>>
							<i class="glyphicon glyphicon-export"></i>
							<span class="bigger-110"> Export to Excel</span>
						</a>
					</div> -->
					<div class="col-md-12 text-right">	
									<label class="label label-primary" disabled style="width:120px;height:30px;margin-bottom:10px;border-radius:15px;color:black;"> Regular Visit <i class="fa fa-users"> </i></label>
								</div>
								<div class="col-md-12 text-right">	
									<label class="label label-warning" disabled style="width:120px;height:30px;margin-bottom:10px;border-radius:15px;color:black;"> Urgent Visit   <i class="fa fa-user"> </i></label>
								</div>

								<div class="input-group col-xs-12 pull-right" style="margin-bottom:5px;margin-top:5px;">
									<input placeholder="Ketik nama petani.." id="myInput" onkeyup="myFunction()" style="width:100%;" class="form-control " type="text">	
									<span class="input-group-addon">
										<i class="fa fa-search"></i>
									</span>					
								</div>
						<table id="dataTables-exampleR1" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th colspan="2" style="background: #22313F;color:#fff;text-align:center;">All Petani VS Banyak Kunjungan<br></th>		
								</tr> 
								<!-- <tr>
									<th style="background: #22313F;color:#fff;">PPL</th>																	
									<th style="background: #22313F;color:#fff;">Index</th>																	
									<th style="background: #22313F;color:#fff;">Petani</th>									
									<th style="background: #22313F;color:#fff;">Alamat</th>		
									<th style="background: #22313F;color:#fff;">Tipe Kunjungan</th>
									<th style="background: #22313F;color:#fff;">Total Kunjungan</th>
								</tr>  -->
							</thead>
							<tbody>
								<?php
								$no = 1;
								$jum_total = 0;
								
									$q_tarik_data = $this->db->query("SELECT * FROM(SELECT id_rencana_detail,indnr,name1,desa,SUM(a) AS durasi,COUNT(id_rencana_detail)AS jml,urgent FROM
																	(SELECT trd.id_rencana_detail,trd.indnr,name1,desa,TIMESTAMPDIFF(SECOND, tanggal_checkin,tanggal_checkout)AS a,urgent 
																	FROM trx_rencana_master trm JOIN trx_rencana_detail trd 
																	ON trm.id_rencana_header=trd.id_rencana_header JOIN trx_checkin tci 
																	ON tci.id_rencana_detail=trd.id_rencana_detail JOIN trx_checkout tco ON tco.id_rencana_detail=trd.id_rencana_detail
																	JOIN mst_user mu ON trm.id_user_input_rencana=mu.id_user
																	WHERE trm.tanggal_rencana BETWEEN '$tanggal_mulai' AND '$tanggal_sampai'
																	AND nama LIKE '%$nama_karyawan%' AND id_aplikasi='2' GROUP BY trd.id_rencana_detail
																	ORDER BY trm.nomor_rencana ASC) AS data1 GROUP BY indnr
																	UNION ALL
																	SELECT id_rencana_detail,data1.indnr,data1.name1,data1.desa,durasi,jml,urgent FROM(SELECT indnr,name1,desa FROM trans_index WHERE veraa_user ='$nama_karyawan' GROUP BY indnr)AS data1 LEFT JOIN
																	(SELECT id_rencana_detail,indnr,name1,desa,SUM(a) AS durasi,COUNT(id_rencana_detail)AS jml,urgent FROM
																	(SELECT trd.id_rencana_detail,trd.indnr,name1,desa,TIMESTAMPDIFF(SECOND, tanggal_checkin,tanggal_checkout)AS a,urgent 
																	FROM trx_rencana_master trm JOIN trx_rencana_detail trd 
																	ON trm.id_rencana_header=trd.id_rencana_header JOIN trx_checkin tci 
																	ON tci.id_rencana_detail=trd.id_rencana_detail JOIN trx_checkout tco ON tco.id_rencana_detail=trd.id_rencana_detail
																	JOIN mst_user mu ON trm.id_user_input_rencana=mu.id_user
																	WHERE trm.tanggal_rencana BETWEEN '$tanggal_mulai' AND '$tanggal_sampai'
																	AND nama LIKE '%$nama_karyawan%' AND id_aplikasi='2' GROUP BY trd.id_rencana_detail
																	ORDER BY trm.nomor_rencana ASC) AS data1 GROUP BY indnr) AS data_realisasi ON data_realisasi.indnr=data1.indnr)as data_final GROUP BY indnr ORDER BY jml ASC");
									
								foreach($q_tarik_data->result_array() as $data) { ?>
									<tr>
										<td style="display:none;"><?php echo $data['jml'];?></td>												
										<td>												
											<?php if($data['urgent']=='1'){echo "<label class='label label-warning' style='width:100%;height:85px;border-radius:15px;text-align:left;'>";}else{echo "<label class='label label-primary' style='width:100%;height:85px;border-radius:15px;text-align:left;'>";} echo "<b>".$data['name1']."</b>"."<br>"; ?>		
											<?php if($data['indnr'] != ""){echo "Index : ".$data['indnr'];}else{echo "Index : - ";} echo "<br>"; ?>						
											<?php echo "Lokasi : ".$data['desa']."<br>"; ?>						
											<?php if($data['jml']=="") {echo "Jumlah Kunjungan : "."0";}else{if($data['jml'] >= '2'){echo "Jumlah Kunjungan : ".$data['jml']."<b> Target tercapai </b>(";echo "<i class='fa fa-check' style='color:red;'> </i>".")";}else{echo "Jumlah Kunjungan : ".$data['jml'];}} echo "</label>"; ?>
										</td>
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