<div>					    
	<div class="widget-box" id="widget-box-9">
		<div class="widget-header">
			<h5 class="widget-title">
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
 					<?php }else if($this->session->flashdata('error')){ ?>
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<?php echo $this->session->flashdata('error'); ?>
						</div>
					<?php }?>
				<table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Id User</th>
							<th>Shipping Point</th>
							<th>Aksi</th>
						</tr>
					</thead>
				<tbody>
		<?php
		$no = 1;
		foreach($shipping_point->result_array() as $data) { ?>
						<tr>
							<td><?php echo $data['id_user']; ?></td>
							<td><?php echo $data['description']; ?></td>
							<td>
								<!-- <a id="openModalEditDetail" href="#" class="label label-primary" 
									data-id_shipping_point_user="<?php echo $data['id_shipping_point_user']; ?>" 
									data-description="<?php echo $data['description']; ?>" 
									data-tipe="edit"
									data-toggle="modal" 
									data-target="#ModalAddShp">
									<i class="fa fa-edit"></i>
								</a>  -->
								<a href="<?php echo base_url().'user/hapus_shippig_point/'.
									$data['id_shipping_point_user']; ?>" class="label label-danger" 
									onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
		<?php 	$no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
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