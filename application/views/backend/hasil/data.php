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

<?php $this->view('message')?>

<section class="panel">
  <header class="panel-heading">
    

    <h2 class="panel-title"><?=$page?></h2>
  </header>
  <div class="panel-body">
        <div class="col-lg-7">
          <h2>Silahkan Cetak Pengumuman Hasil PPDB</h2><br>
          <br>
          <a href="<?=site_url('hasil/cetak')?>" class="btn btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak Hasil PPDB</a>
        </div>
  </div>
</section>
