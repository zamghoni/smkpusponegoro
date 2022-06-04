<section role="main" class="content-body">
  <header class="page-header">
    <h2><?=$page;?></h2>

    <div class="right-wrapper pull-right" style="margin-right:45px">
      <ol class="breadcrumbs">
        <li>
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-home"></i>
          </a>
        </li>
        <li><span><?=$page;?></span></li>
      </ol>
    </div>
  </header>
<?php $this->view('message'); ?>

<div class="col-md-12 col-lg-12 col-xl-8">
								<div class="row">
								<!--
                  <div class="col-md-4 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-building-o"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Profil</h4>
															<div class="info">
																<strong class="amount">Sekolah</strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="<?=site_url('profil')?>" class="text-white">(Edit Profil)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									--->
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-file-text-o"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Data Berita</h4>
															<div class="info">
																<strong class="amount"><?=$data_info->num_rows();?> Berita</strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="<?=site_url('info')?>" class="text-white">(View all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
                  <div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-file-image-o"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Data Galeri</h4>
															<div class="info">
																<strong class="amount"><?=$data_galeri->num_rows();?> File</strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="<?=site_url('galeri')?>" class="text-white">(View all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-4 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-danger">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-users"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Data Pendaftar</h4>
															<div class="info">
																<strong class="amount"><?=$data_pendaftar->num_rows();?> Siswa</strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="<?=site_url('pendaftar')?>" class="text-white">(View all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
                  <div class="col-md-4 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-success">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-money"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Data Pembayaran</h4>
															<div class="info">
																<strong class="amount"><?=$data_pembayaran->num_rows();?> Siswa</strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="<?=site_url('pembayaran')?>" class="text-white">(View all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-4 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-warning">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa  fa-print"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Siswa lolos Seleksi</h4>
															<div class="info">
																<strong class="amount"><?=$data_laporan->num_rows();?> Siswa</strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="<?=site_url('laporan')?>" class="text-white">(Cetak Laporan)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<!---
                  <div class="col-md-4 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-success">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-warning"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Pengumuman</h4>
															<div class="info">
																<strong class="amount"><?=$data_pengumuman->num_rows();?> Data</strong>
															</div>
														</div>
														<div class="summary-footer">
															<a href="<?=site_url('pengumuman')?>" class="text-white">(View all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									--->

								</div>
							</div>
