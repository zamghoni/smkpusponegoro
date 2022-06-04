<!doctype html>
<html class="fixed js flexbox flexboxlegacy csstransforms csstransforms3d no-overflowscrolling no-mobile-device custom-scroll sidebar-left-collapsed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>PPDB Online</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/frontend/img/favicon.png">
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
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/pnotify/pnotify.custom.css" />
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
								<?php
			          foreach($img->result()as $key => $data) {?>
			            <?php if ($data->user_id == $this->fungsi->user_login()->id){ ?>
										<img src="<?=base_url('upload/pendaftar/'.$data->foto3x4)?>" alt="Joseph Doe" class="img-circle" data-lock-picture="<?=base_url('upload/pendaftar/'.$data->foto3x4)?>" width="35px" height="35px"/>
							<?php } } ?>
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
									<a role="menuitem" tabindex="-1" href="<?=site_url('pendaftar/edit_usr/'.$this->fungsi->user_login()->id)?>"><i class="fa fa-user"></i> My Profile</a>
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

									<li class="nav-<?=activate_menu('pendaftar')?>">
										<a href="<?=site_url('pendaftar/form_reg')?>">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											<span>Pendaftaran</span>
										</a>
									</li>
				
									
									<li class="nav-<?=activate_menu('pembayaran')?>">
										<a href="<?=site_url('pembayaran/pembayaran')?>">
											<i class="fa fa-money" aria-hidden="true"></i>
											<span>Pembayaran</span>
										</a>
									</li>
									
									
									<?php if ($this->fungsi->user_login()->status != 0) { ?>
									<li class="nav-<?=activate_menu('hasil')?>">
										<a href="<?=site_url('hasil')?>">
											<i class="fa fa-print" aria-hidden="true"></i>
											<span>Pengumuman Hasil PPDB </span>
										</a>
									</li>
								<?php } ?>

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
		<!-- Specific Page Vendor -->
		<script src="<?=base_url()?>assets/backend/assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/vendor/select2/select2.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="<?=base_url()?>assets/backend/assets/javascripts/tables/examples.datatables.default.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
	  <script src="<?=base_url()?>assets/backend/assets/javascripts/tables/examples.datatables.tabletools.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="<?=base_url()?>assets/backend/assets/javascripts/theme.js"></script>
		<!-- Theme Custom -->
		<script src="<?=base_url()?>assets/backend/assets/javascripts/theme.custom.js"></script>
		<!-- Theme Initialization Files -->
		<script src="<?=base_url()?>assets/backend/assets/javascripts/theme.init.js"></script>
		<!-- Examples -->
		<script src="<?=base_url()?>assets/backend/assets/javascripts/forms/examples.wizard.js"></script>

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
