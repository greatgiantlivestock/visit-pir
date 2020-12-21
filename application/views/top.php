<!DOCTYPE html>
<html lang="en">
	<head> 
		<meta charset="utf-8" />
		<title><?php echo $judul; ?> | salestrax</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/w3.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/ace-fonts.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/select2.css" />
		<script src="<?php echo base_url();?>asset/js/date-time/moment-with-locales.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>asset/js/jquery.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>asset/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>asset/js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>asset/js/dataTables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url();?>asset/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url();?>asset/js/date-time/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/highcharts.js"></script>
		<script src="<?php echo base_url();?>asset/js/ace-extra.js"></script>
		<style>
			.table thead tr th, .table tbody tr td {
				padding: 3px 10px;
			}
			.carousel .item , .carousel .item img {
				width: 100%;
				height: 450px;
			}
			.tbl_input {
				width: 100%;
			}
			.tbl_input tr td {
				padding: 5px 0;
			}
			.tbl_detail {
				width: 100%;
			}
			.tbl_detail tr td {
				padding: 3px 0;
			}
			.tbl_detail tr th {
				background: #59ABE3;
				border: 1px solid #4183D7;
			}
			.tbl_detail tr td {
				background: #E4F1FE;
				border: 1px solid #4183D7;
			}
			.tbl_jual_detail {
				width:100%;
				table-layout: fixed;
				border: 1px solid #ccc;			
			}
			.tbl_jual_detail th,
			.tbl_jual_detail td {
				padding: 5px;
				text-align: left;
				min-width: 200px;
			}
			.tbl_jual_detail thead {
				background-color: #ECECEC;
			}
			.tbl_jual_detail thead tr {
				display: block;
				position: relative;
			}
			.tbl_jual_detail tbody {
				display: block;
				overflow: auto;
				width: 100%;
				height: 200px;
				overflow-y: scroll;
				overflow-x: hidden;
			}
			.tbl_jual_detail tfoot {
				display: block;
				width: 100%;
			}
			.tbl_jual_detail tfoot tr {
				display: block;
				position: relative;
			}
			.show-details-btn:hover {
				cursor: pointer;
			}
			body {margin:0;}
			.topnav {
				overflow: hidden;
				background-color: #333;
			}
			.topnav a {
				float: left;
				display: block;
				color: #ffff;
				text-align: center;
				padding: 10px 3px;
				text-decoration: none;
				font-size: 15px;
			}
			#header{
				width:100%; /*supaya header memenuhi layar*/
				z-index:1000; /*z-index dgn nilai besar berfungsi supaya header selalu tampil didepan*/
				position:fixed;
				height:60px; 
				background:#252525;
			}
			.topnav a:hover {
				background-color: #ddd;
				color: black;
			}
			.active {
				background-color: #4CAF50;
				color: white;
			}
			.topnav .icon {
				display: none;
			}
			@media screen and (max-width: 600px) {
				.topnav a:not(:first-child) {display: none;}
				.topnav a.icon {
					float: right;
					display: block;
				}
			}
			@media screen and (max-width: 600px) {
				.topnav.responsive {position: relative;}
				.topnav.responsive .icon {
					position: absolute;
					right: 0;
					top: 0;
				}
				.topnav.responsive a {
					float: none;
					display: block;
					text-align: left;
				}
			}
		</style>
	</head>
	<body class="no-skin">
		<?php if($this->session->userdata("id_role")==1){?>
			<div class="topnav" id="myTopnav" style="background: linear-gradient(to right, #0B5345 0%, #1A5276 50%, #4A235A  100%);">
				<a href="<?php echo base_url(); ?>dashboard">
					<i class="fa fa-home"></i>
					<span class="menu-text"></span>
				</a>
				<a href="<?php echo base_url(); ?>Customer">
					<i class="menu-icon  fa fa-users"></i>
					<span class="menu-text">  </span>
				</a>
				<a href="<?php echo base_url(); ?>Product">
					<i class="menu-icon  fa fa-archive"></i>
					<span class="menu-text">  </span>
				</a>
				<a href="<?php echo base_url(); ?>User">
					<i class="menu-icon  fa fa-user"></i>
					<span class="menu-text"> Pengguna </span>
				</a>
				<a href="<?php echo base_url(); ?>SO_customer">
					<i class="menu-icon  fa fa-shopping-cart"></i>
					<span class="menu-text"> Sales Order </span>
				</a>
				<a href="<?php echo base_url(); ?>order_list">
					<i class="menu-icon  fa fa-tags"></i>
					<span class="menu-text"> Daftar Order </span>
				</a>
				<a href="<?php echo base_url(); ?>Shipment">
					<i class="menu-icon  fa fa-truck"></i>
					<span class="menu-text"> Pengiriman </span>
				</a>
				<a href="<?php echo base_url(); ?>Report_rencana">
					<i class="menu-icon  fa fa-crosshairs"></i>
					<span class="menu-text"> Report Kunjungan </span>
				</a>
				<a href="<?php echo base_url(); ?>password">
					<i class="menu-icon fa fa-key"></i>
					<span class="menu-text">Password</span>
				</a>
				<a href="#" style="background:green">
					<small> 
						<?php
							$id_user = $this->session->userdata('id_user');
							$q_role = $this->db->query("SELECT nama_role FROM role JOIN mst_user ON role.id_role = mst_user.id_role AND 
														role.id_aplikasi = mst_user.id_aplikasi WHERE mst_user.id_user ='$id_user'")->row(); 
							echo "Profil";
						?>
					</small>
				</a>
				<a href="<?php echo base_url(); ?>Logout" onclick="return confirm('Yakin ingin keluar sistem ?');">
					<span class="fa fa-sign-out">  </span>
				</a>
				<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
			</div>
		<?php }else if($this->session->userdata("id_role")==4){
			$count_pengiriman = $this->db->query("SELECT COUNT(*) AS hitung_pengiriman FROM trx_rencana_master WHERE aproved='0'")->row();?>
				<div class="topnav" id="myTopnav" style="background: linear-gradient(to right, #0B5345 0%, #1A5276 50%, #4A235A  100%);">
					<a href="<?php echo base_url(); ?>dashboard">
						<i class="fa fa-home"></i>
						<span class="menu-text">Home</span>
					</a>
					<a href="<?php echo base_url(); ?>Customer">
						<i class="menu-icon  fa fa-users"></i>
						<span class="menu-text"> Data Petani </span>
					</a>
					<a href="<?php echo base_url(); ?>Aproval">
						<i class="menu-icon  fa fa-check"></i>
						<span class="menu-text" style="margin-right:28px;"> Aproval Kunjungan <label style="border-radius:25px;height:20px;position:absolute;margin-left:3px;" class="label label-warning"> <?php echo "$count_pengiriman->hitung_pengiriman"; ?> </label></span>
					</a>
					<a href="<?php echo base_url(); ?>Aproval_urgent">
						<i class="menu-icon  fa fa-exclamation"></i>
						<span class="menu-text"> Kunjungan Urgent </span>
					</a>
					<a href="<?php echo base_url(); ?>Rencana">
						<i class="menu-icon  fa fa-plus"></i>
						<span class="menu-text"> Rencana Kunjungan </span>
					</a>
					<a href="<?php echo base_url(); ?>Report_rencana">
						<i class="menu-icon  fa fa-crosshairs"></i>
						<span class="menu-text"> Report Kunjungan </span>
					</a>
					<a href="<?php echo base_url(); ?>Rekap_salesman">
						<i class="menu-icon  fa fa-map-marker"></i>
						<span class="menu-text"> Lokasi Kunjungan </span>
					</a>
					<a onclick="document.getElementById('id01').style.display='block'" href="#" style="background:green">
						<small>
							<?php
								$id_user = $this->session->userdata('id_user');
								$q_role = $this->db->query("SELECT * FROM role JOIN mst_user ON role.id_role = mst_user.id_role AND 
															role.id_aplikasi = mst_user.id_aplikasi WHERE mst_user.id_user ='$id_user'")->row(); 
								echo "Profil";
							?>
						</small>
					</a>
					<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
					<div id="id01" class="w3-modal">
						<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">
						<div class="w3-center"><br>
							<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
							<img src="<?php echo base_url();?>img/avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
						</div>
							<div class="w3-container">
								<table>
									<tr>
										<td>
											<b style="margin-right:5px">Nama Karyawan </b> 
										</td>
										<td>
											<b style="margin-right:5px">:</b> 
										</td>
										<td>
											<?php echo $this->session->userdata("nama_karyawan");?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Phone</b> 
										</td>
										<td>
											<b>:</b> 
										</td>
										<td>
											<?php echo $q_role->no_hp;?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Login Sebagai</b> 
										</td>
										<td>
											<b>:</b> 
										</td>
										<td>
											<?php echo $q_role->nama_role;?>
										</td>
									</tr>
								</table>
							</div>
							<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
								<a style="width:100%" class="w3-button w3-blue" href="<?php echo base_url(); ?>Password">
									Ubah Password
								</a>
								<a style="width:100%" class="w3-button w3-red" href="<?php echo base_url(); ?>Logout" >
									Logout
								</a>
							</div>
						</div>
					</div>
				</div>
		<?php }else if($this->session->userdata("id_role")==5){?>
			<div class="topnav" id="myTopnav" style="background: linear-gradient(to right, #0B5345 0%, #1A5276 50%, #4A235A  100%);">
				<a href="<?php echo base_url(); ?>dashboard">
					<i class="fa fa-home"></i>
					<span class="menu-text"></span>
				<a href="<?php echo base_url(); ?>Rencana">
					<i class="menu-icon  fa fa-plus"></i>
					<span class="menu-text"> Kunjungan </span>
				</a>
				<a href="<?php echo base_url(); ?>Report_rencana">
					<i class="menu-icon  fa fa-crosshairs"></i>
					<span class="menu-text"> Report Kunjungan</span>
				</a>
				<a href="<?php echo base_url(); ?>Rekap_salesman">
					<i class="menu-icon  fa fa-map-marker"></i>
					<span class="menu-text"> Rekap Sales </span>
				</a>
				<a onclick="document.getElementById('id02').style.display='block'" href="#" style="background:green">
					<small>
						<?php
							$id_user = $this->session->userdata('id_user');
							$q_role = $this->db->query("SELECT * FROM role JOIN mst_user ON role.id_role = mst_user.id_role AND 
														role.id_aplikasi = mst_user.id_aplikasi WHERE mst_user.id_user ='$id_user'")->row(); 
							echo "Profil";
						?>
					</small>
				</a>
				<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
				<div id="id02" class="w3-modal">
					<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">
					<div class="w3-center"><br>
						<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
						<img src="<?php echo base_url();?>img/avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
					</div>

						<div class="w3-container">
							<table>
								<tr>
									<td>
										<b style="margin-right:5px">Nama Karyawan </b> 
									</td>
									<td>
										<b style="margin-right:5px">:</b> 
									</td>
									<td>
										<?php echo $this->session->userdata("nama_karyawan");?>
									</td>
								</tr>
								<tr>
									<td>
										<b>Phone</b> 
									</td>
									<td>
										<b>:</b> 
									</td>
									<td>
										<?php echo $q_role->no_hp;?>
									</td>
								</tr>
								<tr>
									<td>
										<b>Login Sebagai</b> 
									</td>
									<td>
										<b>:</b> 
									</td>
									<td>
										<?php echo $q_role->nama_role;?>
									</td>
								</tr>
							</table>
						</div>

					<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
						<a style="width:100%" class="w3-button w3-blue" href="<?php echo base_url(); ?>Password">
							Ubah Password
						</a>
						<a style="width:100%" class="w3-button w3-red" href="<?php echo base_url(); ?>Logout">
							Logout
						</a>
					</div>

					</div>
				</div>
			</div>
		<?php }else{    
			redirect("Login"); 
		      }?>
		<script>
			function myFunction() {
				var x = document.getElementById("myTopnav");
				if (x.className === "topnav") {
					x.className += " responsive";
				} else {
					x.className = "topnav";
				}
			}
		</script>
	</body>