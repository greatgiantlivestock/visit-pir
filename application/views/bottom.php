					</div><!--/.row-fluid-->

				</div><!--/.page-content-->

			</div><!--/.main-content-->

		</div><!--/.main-container-->



			<!--basic scripts-->



		<!--[if !IE]> -->





		<!-- <![endif]-->



		<!--[if IE]>

<script type="text/javascript">

 window.jQuery || document.write("<script src='<?php echo base_url();?>asset/js/jquery1x.js'>"+"<"+"/script>");

</script>

<![endif]-->

		

		<!-- page specific plugin scripts -->



		<!-- ace scripts -->

		<script src="<?php echo base_url();?>asset/js/ace/elements.scroller.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/elements.colorpicker.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/elements.fileinput.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/elements.typeahead.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/elements.wysiwyg.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/elements.spinner.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/elements.treeview.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/elements.wizard.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/elements.aside.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.ajax-content.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.touch-drag.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.sidebar.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.sidebar-scroll-1.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.submenu-hover.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.widget-box.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.settings.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.settings-rtl.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.settings-skin.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.widget-on-reload.js"></script>

		<script src="<?php echo base_url();?>asset/js/ace/ace.searchbox-autocomplete.js"></script>



		<script src="<?php echo base_url();?>asset/js/select2.js"></script>





		<script src="<?php echo base_url(); ?>asset/js/tableExport.js"></script>



		<script type="text/javascript">

			$(document).ready(function() {

			  $(".select_rph").select2();

			  $(".select_barang").select2();

			  $(".select_karyawan").select2();

			  $(".select_kegiatan").select2();

			  $(".select_customer").select2();

			  $(".select2").select2();

			});

		</script>



		<script type="text/javascript">

		    $(function () {

		      $('#tgl').datetimepicker({

		        format: 'YYYY-MM-DD'

		      })

		      $('#tgl2').datetimepicker({

		        format: 'YYYY-MM-DD'

		      })		        

		      $('#tgl3').datetimepicker({

		        format: 'YYYY-MM-DD'

		      })		        

		    });

  		</script>



  		<script type="text/javascript">

  			$("#bootbox-regular").on(ace.click_event, function() {

					bootbox.prompt("What is your name?", function(result) {

						if (result === null) {

							

						} else {

							

						}

					});

				});

  		</script>



		<!-- inline scripts related to this page -->

		<script type="text/javascript">

			jQuery(function($) {

			 var $sidebar = $('.sidebar').eq(0);

			 if( !$sidebar.hasClass('h-sidebar') ) return;

			

			 $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {

				if( event_name !== 'sidebar_fixed' ) return;

			

				var sidebar = $sidebar.get(0);

				var $window = $(window);

			

				//return if sidebar is not fixed or in mobile view mode

				var sidebar_vars = $sidebar.ace_sidebar('vars');

				if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {

					$sidebar.removeClass('lower-highlight');

					//restore original, default marginTop

					sidebar.style.marginTop = '';

			

					$window.off('scroll.ace.top_menu')

					return;

				}

			

			

				 var done = false;

				 $window.on('scroll.ace.top_menu', function(e) {

			

					var scroll = $window.scrollTop();

					scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling

					if (scroll > 17) scroll = 17;

			

			

					if (scroll > 16) {			

						if(!done) {

							$sidebar.addClass('lower-highlight');

							done = true;

						}

					}

					else {

						if(done) {

							$sidebar.removeClass('lower-highlight');

							done = false;

						}

					}

			

					sidebar.style['marginTop'] = (17-scroll)+'px';

				 }).triggerHandler('scroll.ace.top_menu');

			

			 }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);

			

			 $(window).on('resize.ace.top_menu', function() {

				$(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);

			 });

			

			

			});

		</script>



		<script type="text/javascript">

			$(function() {

				var oTable1 = $('#sample-table-2').dataTable();

					

			})

		</script>



		<script type="text/javascript">

			$('.show-details-btn').on('click', function(e) {

				e.preventDefault();

				$(this).closest('tr').next().toggleClass('open');

				//$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');

			});

		</script>



		<script type="text/javascript">

        	$(document).on("click", "#openMapdetail", function () {

        		var lat = $(this).attr('data-lat');

        		var lng = $(this).attr('data-lng');

        		$.ajax({

				    url: "<?php echo base_url(); ?>Rekap_salesman/get_map", 

				    async: false,

				    type: "POST",    

				    data: "lat="+lat+"&lng="+lng,   

				    dataType: "html",

				    success: function(data) {

				      $('#data_map').html(data); 

				      $("#ModalMap").modal('show');

				    }

				}) 

        	});

        </script>



		



		<script type="text/javascript">

	        function printDiv(divName) {

	             var printContents = document.getElementById(divName).innerHTML;

	             var originalContents = document.body.innerHTML;



	             document.body.innerHTML = printContents;



	             window.print();



	             document.body.innerHTML = originalContents;

	        }

      	</script>





		<script type="text/javascript">

		    function isNumberKey(evt)

		       {

		          var charCode = (evt.which) ? evt.which : evt.keyCode;

		          if (charCode != 46 && charCode > 31 

		            && (charCode < 48 || charCode > 57))

		             return false;



		          return true;

		       }

  		</script>	



		<script type="text/javascript">

			$(document).ready(function() {

			  $(".select2").select2();

			  $(".select_batch").select2();

			//   $(".select_customer").select2();

			});

		</script>



			<script type="text/javascript">

				$(document).on('click', '.pilih_processing', function (e) {  

					document.getElementById("id_processmaster").value = $(this).attr('data-idpr');

					document.getElementById("kode").value = $(this).attr('data-kode');

					document.getElementById("batch").value = $(this).attr('data-batch');

					document.getElementById("tgl_pasturisasi").value = $(this).attr('data-tgl');

					$('#ModalProcessing').modal('hide');	

					var vl = document.getElementById("id_processmaster").value;					

					$.ajax({

				            url: "<?php echo base_url(); ?>Print_barcode/get_product",      //memanggil function controller dari url

				            async: false,

				            type: "POST",     //jenis method yang dibawa ke function

				            data: "id_pr="+vl,   //data yang akan dibawa di url

				            dataType: "html",

				            success: function(data) {

				                $('#id_product').html(data); 

				            }

				    }) 

				});

			</script>



			<script type="text/javascript">

				$(document).ready(function(){

					$("#product_jual").change(function(){

						var product = $("#product_jual").val();

						var customer = $("#customer").val();

						$.ajax({

							type:"POST",

							url: "<?php echo base_url(); ?>master_harga/ambil_harga/",

							data: "product="+product+"&customer="+customer,

							cache: false,

							success: function(msg){

								$("#harga").val(msg);

							}

						});

					});



					$("#gudang_acc").change(function(){

						var gudang_acc = $("#gudang_acc").val();

						$.ajax({

							type:"POST",

							url: "<?php echo base_url(); ?>kartu_stock/ambil_batch/",

							data: "gudang_acc="+gudang_acc,

							cache: false,

							success: function(msg){

								$("#batch_acc").html(msg);

							}

						});

					});



					$("#pilih_nota").change(function(){

						var nota = $("#pilih_nota").val();

						if(nota == "") {

							document.location.href="<?php echo base_url(); ?>penjualan";

						} else {							

							document.location.href="<?php echo base_url(); ?>penjualan/index/"+nota;

						}

					});



					$("#pilih_transfer").change(function(){

						var nota = $("#pilih_transfer").val();

						if(nota == "") {

							document.location.href="<?php echo base_url(); ?>transfer";

						} else {							

							document.location.href="<?php echo base_url(); ?>transfer/index/"+nota;

						}

					});



					$("#pilih_processing").change(function(){

						var processing = $("#pilih_processing").val();

						if(processing == "") {

							document.location.href="<?php echo base_url(); ?>processing";

						} else {							

							document.location.href="<?php echo base_url(); ?>processing/index/"+processing;

						}

					});



							

					$("#jenis_transfer").change(function(){

						var jenis_transfer = $("#jenis_transfer").val();

						var id_gudang = $("#id_gudang").val();

						var tipe = $("#tipe").val();



						if(tipe == 'add') { 

							if(jenis_transfer == "OUT") {

								$("#gudang_asalText").val(id_gudang); 

								$("#gudang_asal").val(id_gudang); 

								$("#gudang_asal").attr("disabled", true);

								$("#gudang_asal").css("background","#F2F1EF");		



								$("#gudang_tujuan").val("");

								$("#gudang_tujuanText").val(""); 

								$("#gudang_tujuan").attr("disabled", false);

								$("#gudang_tujuan").attr("required", true);

								$("#gudang_tujuan").css("background","#fff");

							} else if(jenis_transfer == "IN") {		

								$("#gudang_tujuanText").val(id_gudang); 				

								$("#gudang_tujuan").val(id_gudang);

								$("#gudang_tujuan").attr("disabled", true);

								$("#gudang_tujuan").css("background","#F2F1EF");



								$("#gudang_asalText").val(""); 

								$("#gudang_asal").val("");

								$("#gudang_asal").attr("disabled", false);

								$("#gudang_asal").attr("required", true);

								$("#gudang_asal").css("background","#fff");

							} else {							

								$("#gudang_asal").val("");

								$("#gudang_asalText").val(""); 

								$("#gudang_asal").attr("disabled", false);

								$("#gudang_asal").css("background","#fff");

								$("#gudang_tujuanText").val(""); 

								$("#gudang_tujuan").val("");

								$("#gudang_tujuan").attr("disabled", false);

								$("#gudang_tujuan").css("background","#fff");

							}

						} else if(tipe == 'edit') {

							if(jenis_transfer == "OUT") {

								$("#gudang_asalText").val(nama_gudang); 

								$("#gudang_asal").val(id_gudang); 

								$("#gudang_asalTextxx").val(id_gudang); 

								$("#gudang_asal").attr("disabled", true);

								$("#gudang_asal").css("background","#F2F1EF");		



								$("#gudang_tujuan").val("");

								$("#gudang_tujuanTextxx").val(""); 

								$("#gudang_tujuan").show();

								$("#gudang_tujuanText").hide(); 

								$("#gudang_tujuan").attr("disabled", false);

								$("#gudang_tujuan").attr("required", true);

								$("#gudang_tujuan").css("background","#fff");

							} else if(jenis_transfer == "IN") {		

								$("#gudang_tujuanText").val(nama_gudang); 				

								$("#gudang_tujuan").val(id_gudang);

								$("#gudang_tujuan").attr("disabled", true);

								$("#gudang_tujuan").css("background","#F2F1EF");

								$("#gudang_tujuanTextxx").val(id_gudang); 



								$("#gudang_asalText").hide(); 

								$("#gudang_asalTextxx").val(""); 

								$("#gudang_asal").show();

								$("#gudang_asal").val("");

								$("#gudang_asal").attr("disabled", false);

								$("#gudang_asal").attr("required", true);

								$("#gudang_asal").css("background","#fff");

							} else {							

								$("#gudang_asal").val("");

								$("#gudang_asalText").val(""); 

								$("#gudang_asal").attr("disabled", false);

								$("#gudang_asal").css("background","#fff");

								$("#gudang_tujuanText").val(""); 

								$("#gudang_tujuan").val("");

								$("#gudang_tujuan").attr("disabled", false);

								$("#gudang_tujuan").css("background","#fff");

							}

						}

					});

				});

				 

			</script>





		



			<script type="text/javascript">

				$(document).on("click", "#openModalInput", function () {

				     var id = $(this).data('id');

				     var tipe = $(this).data('tipe');

				     $(".modal-body #id_transfermaster").val( id );

				     $(".modal-body #tipe").val( tipe );

				});

				$(document).on("click", "#openModalEdit", function () {

				     var id = $(this).data('id');

				     var tipe = $(this).data('tipe');

				     var product = $(this).data('product');

				     var idm = $(this).data('idm');

				     var box = $(this).data('box');

				     var batch = $(this).data('batch');

				     var qty = $(this).data('qty');

				     $(".modal-body #id_transfermaster").val( idm );

				     $(".modal-body #id_transferdetail").val( id );

				     $(".modal-body #no_box").val( box );

				     $(".modal-body #batch").val( batch );

				     $(".modal-body #qty").val( qty );

				     $(".modal-body #tipe").val( tipe );

				     $(".modal-body #product").val(product);

				});



				$(document).on("click", "#openModalInputJual", function () {

				     var id = $(this).data('id');

				     var tipe = $(this).data('tipe');

				     $(".modal-body #id_keluarmaster").val( id );

				     $(".modal-body #tipe").val( tipe );

				     $(".modal-body #id_keluardetail").val("");

				     $(".modal-body #batch").val("");

				     $(".modal-body #harga").val("");

				     $(".modal-body #qty").val("");

				     $(".modal-body #product_jual").val("").trigger('change');

				});



				$(document).on("click", "#openModalInputJual2", function () {

				     var id = $(this).data('id');

				     var tipe = $(this).data('tipe');

				     $(".modal-body #id_keluarmaster").val( id );

				     $(".modal-body #tipe").val( tipe );

				});



				$(document).on("click", "#openModalAddDetail", function () {

				     var tipe = $(this).data('tipe');

				     $(".modal-body #tipe").val( tipe );

				});



				$(document).on("click", "#openModalCopyRencana", function () {

				     var id_rencana_header = $(this).data('id_rencana_header');

				     $(".modal-body #id_rencana_header").val( id_rencana_header );

				});



				$(document).on("click", "#openModalEditDetail", function () {

				     var id_detail_request = $(this).data('id_detail_request');

				     var tipe = $(this).data('tipe');

				     var id_product = $(this).data('id_product');

				     var id_jenis_transaksi = $(this).data('id_jenis_transaksi');

				     var id_shipping_point = $(this).data('id_shipping_point');

				     var satuan = $(this).data('satuan');

				     var batch = $(this).data('batch');

				     var keterangan = $(this).data('keterangan');

				     var qty = $(this).data('qty');

				     $(".modal-body #id_detail_request1").val( id_detail_request );

				     $(".modal-body #qty1").val( qty );

				     $(".modal-body #tipe1").val( tipe );

					 $(".modal-body #product1").val(id_product).trigger('change');

				     $(".modal-body #satuan1").val(satuan).trigger('change');

				     $(".modal-body #batch1").val(batch).trigger('change');

					 $(".modal-body #jenis_transaksi1").val(id_jenis_transaksi).trigger('change');

					 $(".modal-body #id_shipping_point").val(id_shipping_point).trigger('change');

				     $(".modal-body #keterangan1").val(keterangan).trigger('change');

				});

				$(document).on("click", "#openModalEditCustomer", function () {

				     var id_customer = $(this).data('id_customer');

				     var tipe = $(this).data('tipe');

				     var kode_customer = $(this).data('kode_customer');

				     var nama_customer = $(this).data('nama_customer');

				     var no_hp = $(this).data('no_hp');

				     var nama_usaha = $(this).data('nama_usaha');

				     var wilayah = $(this).data('wilayah');

				     var city = $(this).data('city');

				     var alamat = $(this).data('alamat');

				     var lats = $(this).data('lats');

				     var longs = $(this).data('longs');

				     var status_customer = $(this).data('status_customer');



				     $(".modal-body #kode_customer1").val( kode_customer );

				     $(".modal-body #nama_customer1").val( nama_customer );

				     $(".modal-body #no_hp1").val( no_hp );

				     $(".modal-body #nama_usaha1").val( nama_usaha );

				     $(".modal-body #wilayah1").val(wilayah).trigger('change');

					 $(".modal-body #city1").val(city).trigger('change');

				     $(".modal-body #alamat1").val(alamat).trigger('change');

					 $(".modal-body #lats1").val(lats).trigger('change');

				     $(".modal-body #longs1").val(longs).trigger('change');

				     $(".modal-body #status_customer1").val(status_customer).trigger('change');

				     $(".modal-body #id_customer1").val(id_customer).trigger('change');

				     $(".modal-body #tipe1").val(tipe).trigger('change');

				});

				$(document).on("click", "#openModalDeleteCustomer", function () {

				     var id_customer = $(this).data('id_customer');

				     var tipe = $(this).data('tipe');

				     var kode_customer = $(this).data('kode_customer');

				     var nama_customer = $(this).data('nama_customer');

				     var no_hp = $(this).data('no_hp');

				     var nama_usaha = $(this).data('nama_usaha');

				     var wilayah = $(this).data('wilayah');

				     var city = $(this).data('city');

				     var alamat = $(this).data('alamat');

				     var lats = $(this).data('lats');

				     var longs = $(this).data('longs');

				     var status_customer = $(this).data('status_customer');



				     $(".modal-body #kode_customer2").val( kode_customer );

				     $(".modal-body #nama_customer2").val( nama_customer );

				     $(".modal-body #no_hp2").val( no_hp );

				     $(".modal-body #nama_usaha2").val( nama_usaha );

				     $(".modal-body #wilayah2").val(wilayah).trigger('change');

					 $(".modal-body #city2").val(city).trigger('change');

				     $(".modal-body #alamat2").val(alamat).trigger('change');

					 $(".modal-body #lats2").val(lats).trigger('change');

				     $(".modal-body #longs2").val(longs).trigger('change');

				     $(".modal-body #status_customer2").val(status_customer).trigger('change');

				     $(".modal-body #id_customer2").val(id_customer).trigger('change');

				     $(".modal-body #tipe2").val(tipe);

				});

				$(document).on("click", "#openModalEditUser", function () {

				     var tipe = $(this).data('tipe');

					 var id_user = $(this).data('id_user');

				     var id_karyawan = $(this).data('id_karyawan');

				     var no_hp = $(this).data('no_hp');

				     var id_departemen = $(this).data('id_departemen');

				     var id_role = $(this).data('id_role');

				     var id_wilayah = $(this).data('id_wilayah');

				     var username = $(this).data('username');



				     $(".modal-body #tipe").val(tipe);

					 $(".modal-body #id_user").val(id_user);

				     $(".modal-body #id_karyawan").val(id_karyawan).trigger('change');

				     $(".modal-body #no_hp").val(no_hp).trigger('change');

				     $(".modal-body #id_departemen").val(id_departemen).trigger('change');

				     $(".modal-body #id_role").val(id_role).trigger('change');

					 $(".modal-body #id_wilayah").val(id_wilayah).trigger('change');

				     $(".modal-body #username").val(username).trigger('change');

				});

				$(document).on("click", "#openAddShippingPoint", function () {

				     var tipe = $(this).data('tipe');

					 var id_user = $(this).data('id_user');

				     var id_karyawan = $(this).data('id_karyawan');

				     var no_hp = $(this).data('no_hp');

				     var id_departemen = $(this).data('id_departemen');

				     var id_role = $(this).data('id_role');

				     var id_wilayah = $(this).data('id_wilayah');

				     var username = $(this).data('username');



				     $(".modal-body #tipe_shp").val(tipe);

					 $(".modal-body #id_user_shp").val(id_user);

				     $(".modal-body #id_karyawan_shp").val(id_karyawan).trigger('change');

				     $(".modal-body #no_hp_shp").val(no_hp).trigger('change');

				     $(".modal-body #id_departemen_shp").val(id_departemen).trigger('change');

				     $(".modal-body #id_role_shp").val(id_role).trigger('change');

					 $(".modal-body #id_wilayah_shp").val(id_wilayah).trigger('change');

				     $(".modal-body #username_shp").val(username).trigger('change');

				});

				$(document).on("click", "#openModalDeleteUser", function () {

				     var tipe = $(this).data('tipe');

				     var id_user = $(this).data('id_user');

				     var id_karyawan = $(this).data('id_karyawan');

				     var no_hp = $(this).data('no_hp');

				     var id_departemen = $(this).data('id_departemen');

				     var id_role = $(this).data('id_role');

				     var id_wilayah = $(this).data('id_wilayah');

				     var username = $(this).data('username');



				     $(".modal-body #tipe1").val(tipe);

				     $(".modal-body #id_user1").val(id_user);

				     $(".modal-body #id_karyawan1").val(id_karyawan).trigger('change');

				     $(".modal-body #no_hp1").val(no_hp).trigger('change');

				     $(".modal-body #id_departemen1").val(id_departemen).trigger('change');

				     $(".modal-body #id_role1").val(id_role).trigger('change');

					 $(".modal-body #id_wilayah1").val(id_wilayah).trigger('change');

				     $(".modal-body #username1").val(username).trigger('change');

				});

				$(document).on("click", "#openModalEditProduct", function () {

				     var id_product = $(this).data('id_product');

				     var tipe = $(this).data('tipe');

				     var kode_product = $(this).data('kode_product');

				     var nama_product = $(this).data('nama_product');

				     var id_satuan = $(this).data('satuan_product');

				     var id_plant_group = $(this).data('plant_group');



				     $(".modal-body #id_product").val(id_product);

					 $(".modal-body #tipe").val(tipe);

				     $(".modal-body #kode_product").val(kode_product);

				     $(".modal-body #nama_product").val(nama_product);

				     $(".modal-body #satuan").val(id_satuan).trigger('change');

				     $(".modal-body #plant_group").val(id_plant_group).trigger('change');

				});

				$(document).on("click", "#openModalEditShipping", function () {

				     var id_request = $(this).data('id_request');

				     var id_status_kirim = $(this).data('id_status_kirim');

				     var tipe = $(this).data('tipe');

				     var id_shipping = $(this).data('id_shipping');

				     var tanggal_shipping = $(this).data('tanggal_shipping');

				     var tanggal_rencana_kirim = $(this).data('tanggal_rencana_kirim');

				     var tanggal_kirim = $(this).data('tanggal_kirim');

				     var id_shipping_point = $(this).data('id_shipping_point');

				     var id_detail_request = $(this).data('id_detail_request');

				     var no_do = $(this).data('no_do');

				     var id_jenis_transaksi = $(this).data('id_jenis_transaksi');

				     var ket_do = $(this).data('ket_do');



					 $(".modal-body #tipe").val(tipe);

				     $(".modal-body #id_shipping").val(id_shipping);

				     $(".modal-body #tgl").val(tanggal_shipping);

				     $(".modal-body #tgl2").val(tanggal_rencana_kirim).trigger('change');

				     $(".modal-body #id_detail_request").val(id_detail_request);

				     $(".modal-body #id_shipping_point").val(id_shipping_point).trigger('change');

				     $(".modal-body #id_status_kirim").val(id_status_kirim).trigger('change');

				     $(".modal-body #id_request").val(id_request).trigger('change');

				     $(".modal-body #tanggal_kirim").val(tanggal_kirim);

				     $(".modal-body #no_do").val(no_do).trigger('change');

				     $(".modal-body #id_jenis_transaksi").val(id_jenis_transaksi).trigger('change');

				     $(".modal-body #ket_do").val(ket_do).trigger('change');

				});

				$(document).on("click", "#openModalEditShipping1", function () {

				     var id_status_kirim = $(this).data('id_status_kirim');

				     var tipe = $(this).data('tipe');

				     var id_shipping = $(this).data('id_shipping');

				     var id_detail_request = $(this).data('id_detail_request');

				     var id_shipping_point = $(this).data('id_shipping_point');

				     var tanggal_shipping = $(this).data('tanggal_shipping');

				     var tanggal_mulai = $(this).data('tanggal_mulai');

				     var tanggal_sampai = $(this).data('tanggal_sampai');

				     var kode_shipping_point = $(this).data('kode_shipping_point');

				     var nama_status_kirim = $(this).data('nama_status_kirim');



				     $(".modal-body #id_status_kirim").val(id_status_kirim).trigger('change');

					 $(".modal-body #tipe").val(tipe);

				     $(".modal-body #id_shipping").val(id_shipping);

				     $(".modal-body #id_detail_request").val(id_detail_request);

				     $(".modal-body #tgl3").val(tanggal_shipping);

				     $(".modal-body #tanggal_mulai1").val(tanggal_mulai);

				     $(".modal-body #tanggal_sampai1").val(tanggal_sampai);

				     $(".modal-body #kode_shipping_point1").val(kode_shipping_point);

				     $(".modal-body #nama_status_kirim1").val(nama_status_kirim);

				     $(".modal-body #id_shipping_point").val(id_shipping_point).trigger('change');

				});

				$(document).on("click", "#openModalScrapping", function () {

				     var tipe = $(this).data('tipe');

				     var id_request = $(this).data('id_request');

				     var id_realisasi = $(this).data('id_realisasi');

				     var tanggal_realisasi = $(this).data('tanggal_realisasi');



					 $(".modal-body #tipe").val(tipe);

					 $(".modal-body #id_request12").val(id_request).trigger('change');

				     $(".modal-body #id_realisasi12").val(id_realisasi).trigger('change');

				     $(".modal-body #tanggal_realisasi").val(tanggal_realisasi).trigger('change');

				});

				$(document).on("click", "#openModalEditdetailshipment", function () {

				     var id_detail_request = $(this).data('id_detail_request');

				     var tipe = $(this).data('tipe');

				     var qty = $(this).data('qty');

				     var nama_product = $(this).data('nama_product');

				     var qty_rev = $(this).data('qty_rev');



				     $(".modal-body #dtid_detail_request").val(id_detail_request).trigger('change');

					 $(".modal-body #dttipe").val(tipe);

				     $(".modal-body #dtqty").val(qty);

				     $(".modal-body #dtnama_product").val(nama_product);

				     $(".modal-body #dtqty_rev").val(qty_rev).trigger('change');

				});

				$(document).on("click", "#openModalViewPO", function () {

				     var title = $(this).data('title');

				     $(".modal-body #title").val(title);

				});

				$(document).on("click", "#openModalDeleteProduct", function () {

				     var id_product = $(this).data('id_product');

				     var tipe = $(this).data('tipe');

				     var kode_product = $(this).data('kode_product');

				     var nama_product = $(this).data('nama_product');

				     var id_satuan = $(this).data('satuan_product');

				     var id_plant_group = $(this).data('plant_group');



				     $(".modal-body #id_product1").val(id_product);

					 $(".modal-body #tipe1").val(tipe);

				     $(".modal-body #kode_product1").val(kode_product);

				     $(".modal-body #nama_product1").val(nama_product);

				     $(".modal-body #satuan1").val(id_satuan).trigger('change');

				     $(".modal-body #plant_group1").val(id_plant_group).trigger('change');

				});

				

				$(document).on("click", "#openModalEditDetailOrder", function () {

				     var id = $(this).data('id');

				     var tipe = $(this).data('tipe');

				     var product = $(this).data('product');

				     var idm = $(this).data('idm');

				     var batch = $(this).data('batch');

				     var harga = $(this).data('harga');

				     var qty = $(this).data('qty');

				     $(".modal-body #id_keluarmaster").val( idm );

				     $(".modal-body #id_keluardetail").val( id );

				     $(".modal-body #harga").val( harga );

				     $(".modal-body #qty").val( qty );

				     $(".modal-body #tipe").val( tipe );

				     $(".modal-body #product_jual").val(product).trigger('change');

				     $(".modal-body #batch").val(batch).trigger('change');

				});



				$(document).on("click", "#openModalHapusTransfer", function () {

				     var id = $(this).data('id');

				     var product = $(this).data('product');

				     var idm = $(this).data('idm');

				     var batch = $(this).data('batch');

				     var qty = $(this).data('qty');

				      var no_box = $(this).data('no_box');

				     $(".modal-body #id_transfermaster").val( idm );

				     $(".modal-body #id_transferdetail").val( id );

				     $(".modal-body #qty").val( qty );

				      $(".modal-body #no_box").val( no_box );

				     $(".modal-body #product").val(product).trigger('change');

				     $(".modal-body #batch").val(batch).trigger('change');

				});



				$(document).on("click", "#openModalHapusJual", function () {

				     var id = $(this).data('id');

				     var product = $(this).data('product');

				     var idm = $(this).data('idm');

				     var batch = $(this).data('batch');

				     var qty = $(this).data('qty');

				      var harga = $(this).data('harga');

				     $(".modal-body #id_keluarmaster").val( idm );

				     $(".modal-body #id_keluardetail").val( id );

				     $(".modal-body #qty").val( qty );

				      $(".modal-body #harga").val( harga );

				     $(".modal-body #product").val(product).trigger('change');

				     $(".modal-body #batch").val(batch).trigger('change');

				});

			</script>





			<script type="text/javascript">

				$(document).on('keypress','#barcode',function(e){



				    if(e.keyCode==13){

				        e.preventDefault();

				    }



				  

				});

			</script>





			<script type="text/javascript">

				$(document).ready(function () {

				     $('#cbBarcode').click(function () {

				         var $this = $(this);

				         if ($this.is(':checked')) {

				             $.ajax({

								type:"POST",

								url: "<?php echo base_url(); ?>transfer/selectBarcode/",

								data: "barcode=1",

								cache: false,

								success: function(msg){

				             		window.location.reload();

								}

							});

				         } else {

				             $.ajax({

								type:"POST",

								url: "<?php echo base_url(); ?>transfer/selectBarcode/",

								data: "barcode=0",

								cache: false,

								success: function(msg){

				             		window.location.reload();

								}

							});

				         }

				     });

				 });

			</script>



			





			<script type="text/javascript">

				$(document).on('click', '.pilih_trf', function (e) {  

					document.getElementById("id_product").value = $(this).attr('data-id_product');

					document.getElementById("nama_product").value = $(this).attr('data-nama_product');

					document.getElementById("batch").value = $(this).attr('data-batch');

					document.getElementById("qty").value = $(this).attr('data-qty');

					document.getElementById("no_box").value = $(this).attr('data-no_box');

					document.getElementById("id_processdetail").value = $(this).attr('data-id_processdetail');

					$('#ModalTrf').modal('hide');						

				});

			</script>



			<script type="text/javascript">

				$(document).on('click', '.pilih_penjualan', function (e) {  

					document.getElementById("id_product").value = $(this).attr('data-idpr');

					document.getElementById("id_keluardetail").value = $(this).attr('data-idkl');

					document.getElementById("nama_product").value = $(this).attr('data-nama_product');

					document.getElementById("batch").value = $(this).attr('data-batch');

					document.getElementById("qty").value = $(this).attr('data-qty');

					$('#ModalPenjualan').modal('hide');						

				});

			</script>





			<script type="text/javascript">

			    function exportTo(type) {

			      $('#tblExport').tableExport({

			        filename: 'Laporan Penjualan_%DD%-%MM%-%YY%-%ss%',

			        format: type

			      });

			    }



				function exportHistory(type) {

		      		$('.table').tableExport({

						filename: 'History Sales Order %DD%-%MM%-%YY%',

						format: type

		      		});

		    	}



				function exportOrderList(type) {

		      		$('.table').tableExport({

						filename: 'Order List %DD%-%MM%-%YY%',

						format: type

		      		});

		    	}
				function exportPengirimanList(type) {

		      		$('.table').tableExport({

						filename: 'Pengiriman All %DD%-%MM%-%YY%',

						format: type

		      		});

		    	}

				function exportScrappingList(type) {

		      		$('.table').tableExport({

						filename: 'Scrapping List %DD%-%MM%-%YY%',

						format: type

		      		});

		    	}

				function exportRealisasiKunjungan(type) {

		      		$('.table').tableExport({

						filename: 'Export Realisasi Kunjungan %DD%-%MM%-%YY%',

						format: type

		      		});

		    	}

				function exportRekapSales(type) {

		      		$('.table').tableExport({

						filename: 'Export Rekap Sales %DD%-%MM%-%YY%',

						format: type

		      		});

		    	}

				function exportStockFisik(type) {

		      		$('.table').tableExport({

						filename: 'Export History Stock Fisik %DD%-%MM%-%YY%',

						format: type

		      		});

		    	}

				function exportStockCustomer(type) {

		      		$('.table').tableExport({

						filename: 'Export Stock Customer %DD%-%MM%-%YY%',

						format: type

		      		});

		    	}

			</script>



			<script type="text/javascript">

				$(document).ready(function(){

					$('#rb_lunas').click(function () {

				        var $this = $(this);

				        if ($this.is(':checked')) {

				            $(".tgl_lunas").val("Tanggal Transaksi");

				            $(".tgl_lunas").attr("readonly",true);

				        } 

				    });



				    $('#rb_promosi').click(function () {

				        var $this = $(this);

				        if ($this.is(':checked')) {

				            $(".tgl_lunas").val("Tanggal Transaksi");

				            $(".tgl_lunas").attr("readonly",true);

				        } 

				    });



				    $('#rb_blunas').click(function () {

				        var $this = $(this);

				        if ($this.is(':checked')) {

				            $(".tgl_lunas").val("");

				            $(".tgl_lunas").attr("readonly",true);

				        } 

				    });

				});

			</script>





			<script type="text/javascript">

				$(document).ready(function(){

					$("#product_jual").change(function(){

						var product = $("#product_jual").val();

						$.ajax({

							type:"POST",

							url: "<?php echo base_url(); ?>penjualan/ambil_batch/",

							data: "product="+product,

							cache: false,

							success: function(msg){

								$("#batch").html(msg);

							}

						});

					});



					$("#product_jual2").change(function(){

						var product = $("#product_jual2").val();

						$.ajax({

							type:"POST",

							url: "<?php echo base_url(); ?>penjualan/ambil_batch/",

							data: "product="+product,

							cache: false,

							success: function(msg){

								$("#batch2").html(msg);

								//alert(msg);

							}

						});



					});

				});

			</script>



			<script type="text/javascript">

				$(document).ready(function(){

			      	$('#simpan_transfer').click(function() {

				      	var product = $("#product").val();

						var batch = $("#batch").val();

						var no_box = $("#no_box").val();

						var qty = $("#qty").val();

						var id_transfermaster = $("#id_transfermaster").val();

				        $.ajax({

				            type:"POST",

							url: "<?php echo base_url(); ?>Transfer/cekDouble/",

							data: "product="+product+"&batch="+batch+"&id_transfermaster="+id_transfermaster+"&no_box="+no_box+"&qty="+qty,

							cache: false,

							success: function(msg) {

								if(msg == "true") {

									alert("Product & Batch Sudah di input");

								}					

							}

				        });

			      	});

			   	});

			</script>





	</body>

</html> 