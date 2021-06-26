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
					<a style="border-radius:25px;margin-bottom:25px;" id="laporkan_admin" class="btn btn-sm btn-primary" href="" 
						data-toggle="modal"><span class="fa fa-send"> </span> Release</a>
						<table id="sample-table-2" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th style="width:50px;">No</th>
									<th>Petani</th>
									<th>Lokasi</th>
									<th>Index</th>
									<th>Nama Obat</th>
									<th>Qty</th>
								</tr>
							</thead>
							<?php
								$no = 1;
								foreach($pengobatan->result_array() as $data) {
										$bg = 'style="background:#2ECC71;"'; ?>
												<tr <?php echo $bg; ?>>
													<td><?php echo $no; ?></td>
													<td><?php echo $data['name1']; ?></td>
													<td><?php echo $data['desa']; ?></td>
													<td><?php echo $data['indnr']; ?></td>
													<td><?php echo $data['nama_obat']; ?></td>
													<td><?php echo $data['qty']; ?></td>
												</tr>
								<?php 	$no++; } ?>
						</table>
			</div>
		</div>
	</div>
</div>
<div  class="modal fade" id="ModalLaporkan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Release Data Pengobatan ke SAP</h4>
            </div>
            <form style="margin-bottom:0;" action="<?php echo base_url(); ?>Release_pengobatan/release" method="post">
            	<input id="id_pengiriman" type="hidden" name="id_pengiriman" >
            	<div class="modal-body" style="height: 350px;overflow-y: scroll;">					
            		<div id="data_pengiriman"></div>
				</div>
	            <div class="modal-footer">
	            	<div class="row">
	            		<div class="col-md-12 text-right">
			        		<button style="border-radius:25px;" id="simpan_jual" class="btn btn-primary btn-sm"><i class="fa fa-check"> </i> Release</button>
			        	</div>
					</div>
			    </div>
			</form>
        </div>
    </div>
</div>