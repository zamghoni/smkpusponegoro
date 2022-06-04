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
<div class="text-right">
  <!-- <a href="<?=site_url('profil/form')?>" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-plus"></i> Data <?=$page;?></a> -->
</div>
<?php $this->view('message')?>
<?php
foreach($row->result()as $key => $data) {?>
  <?php if ($data->profil_id == 7){ ?>
  <section class="panel">
    <header class="panel-heading">
      
      <div class="col-lg-10">
        <h2 class="panel-title"><?=$data->judul?></h2>
      </div>
      <div class="text-left">
        <a href="<?=site_url('profil/edit/'.$data->profil_id)?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
      </div>
    </header>
    <div class="panel-body">
      <div style="margin:10px">
        <?php if($data->foto != null) { ?>
          <a class="lightbox" href="<?=base_url('upload/profil/'.$data->foto)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
            <img class="img-responsive" width="200px" src="<?=base_url('upload/profil/'.$data->foto)?>" style="float:left;margin:5px">
          </a>
        <?php } ?>
          <?=$data->isi?>
    <?php }
  } ?>
</div>
</div>
  </section>
