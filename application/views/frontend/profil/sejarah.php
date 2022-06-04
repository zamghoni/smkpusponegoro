<section class="banner-area relative about-banner" id="home" style="background:url(<?=base_url()?>assets/frontend/img/top-banner.jpg) right no-repeat;   background-size: 1350px;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          <?=$page?>
        </h1>
        <p class="text-white link-nav"><a href="<?=site_url('home')?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?=site_url('profil/sejarah/3')?>"> <?=$page?></a></p>
      </div>
    </div>
  </div>
</section>

<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
						<div class="row">
							<div class="col-md-3 text-center">
								<img src="<?=base_url('upload/profil/'.$row['foto'])?>" alt="" class="img-fluid">
                
							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
                <p><?=$row['isi']?></p>
							</div>
						</div>
					</div>
				</div>
			</div>


