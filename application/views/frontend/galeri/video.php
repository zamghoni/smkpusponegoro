<section class="banner-area relative about-banner" id="home" style="background:url(<?=base_url()?>assets/frontend/img/top-banner.jpg) right no-repeat;   background-size: 1350px;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Galleri
        </h1>
        <p class="text-white link-nav"><a href="<?=site_url('home')?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?=site_url('galeri/galeri_video')?>"> <?=$page?></a></p>
      </div>
    </div>
  </div>
</section>

<section class="gallery-area section-gap">
    <div class="container">
      <div class="row">
        <?php
        foreach ($galeri_video->result_array() as $row) {
        ?>
        <div class="col-lg-6" style="margin-top:25px">
          <iframe width="540" height="315" src="<?=$row['link']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="text-center" style="margin-top:15px">
        <h5><?=$row['judul']?></h5>
        <small><?=$row['isi']?></small>
        </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
