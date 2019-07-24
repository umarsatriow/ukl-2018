<!doctype html>
<html lang="en">

<head>
	<title><?=$judul?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/favicon.png">
	<style type="text/css">
	.dt-button
	{
      background-color: #607D8B;
      color: #fff;
      padding: 7px 12px;
      margin-right: 5px;      
    }
    .dt-buttons a:hover{    	
    	color: white;
    	text-decoration: none;
    }
	</style>

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url()?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url()?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
 	<script src="<?=base_url()?>assets/jquery-datatable.js"></script>
    <!-- JQuery DataTable Css -->
    <link href="<?=base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <script src="<?=base_url()?>assets/plugins/jquery-datatable/jquery.dataTables.js" rel="stylesheet"></script>

    <script src="<?=base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

  
    <!-- Jquery Core Js -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/node-waves/waves.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?=base_url()?>" style="font-size: 20px;font-style: italic;">
					<i class="fa fa-book"></i><b> TOGA MEDIA</b></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div class="navbar-btn navbar-btn-right">
					<div class="btn btn-success update-pro"><i class="fa fa-user" ></i> <span>Selamat datang <?=$this->session->userdata('nama_user')?></span></div>
					<a href="<?=base_url('index.php/login/Logout')?>" class="btn btn-success update-pro"><i class="fa fa-user"></i> <span>Logout</span></a>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<?php if ($this->session->userdata('level')==1): ?>
						<li>
							<a href="<?=base_url()?>" 
								<?php if ($judul=="Dashboard | Umar Sakti"): ?>
								class="active"
								<?php endif ?>>
								<i class="lnr lnr-home"></i> 
								<span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url('index.php/buku')?>" 
								<?php if ($judul=="CRUD Barang | Umar Sakti"): ?>
									class="active"
								<?php endif ?>>
								<i class="lnr lnr-book"></i> <span>CRUD Barang</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url('index.php/user')?>"
							 	<?php if ($judul=="CRUD User | Umar Sakti"): ?>
							 		class="active"
							 	<?php endif ?>>
								<i class="lnr lnr-user"></i> <span>CRUD User</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url('index.php/kategori')?>"
								<?php if ($judul=="CRUD Kategori | Umar Sakti"): ?>
									class="active"
								<?php endif ?>>
								<i class="glyphicon glyphicon-th-list"></i> <span>CRUD Kategori</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url('index.php/history')?>" 
								<?php if ($judul=="History Transaksi| Umar Sakti"): ?>
									class="active"
								<?php endif ?>>
								<i class="glyphicon glyphicon-time"></i> <span>History Transaksi</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url('index.php/transaksi')?>"
								<?php if ($judul=="Transaksi | Umar Sakti"): ?>
									class="active"
								<?php endif ?>>
								<i class="lnr lnr-cart"></i> <span>Transaksi</span>
							</a>
						</li>
						<?php endif ?>
						<?php if ($this->session->userdata('level')==2): ?>
						<li>
							<a href="<?=base_url('index.php/transaksi')?>"
								<?php if ($judul=="Transaksi | Umar Sakti"): ?>
									class="active"
								<?php endif ?>>								
								<i class="lnr lnr-cart"></i> <span>Transaksi</span>
							</a>
						</li>
						<?php endif ?>												
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<?php $this->load->view($konten);?>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 | Umar Sakti | All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?=base_url()?>assets/scripts/klorofil-common.js"></script>
	


    <!-- Jquery DataTable Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url()?>assets/js/admin.js"></script>
    <script src="<?=base_url()?>assets/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="<?=base_url()?>assets/js/demo.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
