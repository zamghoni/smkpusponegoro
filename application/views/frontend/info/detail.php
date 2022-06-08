<section class="banner-area relative about-banner" id="home" style="background:url(<?=base_url()?>assets/frontend/img/top-banner.jpg) bottom center; height: 384px; overflow: hidden; position: relative;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Detail
        </h1>
        <p class="text-white link-nav"><a href="<?=site_url('home')?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?=site_url('info/detail'.$row['info_id'])?>"> <?=$page?></a></p>
      </div>
    </div>
  </div>
</section>

<!-- Start event-details Area -->
<section class="event-details-area section-gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 event-details-left">
        <div class="main-img">
          <?php if ($row['foto'] != null) {?>
          <img class="img-fluid" src="<?=base_url('upload/info/'.$row['foto'])?>" alt="">
        <?php }?>
        </div>
        <div class="details-content">
          <a href="<?=site_url('info/detail/'.$row['info_id'])?>">
            <h4><?=$row['judul']?></h4>
          </a>
          <p><?=$row['isi']?></p>
        </div>
        <div class="social-nav row no-gutters">
          <div class="col-lg-6 col-md-6 ">
            <ul class="focials">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-6 col-md-6 navs">
            <?php
            $sebelumnya = $row['info_id'] -1;
            if ($sebelumnya == 0 || $sebelumnya == -1) {
              $sebelumnya = 1;
            }
            $selanjutnya = $row['info_id'] +1;
             ?>
            <a href="<?=site_url('info/detail/'.$sebelumnya)?>" class="nav-prev"><span class="lnr lnr-arrow-left"></span>Prev Info</a>
            <a href="<?=site_url('info/detail/'.$selanjutnya)?>" class="nav-next">Next Info<span class="lnr lnr-arrow-right"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End event-details Area -->
