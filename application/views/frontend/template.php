<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/frontend/img/favicon.png">
  <!-- Author Meta -->
  <meta name="author" content="colorlib">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>SMK WAHID HASYIM TALANG</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/linearicons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/nice-select.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/animate.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery-ui.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/main.css">
  </head>
  <body>
    <header id="header" id="home">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
              <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
              <a href="tel:(0283) 3447515"><span class="lnr lnr-phone-handset"></span> <span class="text">(0283) 3447515</span></a>
              <a href="mailto:smk_wahasta@gmail.com<"><span class="lnr lnr-envelope"></span> <span class="text">smk_wahasta@gmail.com</span></a>
            </div>
          </div>
        </div>
    </div>
      <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex no-padding">
          <div id="logo">
            <a href="<?=site_url('home')?>"><img src="<?=base_url()?>assets/frontend/img/logo.png" alt="SMK WAHID HASYIM TALANG" title="SMK WAHID HASYIM TALANG" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="active"><a href="<?=site_url('home')?>">Home</a></li>
              <li class="menu-has-children"><a class="text-white">Profil</a>
                <ul>
                  <li><a href="<?=site_url('profil/sejarah')?>">Sejarah SMK WAHID HASYIM TALANG</a></li>
                  <li><a href="<?=site_url('profil/visi_misi')?>">Visi dan Misi</a></li>
                  <li><a href="<?=site_url('profil/struktur')?>">Struktur Organisasi</a></li>
                </ul>
              </li>
              <li class="menu-has-children"><a class="text-white" href="#info">Kategori</a>
                <ul>
                  <li><a href="<?=site_url('info/berita')?>">Berita Sekolah</a></li>
                  <li><a href="<?=site_url('info/kegiatan')?>">Kegiatan Sekolah</a></li>
                  <li><a href="<?=site_url('info/lingkungan')?>">Lingkungan Sekolah</a></li>
                </ul>
              </li>
              <li class="menu-has-children"><a class="text-white" href="#galeri">Galeri</a>
                <ul>
                  <li><a href="<?=site_url('galeri/foto')?>">Galeri Foto</a></li>
                  <li><a href="<?=site_url('galeri/video')?>">Galeri Video</a></li>
                </ul>
              </li>
              <li><a href="<?=site_url('profil/kontak')?>">Kontak Kami</a>
                </li>
              <li><a href="<?=site_url('home/ppdb')?>" class="genric-btn primary small radius">PPDB-Online <script>document.write(new Date().getFullYear());</script></a>
              </li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </header><!-- #header -->

    <?=$contents?>

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <a href="<?=site_url('home')?>"><img src="<?=base_url()?>assets/frontend/img/logo-moklet.png" height="80px" alt="SMK WAHID HASYIM TALANG" title="SMK WAHID HASYIM TALANG" /></a><br><p></p>
              <ul>
                <li><p class="text-white">SMK NU Wahid Hasyim Talang. Unggul, Cerdas, Mandiri, Berhaluan Ahlussunnah Wal Jamaah.</p></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Lokasi Kami</h4>
              <ul class="text-white">
                    <li><i class="fa fa-map-marker fa-lg"></i> Jl. Projosumarto II, Badiran, Pesayangan, Kec. Talang, Tegal, Jawa Tengah 52193</li>
                    <li><i class="fa fa-phone fa-lg"></i> (0283) 3447515</li>
                    <li><i class="fa fa-envelope fa-lg"></i><a class="text-white" href="mailto:smk_wahasta@gmail.com"> smk_wahasta@gmail.com</a></li>
                    <li><i class="fa fa-clock-o fa-lg"></i> Senin - Sabtu<br>07:00 - 15.30</li>
                  </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Maps</h4>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7809087917926!2d109.13904351427705!3d-6.916776895002332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb8e2a867c935%3A0x94adc59bcbdc5c15!2sSMA%20NU%20-%20SMK%20NU%20Wahid%20Hasyim!5e0!3m2!1sen!2sid!4v1622302984107!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
        <div class="footer-bottom row align-items-center justify-content-between">
          <p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> SMK WAHID HASYIM TALANG. All rights reserved.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          <div class="col-lg-6 col-sm-12 footer-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <!-- End footer Area -->

    <script src="<?=base_url()?>assets/frontend/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>assets/frontend/js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="<?=base_url()?>assets/frontend/js/easing.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/hoverIntent.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/superfish.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/jquery.tabs.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/jquery.nice-select.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/mail-script.js"></script>
    <script src="<?=base_url()?>assets/frontend/js/main.js"></script>
  </body>
</html>
