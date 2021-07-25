<html> 
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
	<div class="widget-box " id="widget-box-9">
		<div class="widget-body" id="AppsAll">
			<!-- <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
			<input type="hidden" name="id_customer" value="<?php echo $id_customer; ?>"> -->
			<div class="widget-main">
				<div class="row">
					<div class="col-md-12">
								<?php if($this->session->flashdata('error')) { ?>
									<div style="margin-bottom: 10px;"  class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<?php echo $this->session->flashdata('error'); ?>
									</div> 
								<?php } else if ($this->session->flashdata('success')) {?>
									<div style="margin-bottom: 10px;" class="alert alert-success alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										<?php echo $this->session->flashdata('success'); ?>
									</div> 
								<?php } ?>
					</div>
					<div class="col-md-12">
						<table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>	
									<th>PPL</th>	
									<th>Tanggal Kunjungan</th>
									<th>Tanggal Pembuatan Rencana</th>	
									<th>Jumlah Kunjungan</th>	
									<th>Status Aproval</th>
									<th>Aksi</th>
								</tr> 
							</thead>
							<tbody>
								<?php
								$no = 1;
										foreach($customer->result_array() as $data) { ?>
										<tr>
											<td><?php echo $data['nama']; ?></td>
											<td><?php echo $data['tanggal_rencana']; ?></td>
											<td><?php echo $data['tanggal_penetapan']; ?></td>
											<td><?php echo $data['jml']; echo " Petani"; ?></td>
											<td><?php if($data['aproved']=="0"){echo "Belum di Aprove";}else{echo "Tanpa Aproval";}; ?></td>
											<td>
												<a id="openModalDetailUrgentPlan"
													style="border-radius:25px;" 
													href="#" class="btn btn-primary btn-sm"   
													data-id_rencana_header="<?php echo $data['id_rencana_header']; ?>"  
													data-tipe="<?php echo "edit"; ?>" 
													data-toggle="modal" 
													data-target="#ModalDetailUrgent"><i class="fa fa-edit"> </i> Detail
												</a>
											</td>
										</tr>
										<?php  	
											$no++; } 
									?>
							</tbody>							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<div  class="modal fade" id="ModalAproval_urgent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detail Kunjungan PPL</h4>
            </div>
            <!-- <form style="margin-bottom:0;" action="<?php echo base_url(); ?>Aproval/save_aproval" method="post"/> -->
            	<input id="id_rencana_header" type="hidden" name="id_rencana_header" >
            	<div class="modal-body" style="height: 450px;overflow-y: scroll;">					
            		<div id="data_aproval_urgent"></div>
				</div>
	            <!-- <div class="modal-footer">
	            	<div class="row">
	            		<div class="col-md-12 text-right">
			        		<button style="border-radius:25px;" class="btn btn-primary btn-sm"><i class="fa fa-check"> </i> Close</button>
			        		</form>
			        	</div>
					</div>
			    </div> -->
        </div>
    </div>
</div>
	<script> window.setTimeout(function() { $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 2000); </script> 
	<script src="<?php echo base_url('vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/datatables-responsive/dataTables.responsive.js')?>"></script>
	<script>
		function nextclicked(){ 
			document.forms["newsmanager"].submit();
		}
	</script>
</html>