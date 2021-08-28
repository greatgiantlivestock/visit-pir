<html> 
    <script>
        $(document).ready(function() {
			$(document).on("click", "#checkAll", function () { 
				$('.check').prop('checked', this.checked);
			});
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
											<td><?php echo $data['nama_karyawan']; ?></td>
											<td><?php echo $data['tanggal_rencana']; ?></td>
											<td><?php echo $data['tanggal_penetapan']; ?></td>
											<td><?php echo $data['jml']; echo " Petani"; ?></td>
											<td><?php if($data['aproved']=="0"){echo "Belum di Aprove";}else{echo "Sudah di Aprove";}; ?></td>
											<td>
												<a id="openModalEditCustomer" 
													href="#" class="btn btn-primary btn-sm"   
													data-id_rencana_header="<?php echo $data['id_rencana_header']; ?>"  
													data-tipe="<?php echo "edit"; ?>" 
													data-toggle="modal" 
													data-target="#ModalEditCustomer"><i class="fa fa-edit"> </i> Open
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

<div  class="modal fade" id="ModalAproval" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detail Kunjungan PPL</h4>
            </div>
            <form style="margin-bottom:0;" action="<?php echo base_url(); ?>Aproval/save_aproval" method="post"/>
            	<input id="id_rencana_header" type="hidden" name="id_rencana_header" >
            	<div class="modal-body" style="height: 450px;overflow-y: scroll;">					
            		<!-- <div class="row" style="margin-bottom: 10px;">
            			<div class="col-md-4">
            				<input id="tgl" class="form-control tanggal_terima" type="text" name="tanggal_terima" placeholder="Tanggal Terima .." required>
            			</div>
            			<div class="col-md-3">
            				<input id="jam" class="form-control jam_terima" type="text" name="jam_terima" placeholder="Jam Terima .." required>
            			</div>
            		</div> -->

            		<!-- <input class="form-control keterangan_terima" style="width:60%;margin-bottom: 20px;" type="text" name="keterangan_terima" placeholder="Keterangan Terima .."> -->
            		<div id="data_aproval"></div>
				</div>
	            <div class="modal-footer">
	            	<div class="row">
	            		<div class="col-md-12 text-right">
			        		<button style="border-radius:25px;" class="btn btn-primary btn-sm"><i class="fa fa-check"> </i> Aprove</button>
			        		</form>
			        	</div>
					</div>
			    </div>
        </div>
    </div>
</div>
	<!-- <div class="modal fade" id="ModalInputCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Tambah Customer</h4>
				</div>
				<script type="text/javascript">
					$(function(){
						$.ajaxSetup({
							type:"POST",
							url: "<?php echo base_url('customer/generate_code') ?>",
							cache: false,
						});
					})
				</script>
				<div class="modal-body">
						<form  class="form-horizontal"  action="<?php echo base_url(); ?>customer/save" method="post"/>	
							<input id="tipe" type="hidden" name="tipe" value="<?php echo $tipe; ?>" readonly>					
							<table class="tbl_input">
								<tr>
									<td>
										Kode Customer
									</td>
									<td>
										<div class="input-group col-xs-10">
											<input id="kode_customer" <?php echo $color; ?> style="text-transform:uppercase" placeholder="*" class="form-control " type="text" name="kode_customer">						
										</div>
									</td>
								</tr>
								<tr>
									<td>
										Nama Customer
									</td>
									<td>
										<div class="input-group col-xs-10">
											<input id="nama_customer" <?php echo $color; ?> style="text-transform:uppercase" placeholder="*" class="form-control " type="text" name="nama_customer" >						
										</div>
									</td>
								</tr>
								<tr>
									<td>
										No HP
									</td>
									<td>
										<div class="input-group col-xs-10">
											<input id="no_hp" <?php echo $color; ?> style="text-transform:uppercase"  class="form-control " type="number" name="no_hp" >						
										</div>
									</td>
								</tr>
								<tr>
									<td>
										Nama Usaha
									</td>
									<td>
										<div class="input-group col-xs-10">
											<input id="nama_usaha" <?php echo $color; ?> style="text-transform:uppercase" class="form-control " type="text" name="nama_usaha" >						
										</div>
									</td>
								</tr>
								<tr>
									<td>
										Wilayah
									</td>
									<td>
										<div class="input-group col-xs-6">
										<select id='wilayah' style="width:200px;font-weight: bold;font-size: 1.2em;" class='select_karyawan pull-right' name="id_wilayah" style="width:100%; <?php echo $color_edit; ?>" >
													<?php echo $combo_wilayah; ?>
										</div>
										<div>
											<?php echo "*"; ?>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										Kota
									</td>
									<td>
										<div class="input-group col-xs-10">
											<input id="city" <?php echo $color; ?> style="text-transform:uppercase"  placeholder="*" class="form-control" type="text" name="city" >						
										</div>
									</td>
								</tr>
								<tr>
									<td>
										Alamat Customer
									</td>
									<td>
										<div class="input-group col-xs-10">
											<input id="alamat" <?php echo $color; ?> style="text-transform:uppercase" placeholder="*" class="form-control " type="text" name="alamat" >						
										</div>
									</td>
								</tr>
								<tr>
									<td>
										Lats
									</td>
									<td>
										<div class="input-group col-xs-10">
											<input id="lats" <?php echo $color; ?> style="text-transform:uppercase" class="form-control " type="text" name="lats" >						
										</div>
									</td>
								</tr>	
								<tr>
									<td>
										Longs
									</td>
									<td>
										<div class="input-group col-xs-10">
											<input id="long" <?php echo $color; ?> style="text-transform:uppercase" class="form-control " type="text" name="longs" >						
										</div>
									</td>
								</tr>			
								<tr>
									<td colspan="2">
										<div class="clearfix form-actions">
											<div class="col-md-offset-3 col-md-12">
												<?php echo $btn_nota; ?>
												<button type="button" class="btn btn-standar" style="margin-left: 40px;" data-dismiss="modal"> 
															<i class="ace-icon fa fa-undo bigger-110">	</i>Batal
														</button>
											</div>
										</div>
									</td>
								</tr>			
							</table>
						</form>			
				</div>		   
			</div>
		</div>
	</div> -->
	<!-- <div class="modal fade" id="ModalEditCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Customer</h4>
            </div>
            <div class="modal-body">
            	 	<form  class="form-horizontal"  action="<?php echo base_url(); ?>customer/save" method="post"/>	
						<input id="tipe1" type="hidden" name="tipe" readonly>	
						<input id="id_customer1" type="hidden" name="id_customer" readonly>			
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Kode Customer </label>
								<div class="col-sm-9">
									<input id="kode_customer1" <?php echo $color; ?> class="form-control " type="text" name="kode_customer" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right">Nama Customer</label>
								<div class="col-sm-9">
									<input id="nama_customer1" <?php echo $color; ?> class="form-control " type="text" name="nama_customer" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Nomor HP </label>
								<div class="col-sm-9">
									<input id="no_hp1" <?php echo $color; ?> class="form-control " type="number" name="no_hp">
								</div>
							</div>		
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right">Nama Usaha </label>
								<div class="col-sm-9">
									<input id="nama_usaha1" <?php echo $color; ?> class="form-control " type="text" name="nama_usaha">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Wilayah </label>
								<div class="col-sm-9">
									<select id="wilayah1" class='select_kegiatan' style="width:100%;<?php echo $color; ?>" name="id_wilayah">
										<?php echo $combo_wilayah; ?>
									</select>
								</div>
							</div>									
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Kota </label>
								<div class="col-sm-9">
									<input id="city1" <?php echo $color; ?> class="form-control " type="text" name="city">
								</div>
							</div>										
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Alamat </label>
								<div class="col-sm-9">
									<input id="alamat1" <?php echo $color; ?> class="form-control " type="text" name="alamat">
								</div>
							</div>										
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Lats </label>
								<div class="col-sm-9">
									<input id="lats1" <?php echo $color; ?> class="form-control " name="lats">
								</div>
							</div>										
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Longs </label>
								<div class="col-sm-9">
									<input id="longs1" <?php echo $color; ?> class="form-control " name="longs">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Status Customer </label>
								<div class="col-sm-9">
									<select id="status_customer1" class='select_kegiatan' style="width:100%;<?php echo $color; ?>" name="id_status_customer">
										<?php echo $combo_status_customer; ?>
									</select>
								</div>
							</div>			
								<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-12">
											<?php echo $btn_nota; ?>
											<button type="button" class="btn btn-standar" style="margin-left: 40px;" data-dismiss="modal"> 
														<i class="ace-icon fa fa-undo bigger-110">	</i>Batal
													</button>
										</div>
								</div>								
					</form>			
			</div>		   
        </div>
		</div>
	</div> -->
	<!-- <div class="modal fade" id="ModalDeleteCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Customer</h4>
            </div>
            <div class="modal-body">
            	 	<form  class="form-horizontal"  action="<?php echo base_url(); ?>customer/hapus_customer" method="post"/>	
						<input id="tipe2" type="hidden" name="tipe" readonly>	
						<input id="id_customer2" type="hidden" name="id_customer" readonly>			
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Kode Customer </label>
								<div class="col-sm-9">
									<input id="kode_customer2" <?php echo $color; ?> class="form-control " type="text" name="kode_customer" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right">Nama Customer</label>
								<div class="col-sm-9">
									<input id="nama_customer2" <?php echo $color; ?> class="form-control " type="text" name="nama_customer" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Nomor HP </label>
								<div class="col-sm-9">
									<input id="no_hp2" <?php echo $color; ?> class="form-control " type="number" name="no_hp">
								</div>
							</div>		
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right">Nama Usaha </label>
								<div class="col-sm-9">
									<input id="nama_usaha2" <?php echo $color; ?> class="form-control " type="text" name="nama_usaha">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Wilayah </label>
								<div class="col-sm-9">
									<select id="wilayah2" class='select_kegiatan' style="width:100%;<?php echo $color_edit; ?>" name="id_wilayah" <?php echo $disable; ?>>
										<?php echo $combo_wilayah; ?>
									</select>
								</div>
							</div>									
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Kota </label>
								<div class="col-sm-9">
									<input id="city2" <?php echo $color; ?> class="form-control " type="text" name="city">
								</div>
							</div>										
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Alamat </label>
								<div class="col-sm-9">
									<input id="alamat2" <?php echo $color; ?> class="form-control " type="text" name="alamat">
								</div>
							</div>										
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Lats </label>
								<div class="col-sm-9">
									<input id="lats2" <?php echo $color; ?> class="form-control " name="lats">
								</div>
							</div>										
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Longs </label>
								<div class="col-sm-9">
									<input id="longs2" <?php echo $color; ?> class="form-control " name="longs">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right"> Status Customer </label>
								<div class="col-sm-9">
									<select id="status_customer2" class='select_customer' style="width:100%;<?php echo $color_edit; ?>" name="id_status_customer" <?php echo $disable; ?>>
										<?php echo $combo_status_customer; ?>
									</select>
								</div>
							</div>			
								<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-12">
											<?php echo $btn_delete; ?>
											<button type="button" class="btn btn-standar" style="margin-left: 40px;" data-dismiss="modal"> 
														<i class="ace-icon fa fa-undo bigger-110">	</i>Batal
													</button>
										</div>
								</div>								
					</form>			
			</div>		   
        </div>
		</div>
	</div> -->
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