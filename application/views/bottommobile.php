					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->
		<script src="<?php echo base_url();?>asset/js/ace/elements.scroller.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/elements.colorpicker.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/elements.fileinput.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/elements.typeahead.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/elements.wysiwyg.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/elements.treeview.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/elements.wizard.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/elements.aside.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/ace.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/ace.ajax-content.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/ace.touch-drag.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/ace.widget-box.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/ace.widget-on-reload.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace/ace.searchbox-autocomplete.js"></script>
		<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable({
					searching:true,
					responsive: true,
					bPaginate: false,
					"order": [[ 0, "desc" ]]
				});
			})
			$(function() {
				var oTable1 = $('#sample-table-3').dataTable();
			})
		</script>