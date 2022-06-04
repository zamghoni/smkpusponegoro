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
  <div class="text-right">
  <a href="<?=site_url('dashboard/pendaftar')?>" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-undo"></i> Back</a>
</div>
  <?php $this->view('message')?>
      <section class="panel">
        <header class="panel-heading">
          

          <h2 class="panel-title"><?=$subpage.' '.$page?></h2>
        </header>
        <div class="panel-body">
          <form class="form-horizontal form-bordered" action="<?=site_url('pendaftar/process_edit_usr')?>" method="post" onsubmit="return tambah(this)">
            <div class="form-group">
              <label class="col-md-3 control-label" for="username">Username *</label>
              <div class="col-md-6">
                <input type="hidden" name="id" value="<?=$row->id?>">
                <input type="text" value="<?=$row->username?>" name="username" class="form-control" id="username" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Email *</label>
              <div class="col-md-6">
                <input type="text" value="<?=$row->email?>" name="email" class="form-control" id="email"required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="password">Password *</label>
              <div class="col-md-6">
                <input type="password" value="" name="password" class="form-control" id="password">
                <small>(<?=$subpage == 'edit' ? 'Silahkan password di isi' : 'Biarkan kosong jika password tidak diganti'?>)</small>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="konf_password">Konfirmasi Password *</label>
              <div class="col-md-6">
                <input type="password" value="" name="konf_password" class="form-control" id="konf_password">
                <small>(<?=$subpage == 'edit' ? 'Silahkan konfirmasi password di isi sama dengan password' : 'Biarkan kosong jika password tidak diganti'?>)</small>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>

          </form>
        </div>
      </section
