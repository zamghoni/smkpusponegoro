<section class="banner-area relative about-banner" id="home" style="background:url(<?=base_url()?>assets/frontend/img/top-banner.jpg) right no-repeat;   background-size: 1350px;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Berita
        </h1>
        <p class="text-white link-nav"><a href="<?=site_url('home')?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?=site_url('info/berita')?>"> <?=$page?></a></p>
      </div>
    </div>
  </div>
</section>

<!-- Start top-category-widget Area -->

  <div class="row" style="margin-top:45px;background:#777777">
  </div>

<!-- End top-category-widget Area -->

<!-- Start post-content Area -->
<section class="post-content-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 posts-list">
        <?php
        $no=1;
        foreach ($semua_berita->result_array() as $row) {
          if ($no%2 == 1) {
        ?>
        <div class="single-post row">
          <div class="col-lg-12 col-md-12 ">
            <div class="feature-img" id="frame-image">
              <?php if ($row['foto'] != null) {?>
              <img class="img-fluid" src="<?=base_url('upload/info/'.$row['foto'])?>" alt="">
            <?php } else {?>
              <img class="img-fluid" src="http://nhathuocphucthanh.com/upload/product/noimage.gif" alt="">
            <?php }?>
            </div>
            <div class="user-details row" style="margin-top:10px">
              <p class="user-name col-lg-6 col-md-6"><span class="lnr lnr-user"></span><a> SMK Astrindo Tegal</a></p>
              <?php  $date = date('Y-m-d', strtotime($row['created_at']));?>
              <p class="date col-lg-6 col-md-6"><span class="lnr lnr-calendar-full"></span><a> <?=date_indo($date);?></a></p>
            </div>
            <a class="posts-title" href="<?=site_url('info/detail/'.$row['info_id'])?>"><h3><?=$row['judul']?></h3></a>
            <p class="excert"><?php echo substr($row['isi'],0,200)?>..</p>
            <a href="<?=site_url('info/detail/'.$row['info_id'])?>" class="genric-btn primary radius">Baca Selengkapnya</a>
          </div>
        </div>
        <?php
       }else{ ?>
         <div class="single-post row">
           <div class="col-lg-12 col-md-12 ">
             <div class="feature-img" id="frame-image">
               <?php if ($row['foto'] != null) {?>
               <img class="img-fluid" src="<?=base_url('upload/info/'.$row['foto'])?>" alt="">
             <?php } else {?>
               <img class="img-fluid" src="http://nhathuocphucthanh.com/upload/product/noimage.gif" alt="">
             <?php }?>
             </div>
             <div class="user-details row" style="margin-top:10px">
               <p class="user-name col-lg-6 col-md-6"><span class="lnr lnr-user"></span><a> SMK Astrindo Tegal</a></p>
               <p class="date col-lg-6 col-md-6"><span class="lnr lnr-calendar-full"></span><a> <?=date_indo($date);?></a></p>
             </div>
             <a class="posts-title" href="<?=site_url('info/detail/'.$row['info_id'])?>"><h3><?=$row['judul']?></h3></a>
             <p class="excert"><?php echo substr($row['isi'],0,200)?>..</p>
             <a href="<?=site_url('info/detail/'.$row['info_id'])?>" class="genric-btn primary radius">Baca Selengkapnya</a>
           </div>
         </div>
         <?php
            }
            $no++;
            }
            ?>
                  <nav class="blog-pagination justify-content-center d-flex">
                      <?php echo $paging ?>
                  </nav>
      </div>
      <div class="col-lg-4 sidebar-widgets">
        <div class="widget-wrap">

          <!-- <div class="single-sidebar-widget search-widget">
            <form class="search-form" action="#">
                <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div> -->

          <div class="single-sidebar-widget popular-post-widget">
            <h4 class="popular-title">New Posts</h4>
            <div class="popular-post-list">
              <?php
              foreach ($new->result_array() as $row) {
              ?>
              <div class="single-post-list d-flex flex-row align-items-center">
                <div class="thumb" id="frame-image-pp">
                  <?php if ($row['foto'] != null) {?>
                  <img class="img-fluid" src="<?=base_url('upload/info/'.$row['foto'])?>" alt="">
                <?php } else {?>
                  <img class="img-fluid" src="http://nhathuocphucthanh.com/upload/product/noimage.gif" alt="">
                <?php }?>
                </div>
                <div class="details">
                  <a href="blog-single.html"><h6><?=substr($row['judul'],0,45)?>..</h6></a>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End post-content Area -->

<style type="text/css">
  #frame-image {
  /*CSS Untuk croping gambar / foto Disini Anda dapat menentukan lebar dan tinggi image */
  width: 750px;
  height: 350px;
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

#frame-image-pp {
/*CSS Untuk croping gambar / foto Disini Anda dapat menentukan lebar dan tinggi image */
width: 100px;
height: 60px;
overflow: hidden;
/*  CSS Untuk mengatur posisi gambar Menjadikan frame / bingkai sebagai patokan koordinat left/top */
position: relative;
}
#frame-image-pp img {
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
