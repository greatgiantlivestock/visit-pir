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
		$(function(){
			$.ajaxSetup({
				type:"POST",
				url: "<?php echo base_url('Pakan_mobile/ambil_data') ?>",
				cache: false,
			});
			$("#Spetani").change(function(){
				var value=$(this).val();
				var table1 = document.getElementById("sample-table-2");
				table1.style.display = "none";
				if(value>0){
					$.ajax({
						data:{
							modul:'indnr',indnr:value
						},
						success: function(respond){
							$("#Tindnr").val(respond);
						}
					})
				}
			});
			$("#Spetani").change(function(){
				var value=$(this).val();
				if(value>0){
					$.ajax({
						data:{
							modul:'desa',indnr:value
						},
						success: function(respond){
							$("#Tdesa").val(respond);
						}
					})
				}
			});
		})
</script>
<style>
	.label{
			color: black;
			padding: 3px;
			line-height: 1.5;
		}
</style>
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
						<form class="form-horizontal"  action="<?php echo base_url(); ?>Pakan_mobile/get_pakan_filter" method="post">
							<div class="widget-main">
								<div class="row">
									<div class="col-md-8">
										<table class="tbl_input">
											<tr>
												<td>
													<?php echo "Nama Petani : "."<br>"?>
													<select id="Spetani" style="width:100%;" class="select_rph" required name="indnr">
														<?php echo $combo_indnr; ?>
													</select>
												</td>			
											</tr>
											<tr>
												<td>
													<?php echo "Index Petani : "."<br>"?>
													<input id="Tindnr" style="width:80%;" class="form-control"  value="<?php echo $indnr;?>">						
												</td>
											</tr>
											<tr>
												<td>
													<?php echo "Lokasi : "."<br>"?>
													<input id="Tdesa" style="width:80%;" class="form-control"  value="<?php echo $desa; ?>" name="desa">						
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
							</div>
						</form>
						<table id="sample-table-2" class="table table-striped table-bordered table-hover">
							<!-- <thead>
								<tr>
									<th width="5%"></th>
								</tr>
							</thead> -->
							<?php
								$no = 1;
								foreach($pakan->result_array() as $data) { ?>
												<tr>
													<!-- <td><?php echo $data['name1']."<br>"; ?>
													<?php echo $data['desa']."<br>"; ?>
													<?php echo $data['indnr']."<br>"; ?> -->
													
													<td><?php echo "<b>".$data['desc_pakan']."</b>"."<br>"; ?>
													<?php echo "<label class='label label-success' style='width:100px;height:50px;border-radius:15px;text-align:center;'>"."<b>Budget</b>"."<br>".$data['budget']."</label>"; ?>
													<?php echo "<label class='label label-primary' style='width:100px;height:50px;border-radius:15px;text-align:center;'>"."<b>Terkirim</b>"."<br>".$data['terkirim']."</label>"; ?>
													<?php $sum1 = $data['budget']-$data['terkirim']; echo "<label class='label label-warning' style='width:100px;height:50px;border-radius:15px;text-align:center;'>"."<b>Sisa</b>"."<br>".$sum1."</label>"; ?></td>
												</tr>
								<?php 	$no++; } ?>
						</table>
						<br>
			</div>
		</div>
	</div>
</div>