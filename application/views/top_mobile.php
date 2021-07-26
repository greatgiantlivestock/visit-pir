<!DOCTYPE html>
<html lang="en">
	<head> 
		<meta charset="utf-8" />
		<title><?php echo $judul; ?> | Visit</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/w3.css">
		<!-- <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.css" /> -->
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
	