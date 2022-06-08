<section class="banner-area relative about-banner" id="home" style="background:url(<?=base_url()?>assets/frontend/img/top-banner.jpg) bottom center; height: 384px; overflow: hidden; position: relative;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Berita
        </h1>
        <p class="text-white link-nav"><a href="<?=site_url('home')?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?=site_url('info/lingkungan')?>"> <?=$page?></a></p>
      </div>
    </div>
  </div>
</section>

<!-- Start top-category-widget Area -->

  <div class="row" style="margin-top:45px;background:#777777">
  </div>

<!-- End top-category-widget Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10"><?=$page?></h1>
          <p>Ikuti terus informasi dan berita-berita terbaru tentang SMK NU Wahid Hasyim Talang.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      foreach ($lingkungan->result_array() as $row) {
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
        <p class="meta">By SMK NU Wahid Hasyim Talang <br> Post : <?=date_indo($date);?></p>
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
<!-- End blog Area -->



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
