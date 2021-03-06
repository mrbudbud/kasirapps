<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="x-ua-compatible" content="ie=edge">
				<title>KasirApps</title>
				<!-- Font Awesome Icons -->
			<link rel="stylesheet" href="{{ url('css/plugins/fontawesome-free/css/all.min.css')}}">
			<!-- overlayScrollbars -->
			<link rel="stylesheet" href="{{ url('css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
			<!-- Theme style -->
			<link rel="stylesheet" href="{{ url('css/dist/css/adminlte.min.css')}}">
			<!-- Google Font: Source Sans Pro -->
			<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		</head>
	<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
					</li>
						<li class="nav-item d-none d-sm-inline-block">

						</li>
				</ul>
				<ul class="navbar-nav ml-auto">
				</ul>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
					<a href="index3.html" class="brand-link">
						<center><span class="brand-text font-weight-light">Manager</span></center>
					</a>

			<!-- Sidebar -->
			<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
						<div class="user-panel mt-4 pb-2 mb-2 d-flex">
								
						</div>
					<!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
							with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="{{ route('summeryThisDay') }}" class="nav-link">
									<i class="nav-icon fas fa-money-bill-alt"> </i>
									<p>Transaksi Hari Ini</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('bonusHarian') }}" class="nav-link">
									<i class="nav-icon fas fa-hand-holding-usd"></i>
									<p>Bonus Harian Terapis</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('rekapTransaksi') }}" class="nav-link">
									<i class="nav-icon fas fa-chart-line"></i>
									<p>Rekap Transaksi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('tampilTerapis')}}" class="nav-link">
									<i class="nav-icon fas fa-user-check"></i>
									<p>Terapis</p>
								</a>
							</li>
							</li>
							<li class="nav-item">
								<a href="{{ route('tampilBarang')}}" class="nav-link">
									<i class="nav-icon fas fa-dolly-flatbed"></i>
									<p>Barang / Jasa</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('tampilCustomer') }}" class="nav-link">
									<i class="nav-icon fas fa-user-friends"></i>
									<p>Custommer</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
									<i class="nav-icon fas fa-sign-out-alt"></i>
									<p>Logout</p>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
								</a>
							</li>
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
			</aside>

		

				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper" style="min-height: 926px;">
					@yield('main_content')
				</div>
			<!-- /.content-wrapper -->
		
			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->

			<!-- Main Footer -->
			<footer class="main-footer">
				<strong>Coco Eyelash &copy; 2020</a>.</strong>
			</footer>
		</div>
		<!-- ./wrapper -->

		<!-- REQUIRED SCRIPTS -->
		<!-- jQuery -->
		<script src="{{ url('css/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap -->
		<script src="{{ url('css/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- overlayScrollbars -->
		<script src="{{ url('css/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{ url('css/dist/js/adminlte.js')}}"></script>

		<!-- OPTIONAL SCRIPTS -->
		<script src="{{ url('css/dist/js/demo.js')}}"></script>

		<!-- PAGE PLUGINS -->
		<!-- jQuery Mapael -->
		<script src="{{ url('css/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
		<script src="{{ url('css/plugins/raphael/raphael.min.js')}}"></script>
		<script src="{{ url('css/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
		<script src="{{ url('css/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
		<!-- ChartJS -->
		<script src="{{ url('css/plugins/chart.js/Chart.min.js')}}"></script>

		<!-- PAGE SCRIPTS -->
		<script src="{{ url('css/dist/js/pages/dashboard2.js')}}"></script>
	</body>

</html>