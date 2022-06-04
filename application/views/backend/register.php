<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/frontend/img/favicon.png">
		<title>Registrasi - SMK NU Wahid Hasyim</title>
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/stylesheets/theme.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/stylesheets/skins/default.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/backend/assets/stylesheets/theme-custom.css">
		<!-- Head Libs -->
		<script src="<?=base_url()?>assets/backend/assets/vendor/modernizr/modernizr.js"></script>
	</head>
	<body class="panel-body">
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="#" class="logo pull-left">
					<img src="<?=base_url()?>assets/backend/assets/images/logo-login.png" height="70" alt="Porto Admin" />
				</a>
				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
					</div>
					<div class="panel-body">
            <?php $this->view('message'); ?>
						<?php echo form_open('auth/process_register'); ?>						
							<div class="form-group mb-lg">
								<label>Username</label>
								<input name="username" type="text" class="form-control input-lg" minlength="6" required placeholder="Masukkan Username"/>
							</div>

							<div class="form-group mb-lg">
								<label>E-mail Address</label>
								<input name="email" type="email" class="form-control input-lg" required placeholder="Masukkan Email"/>
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Password</label>
										<input name="password" type="password" class="form-control input-lg" minlength="4" placeholder="Password" />
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Konfirmasi Password</label>
										<input name="konf_password" type="password" class="form-control input-lg" minlength="4" placeholder="Konfirmasi" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox" required/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" name="add" class="btn btn-primary hidden-xs">Sign Up</button>
									<button type="submit" name="add" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>
								<p class="text-center">Sudah punya akun? <a href="<?=site_url('auth/login')?>">Login!</a>
								<p class="text-center"><a href="<?=site_url('home/ppdb')?>">Kembali ke halaman PPDB</a></p>
						<?php echo form_close(); ?>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright <script>document.write(new Date().getFullYear());</script>. All rights reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
    <script type="text/javascript">
    function tambah(form) {
      if (form.password.value=='') {
        alert('Password, Harus diisi');
        return false;
      } else if (form.konf_password.value=='') {
        alert('Konfirmasi Password, Harus diisi');
        return false;
      } else if (form.konf_password.value!=form.password.value) {
        alert('Konfirmasi Password, Tidak Sesuai');
        return false;
      }else {
        return true;
      };
    }
    </script>

	</body>
</html>
