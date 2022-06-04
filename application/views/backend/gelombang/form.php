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
        <li><span>Pendaftaran</span></li>
        <li><span><?=$page;?></span></li>
        <li><span><?=$subpage;?></span></li>
      </ol>
    </div>
  </header>

  <?php $this->view('message')?>
      <section class="panel">
        <header class="panel-heading">
          <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
          </div>
          <div class="col-lg-10">
            <h2 class="panel-title"><?=$subpage.' '.$page?></h2>
          </div>
          <div class="text-left">
            <a href="<?=site_url('gelombang')?>" class="btn btn-sm btn-danger"><i class="fa fa-undo"></i> Back</a>
          </div>
        </header>
        <div class="panel-body">
          <form class="form-horizontal form-bordered" action="<?=site_url('gelombang/process')?>" method="post" onsubmit="return tambah(this)">
            <div class="form-group">
              <label class="col-md-2 control-label" for="judul">Judul *</label>
              <div class="col-md-10">
                <input type="hidden" name="gelombang_id" value="<?=$row->gelombang_id?>">
                <input type="text" value="<?=$row->judul_gel?>" name="judul" class="form-control" id="judul" required>
              </div>
            </div>

            <div class="form-group">
							<label class="col-md-2 control-label">Jangka Waktu *</label>
							<div class="col-md-10">
								<div class="input-daterange input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="date" class="form-control" name="tgl_buka" value="<?=$row->tgl_buka?>">
									<span class="input-group-addon">sampai</span>
									<input type="date" class="form-control" name="tgl_tutup" value="<?=$row->tgl_tutup?>">
								</div>
							</div>
						</div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="ckedtor">Isi *</label>
              <div class="col-md-10">
                <textarea type="text" name="isi" class="ckeditor" id="ckedtor" required><?=$row->isi?></textarea>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>

          </form>
        </div>
      </section>
