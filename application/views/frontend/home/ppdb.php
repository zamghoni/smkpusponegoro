<!-- start banner Area -->
<section class="banner-area relative" id="home" style="background:url(<?=base_url()?>assets/frontend/img/banner-bg.jpg) right; background-repeat: no-repeat;
  background-size: 100%;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row fullscreen d-flex align-items-center">
      <div class="align-center">
      <div class="banner-content col-lg-9 col-md-12">
        <h1 class="text-uppercase">
          Situs PPDB Online
        </h1>
        <h2 class="text-white">
          Tahun Pelajaran <script>document.write(new Date().getFullYear());</script> / <script>document.write(new Date().getFullYear()+1);</script>
        </h2>
        <p class="pt-10 pb-10 text-white">
          Untuk calon pendaftar tahun ajaran <script>document.write(new Date().getFullYear());</script> / <script>document.write(new Date().getFullYear()+1);</script> bisa mendaftar melalui website ini atau langsung datang ke tempat pendaftaran
        </p>
        <a href="<?=site_url('auth/register')?>" class="genric-btn danger big radius text-uppercase">Daftar Sekarang</a>
      </div>
    </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="info">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Informasi Pendaftaran <br> Tahun <script>document.write(new Date().getFullYear());</script> / <script>document.write(new Date().getFullYear()+1);</script></h1>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <?php
        foreach ($ppdb->result_array() as $row) {
        ?>
        <div class="col-lg-6">
          <div class="card bg-light text-center">
            <div class="card-body">
              <h3 class="card-title"><?=$row['judul']?></h3>
              <div class="text-black">
              <hr>
              <p class="card-text text-white"><?=$row['isi']?></p>
            </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</section>
<!-- End blog Area -->

<!-- Start blog Area -->
<section class="blog-area bg-light section-gap">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-20 col-lg-12">
        <div class="title text-center">
          <h1 class="mb-10">Alur Pendaftaran</h1>
        </div>
      </div>
    </div>

          <div class="row">
          <div class="col-lg-12">
                <img src="<?=base_url()?>assets/frontend/img/alur_prestasi.png" width="100%"/>
          </div>
        </div>
        </div>

    </div>
  </div>
</section>
<!-- End blog Area -->


<section class="events-list-area section-gap event-page-lists" id="jurusan">
				<div class="container">
          <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
              <div class="title text-center">
                <h1 class="mb-10">Kompetensi Keahlian</h1>
              </div>
            </div>
          </div>
					<div class="row align-items-center">
            <?php
            foreach ($jurusan->result_array() as $row) {
            ?>
						<div class="col-lg-6 pb-30">
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<a href="<?=site_url('jurusan/detail/'.$row['jurusan_id'])?>"><img class="img-fluid" src="<?=base_url('upload/jurusan/'.$row['foto'])?>" alt=""></a>
								</div>
								<div class="detials col-12 col-md-6">
									<a href="<?=site_url('jurusan/detail/'.$row['jurusan_id'])?>"><h4><?=$row['judul']?></h4></a>
									<p><?php echo substr($row['isi'],0,150)?>..</p>
								</div>
							</div>
						</div>
          <?php } ?>
					</div>
				</div>
			</section>

<!-- Start blog Area -->
<!--
<section class="blog-area bg-light section-gap" id="gelombang">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Gelombang Pendaftaran <script>document.write(new Date().getFullYear());</script></h1>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <?php
        foreach ($gelombang->result_array() as $row) {
        ?>
        <div class="col-lg-4">
          <div class="card bg-light text-center">
            <div class="card-body">
              <h3 class="card-title"><?=$row['judul_gel']?></h3>
              <p><b>Periode : </b><br>
              <?=date_indo($row['tgl_buka']).' s.d '.date_indo($row['tgl_tutup'])?></p>
              <div class="text-black">
              <hr>
              <p class="card-text text-white"><?=$row['isi']?></p>
            </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</section>
-->
<!-- End blog Area -->

<?php
foreach ($pengumuman->result_array() as $row) {
?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <div class="col-lg-10">
              <h3 class="modal-title">Pengumuman !!</h3>
            </div>
            <div class="col-lg-2">
              <button type="button" class="close text-left" data-dismiss="modal">&times;</button>
            </div>
          </div>
          <div class="modal-body text-center">
            <h4><?=$row['judul']?></h4>
            <p></p>
            <p><?=$row['isi']?></p>
          </div>
          <div class="modal-footer text-center">
              <a href="<?=$row['link']?>" target="_blank" class="btn btn-sm btn-success">Lihat Detail</a>
          </div>
      </div>
  </div>
</div>
<?php } ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#myModal').hide();
        $('#myModal').modal('show');
    });
</script>
