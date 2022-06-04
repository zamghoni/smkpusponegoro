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
          
          <div class="col-lg-10">
            <h2 class="panel-title"><?=$subpage.' '.$page?></h2>
          </div>
          <div class="text-left">
            <a href="<?=site_url('pengumuman')?>" class="btn btn-sm btn-danger"><i class="fa fa-undo"></i> Back</a>
          </div>
        </header>
        <div class="panel-body">
          <form class="form-horizontal form-bordered" action="<?=site_url('pengumuman/process')?>" method="post" onsubmit="return tambah(this)">
            <div class="form-group">
              <label class="col-md-2 control-label" for="judul">Judul *</label>
              <div class="col-md-10">
                <input type="hidden" name="pengumuman_id" value="<?=$row->pengumuman_id?>">
                <input type="text" value="<?=$row->judul?>" name="judul" class="form-control" id="judul" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="ckedtor">Isi *</label>
              <div class="col-md-10">
                <textarea type="text" name="isi" id="ckedtor" class="ckeditor" required><?=$row->isi?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="link">Link *</label>
              <div class="col-md-10">
                <textarea type="text" name="link" id="link" class="form-control" required><?=$row->link?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="status">Status *</label>
              <div class="col-md-10">
                <select class="form-control" name="status" class="collapse submenu" id="status" required >
                  <?php $status = $this->input->post('status') ? $this->input->post('status') : $row->status ?>
                  <option value="">- Pilih -</option>
                  <option value="0" <?=$status == '0' ? 'selected' : null?>> Aktif </option>
                  <option value="1" <?=$status == '1' ? 'selected' : null?>> Non Aktif </option>
                </select>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>

          </form>
        </div>
      </section>
