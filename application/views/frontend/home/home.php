<!-- start banner Area -->
<section class="banner-area relative" id="home" style="background:url(<?=base_url()?>assets/frontend/img/banner-bg.jpg) right; background-repeat: no-repeat;
  background-size: 1350px;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row fullscreen d-flex align-items-center justify-content-between">
      <div class="banner-content col-lg-12 col-md-12">
        <h1 class="text-uppercase">
        SMK NU Wahid Hasyim Talang
        </h1>
        <h4 class="pt-10 pb-10 text-white">
        Siap Mencetak Generasi Berkarakter Akhlakul Karimah & Siap Dalam Persaingan Global
        </h4>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- Start feature Area -->
<section class="feature-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="single-feature">
          <div class="title">
            <h4>EKSTRA KULIKULER</h4>
          </div>
          <div class="desc-wrap">
            <p>Kegiatan ektra kulikuler sebagai wadah pengembangan potensi siswa, yang dapat diikuti oleh siswa sesuai bakat dan minatnya masing masing. 
            Pilihan bidang yang dikembangkan pada SMK NU Wahid Hasyim diantaranya yaitu : Pramuka, Teater, PMR, PS Pagar Nusa, Seni Hadroh, Design Grafis & TIK, Paduan Suara, Seni Calung</p>
            
            <a class="genric-btn info-border circle medium" href="<?=site_url('home/ppdb')?>">Join Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="single-feature">
          <div class="title">
            <h4>FASILITAS</h4>
          </div>
          <div class="desc-wrap">
            <p>Fasilitas sekolah merupakan suatu sarana yang sangat dibutuhkan setiap sekolah agar proses belajar mengajar sesuai dengan yang diharapkan.
            Fasilitas yang terdapat pada SMK NU Wahid Hasyim Talang meliputi :
            Lab. Komputer, Perpustakaan, Tempat Ibadah, Kantin, Hotspot Area, Bantuan Siswa Miskin & Siswa</p>
            <a class="genric-btn info-border circle medium" href="<?=site_url('home/ppdb')?>">Join Now</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!-- End feature Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="info">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-12">
        <div class="title text-center">
          <h1 class="mb-10">Berita Terkini SMK NU Wahid Hasyim Talang</h1>
          <p>Ikuti terus informasi dan berita-berita terbaru tentang SMK Wahid Hasyim Talang.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      foreach ($info->result_array() as $row) {
      ?>
      <div class="col-lg-3 col-md-6 single-blog">
        <div class="thumb" id="frame-image">
          <?php if ($row['foto'] != null) {?>
            <img class="img-fluid" src="<?=base_url('upload/info/'.$row['foto'])?>" alt="">
          <?php } else {?>
            <img class="img-fluid" src="http://nhathuocphucthanh.com/upload/product/noimage.gif" alt="">
          <?php }?>
        </div>
        <?php  $date = date('Y-m-d', strtotime($row['created_at']));?>
        <p class="meta">By SMK Wahid Hasyim Talang <br> Post : <?=date_indo($date);?></p>
        <a href="<?=site_url('info/detail/'.$row['info_id'])?>">
          <h5><?=$row['judul']?></h5>
        </a>
        <p><?php echo substr($row['isi'],0,100)?>..</p>
        <a href="<?=site_url('info/detail/'.$row['info_id'])?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
      </div>
      <?php } ?>
    </div>
    <div class="text-center" style="margin-top:50px;">
    <a href="<?=site_url('info/semua_berita')?>" class="genric-btn primary radius">Lihat Semua Info Terbaru</a>
  </div>
  </div>
</section>
<!-- End blog Area 

<section class="cta-one-area relative section-gap" style="background:url(<?=base_url()?>assets/frontend//img/cta-bg.jpg) center; background-repeat: no-repeat;
  background-size: 1350px;">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">Penerimaan Peserta Didik Baru  <script>document.write(new Date().getFullYear());</script></h1>
							<p>
								Untuk calon pendaftar tahun ajaran 2020/2021 bisa mendaftar melalui website ini atau langsung datang ke sekolah.
							</p>
							<a class="primary-btn wh" href="<?=site_url('home/ppdb')?>">Daftar Sekarang !!!</a>
						</div>
					</div>
				</div>
			</section>
-->
<section class="gallery-area section-gap" id="galeri">
				<div class="container">
          <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-12">
              <div class="title text-center">
                <h1 class="mb-10">Galeri Terbaru SMK NU Wahid Hasyim Talang</h1>
                <p>Ikuti terus dokumentasi foto dan video terbaru tentang SMK Wahid Hasyim Talang.</p>
              </div>
            </div>
          </div>
					<div class="row">
            <?php
            foreach ($galeri_foto->result_array() as $row) {
            ?>
            <div class="col-md-4">
								<a href="<?=base_url('upload/galeri/'.$row['foto'])?>" class="img-gal">
                  <div class="single-gallery-image" style="background: url(<?=base_url('upload/galeri/'.$row['foto'])?>);"></div></a>
                  <div class="text-center" style="margin-top:15px">
                  <small><?=$row['judul']?></small>
                </div>
							</div>
            <?php } ?>
					</div>
          <div class="text-center" style="margin-top:25px; margin-bottom:45px;">
          <a href="<?=site_url('galeri/foto')?>" class="genric-btn primary radius">Lihat Semua Foto</a>
          </div>
          <hr>
          <div class="row" style="margin-top:50px;">
            <?php
            foreach ($galeri_video->result_array() as $row) {
            ?>
						<div class="col-lg-6">
              <iframe width="540" height="315" src="<?=$row['link']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <div class="text-center" style="margin-top:10px">
              <h5><?=$row['judul']?></h5>
              <small><?=$row['isi']?></small>
              </div>
						</div>
            <?php } ?>
					</div>
          <div class="text-center" style="margin-top:50px;">
          <a href="<?=site_url('galeri/video')?>" class="genric-btn primary radius">Lihat Semua Video</a>
          </div>
				</div>
			</section>

      <style type="text/css">
        #frame-image {
        /*CSS Untuk croping gambar / foto Disini Anda dapat menentukan lebar dan tinggi image */
        width: 255px;
        height: 175px;
        overflow: hidden;
        /*  CSS Untuk mengatur posisi gambar Menjadikan frame / bingkai sebagai patokan koordinat left/top */
        position: relative;
      }
        #frame-image img {
        /* CSS Untuk croping gambar Membatasi tinggi gambar, membiarkan width-nya auto Bisa juga diganti jadi height: 320px jika tinggi gambar mau dipaksakan jadi 320px
        */
        /* max-height: 320px; */
        width: 150%;
        /*  CSS Untuk mengatur posisi gambar Left/top berpatokan pada frame Diisi dengan nilai minus untuk memposisikan keluar dari frame karena frame overflow-nya dibuat jadi hidden
        posisi yg keluar area frame jadi tidak terlihat Disini Anda dapat mengatur bagian/posisi gambar yg mana yg akan ditampilkan  */
        position: absolute;
        left: 0px;
        top: 0px;
      }
      </style>
