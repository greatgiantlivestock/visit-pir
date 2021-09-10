<script type="text/javascript">
    	$(document).on("click", "#checkAll", function () { 
			$('.checksemua').prop('checked', this.checked);
        });
    	$(document).on("click", "#laporkan_admin", function () {
    		var id_pengiriman = $(this).attr('data-id_pengiriman');
        	$.ajax({
							url: "<?php echo base_url(); ?>Release_pengobatan/get_pengiriman", 
							async: false,
							type: "POST",    
							data: "id_pengiriman="+id_pengiriman,   
							dataType: "html",
							success: function(data) {
								$('#data_pengiriman').html(data); 
								$("#ModalLaporkan").modal('show');
							}
					}) 
        });
		function AlertLock(x){
			alert('Terkunci, hubungi admin untuk mengeditnya.');
		}
</script>
<div class="col-md-12">					    
	<div class="widget-box">
		<div class="widget-header header-color-red">
			<h5 class="bigger lighter">
				<i class="fa fa-table"></i>
				<?php echo $judul; ?>
			</h5>
		</div>
		<div class="widget-body">
			<div class="widget-main">
<?php if($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <?php echo $this->session->flashdata('success'); ?>
                    </div> 
 <?php } ?>
<?php if($this->session->flashdata('success_release')) { ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <?php echo $this->session->flashdata('success_release'); ?>
                    </div> 
 <?php } ?>
<?php if($this->session->flashdata('error_release')) { ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <?php echo $this->session->flashdata('error_release'); ?>
                    </div> 
 <?php } ?>
						<table id="sample-table-2" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Petani</th>
									<th>Lokasi</th>
									<th>Index</th>
									<th>Nama Pakan</th>
									<th>Budget</th>
									<th>Terkirim</th>
									<th>Sisa</th>
								</tr>
							</thead>
							<?php
								$no = 1;
								foreach($pakan->result_array() as $data) { ?>
												<tr>
													<td><?php echo $data['name1']; ?></td>
													<td><?php echo $data['desa']; ?></td>
													<td><?php echo $data['indnr']; ?></td>
													<td><?php echo $data['desc_pakan']; ?></td>
													<td><?php echo $data['budget']; ?></td>
													<td><?php echo $data['terkirim']; ?></td>
													<td><?php echo $data['budget']-$data['terkirim']; ?></td>
												</tr>
								<?php 	$no++; } ?>
						</table>
						<br><br>
			</div>
		</div>
	</div>
</div>