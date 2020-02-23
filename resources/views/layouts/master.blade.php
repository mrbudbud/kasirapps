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
						<center><span class="brand-text font-weight-light">ADMIN</span></center>
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
								<a href="{{ route('transaksi')}}" class="nav-link">
									<i class="nav-icon fas fa-edit"></i>
									<p>Transaksi</p>
								</a>
							</li>
							</li>
							<li class="nav-item">
								<a href="{{ route('tampilBarang')}}" class="nav-link">
									<i class="nav-icon fas fa-dolly-flatbed"></i>
									<p>Tambah Barang</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('tampilCustomer')}} " class="nav-link">
									<i class="nav-icon fas fa-table"></i>
									<p>Tabel Custommer</p>
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
				<strong>Copyright &copy; 2020 Admin</a>.</strong>
				All rights reserved.
				<div class="float-right d-none d-sm-inline-block">
						<b>Version</b> 1.0
				</div>
			</footer>
		</div>
		<!-- ./wrapper -->

		<!-- REQUIRED SCRIPTS -->
		<!-- jQuery -->
		<script type="text/javascript" language="javascript">
        function konfirmasi () {
            var pilihan = confirm ("Apakah Anda Yakin Menghapus Data ?");
            if(pilihan){
                return true
                }else{
                alert ("Proses Di Batalkan")
                return false
                }
        }
    </script>
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