<section class="banner-area relative about-banner" id="home" style="background:url(<?=base_url()?>assets/frontend/img/top-banner.jpg) bottom center; height: 384px; overflow: hidden; position: relative;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          <?=$page?>
        </h1>
        <p class="text-white link-nav"><a href="<?=site_url('home')?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?=site_url('profil/visi_misi/4')?>"> <?=$page?></a></p>
      </div>
    </div>
  </div>
</section>

<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
						<div class="row">
							<div class="col-md-12 mt-sm-20 text-center">
                <p><?=$row['isi']?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
