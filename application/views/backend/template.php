<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Administrator PPDB Online</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-57x57.png">
	  <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-60x60.png">
	  <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-72x72.png">
	  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-76x76.png">
	  <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-114x114.png">
	  <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-120x120.png">
	  <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-144x144.png">
	  <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-152x152.png">
	  <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>assets/frontend/img/favicon/apple-icon-180x180.png">
	  <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url()?>assets/frontend/img/favicon/android-icon-192x192.png">
	  <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>assets/frontend/img/favicon/favicon-32x32.png">
	  <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/frontend/img/favicon/favicon-96x96.png">
	  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/frontend/img/favicon/favicon-16x16.png">
	  <link rel="manifest" href="<?=base_url()?>assets/frontend/img/favicon/manifest.json">
	  <meta name="msapplication-TileColor" content="#ffffff">
	  <meta name="msapplication-TileImage" content="<?=base_url()?>assets/frontend/img/favicon/ms-icon-144x144.png">
	  <meta name="theme-color" content="#ffffff">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?=base_url()?>assets/backend/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="<?=site_url('dashboard')?>" class="logo">
						<img src="<?=base_url()?>assets/backend/assets/images/logo-login.png" height="45" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<!-- start: search & user box -->
				<div class="header-right">


					<span class="separator"></span>

					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?=base_url()?>assets/backend/assets/images/logo-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="<?=base_url()?>assets/backend/assets/images/logo-user.jpg.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?=$this->fungsi->user_login()->username?></span>
								<span class="role"><?=$this->fungsi->user_login()->email?></span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?=site_url('user/edit/'.$this->fungsi->user_login()->id)?>"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?=site_url('auth/logout')?>"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title" style="color:rgb(195, 195, 195)">
							Menu Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-<?=activate_menu('dashboard')?>">
										<a href="<?=site_url('dashboard')?>">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

									<li class="nav-parent nav-<?=activate_menu('profil')?> nav-<?=activate_menu('jurusan')?>">
										<a>
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<span>Profil</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=site_url('profil')?>">
													 Sejarah
												</a>
											</li>
											<li>
												<a href="<?=site_url('profil/visi')?>">
													 Visi - Misi
												</a>
											</li>
											<li>
												<a href="<?=site_url('profil/org')?>">
													 Struktur Organisasi
												</a>
											</li>
											<li>
												<a href="<?=site_url('jurusan')?>">
													 Jurusan
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-parent nav-<?=activate_menu('kategori')?> nav-<?=activate_menu('info')?>">
										<a>
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											<span>Berita</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=site_url('info')?>">
													 Buat Berita
												</a>
											</li>
											<li>
												<a href="<?=site_url('kategori')?>">
													 Kategori
												</a>
											</li>
										</ul>
									</li>

									<li class="nav-<?=activate_menu('galeri')?>">
										<a href="<?=site_url('galeri')?>">
											<i class="fa fa-file-image-o" aria-hidden="true"></i>
											<span>Galeri</span>
										</a>
									</li>
									<li class="nav-parent nav-<?=activate_menu('gelombang')?> nav-<?=activate_menu('pendaftar')?>">
										<a>
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Pendaftaran</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=site_url('pendaftar')?>">
													 Data Pendaftar
												</a>
											</li>
											<li>
												<a href="<?=site_url('pembayaran')?>">
													 Data Pembayaran
												</a>
											</li>
											<li>
												<a href="<?=site_url('profil/bdaftar')?>">
													 Biaya Pendaftaran
												</a>
											</li>
											<li>
												<a href="<?=site_url('profil/bmasuk')?>">
													 Rincian Biaya Masuk
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-<?=activate_menu('pengumuman')?>">
										<a href="<?=site_url('pengumuman')?>">
											<i class="fa fa-warning" aria-hidden="true"></i>
											<span>Pengumuman</span>
										</a>
									</li>
									<li class="nav-<?=activate_menu('laporan')?>">
										<a href="<?=site_url('laporan')?>">
											<i class="fa  fa-print" aria-hidden="true"></i>
											<span>Laporan Pendaftaran</span>
										</a>
									</li>
									<li class="nav-<?=activate_menu('user')?>">
										<a href="<?=site_url('user')?>">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Manajement User</span>
										</a>
									</li>
									<li class="nav-<?=activate_menu('logout')?>">
										<a href="<?=site_url('auth/logout')?>">
											<i class="fa fa-power-off" aria-hidden="true"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>

				</aside>
				<!-- end: sidebar -->
				<!-- start: page -->
				<?php echo $contents ?>
					<!-- end: page -->
				</section>
			</div>
		</section>

		<!-- Vendor -->
		<script src="<?=base_url()?>assets/backend/assets/vendor/jquery/jquery.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?=base_url()?>assets/backend/assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?=base_url()?>assets/backend/assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?=base_url()?>assets/backend/assets/javascripts/theme.init.js"></script>


	  <script src="<?=base_url()?>assets/backend/assets/vendor/select2/select2.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

	  <!-- Examples -->
	  <script src="<?=base_url()?>assets/backend/assets/javascripts/tables/examples.datatables.default.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/javascripts/tables/examples.datatables.tabletools.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?=base_url()?>assets/backend/assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>

		<script type="text/javascript">
            $(document).ready(function() {
            $('#notice').hide();
            <?php if($this->session->flashdata('error') || $this->session->flashdata('success')){ ?>
                $('#notice').fadeIn(2000);
                $('#notice').delay(5000).fadeOut(3000);
            <?php } ?>
            });
    </script>

	</body>
</html>
