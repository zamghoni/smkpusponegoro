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
        <li><span><?=$subpage;?></span></li>
      </ol>
    </div>
  </header>
  <?php $this->view('message')?>
      <section class="panel">
        <header class="panel-heading">

          <div class="col-lg-10">
            <h2 class="panel-title"><?=$subpage.' '.$page?></h2>
          </div>
          <div class="text-left">
            <a href="<?=site_url('kategori')?>" class="btn btn-sm btn-danger"><i class="fa fa-undo"></i> Back</a>
          </div>
        </header>
        <div class="panel-body">
          <form class="form-horizontal form-bordered" action="<?=site_url('kategori/process')?>" method="post" onsubmit="return tambah(this)">
            <div class="form-group">
              <label class="col-md-3 control-label" for="nama_kategori">Nama Kategori *</label>
              <div class="col-md-6">
                <input type="hidden" name="kategori_id" value="<?=$row->kategori_id?>">
                <input type="text" value="<?=$row->nama_kategori?>" name="nama_kategori" class="form-control" id="nama_kategori" required>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>

          </form>
        </div>
      </section>
