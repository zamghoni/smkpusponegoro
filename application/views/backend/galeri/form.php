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
            <a href="<?=site_url('galeri')?>" class="btn btn-sm btn-danger"><i class="fa fa-undo"></i> Back</a>
          </div>
        </header>
        <div class="panel-body">
          <?php echo form_open_multipart('galeri/process') ?>
            <div class="form-group">
              <label class="col-md-2 control-label" for="judul">Judul *</label>
              <div class="col-md-10">
                <input type="hidden" name="galeri_id" value="<?=$row->galeri_id?>">
                <input type="text" value="<?=$row->judul?>" name="judul" class="form-control" id="judul" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="kategori">Kategori *</label>
              <div class="col-md-10">
                <select class="form-control" name="kategori" class="collapse submenu" id="kategori" required >
                  <?php $kategori = $this->input->post('kategori') ? $this->input->post('kategori') : $row->kategori ?>
                  <option value="">- Pilih -</option>
                  <option value="0" <?=$kategori == '0' ? 'selected' : null?>> Foto </option>
                  <option value="1" <?=$kategori == '1' ? 'selected' : null?>> Video </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="ckedtor">Isi *</label>
              <div class="col-md-10">
                <textarea type="text" name="isi" class="ckeditor" id="ckedtor" required><?=$row->isi?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="foto">Foto *</label>
              <div class="col-md-10">
                <?php if($subpage == 'Edit') {
                  if ($row->foto != null) {?>
                    <a class="img-thumbnail lightbox" href="<?=base_url('upload/galeri/'.$row->foto)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                      <img class="img-responsive" width="100px" src="<?=base_url('upload/galeri/'.$row->foto)?>">
                      <span class="zoom">
                        <i class="fa fa-search"></i>
                      </span>
                    </a>
              <?php }
              } ?>
                    <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden">
  										<div class="input-append">
  											<div class="uneditable-input">
  												<i class="fa fa-file fileupload-exists"></i>
  												<span class="fileupload-preview"></span>
  											</div>
  											<span class="btn btn-default btn-file">
  												<span class="fileupload-exists">Change</span>
  												<span class="fileupload-new">Select file</span>
  												<input type="file" name="foto" id="foto">
  											</span>
  											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
  										</div>
                      <small>(Biarkan kosong jika tidak <?=$subpage == 'edit' ? 'diganti' : 'ada'?>)</small>
  									</div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="link">Link Video *</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->link?>" name="link" class="form-control" id="link">
              </div>
            </div>

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>

          <?php echo form_close() ?>
        </div>
      </section>
