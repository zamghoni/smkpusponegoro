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
              <h4>Segera Lakukan Pembayaran ke Nomor Rekening: 100-9110-611 BANK BNI</h4>
            
          </div>
          <div class="text-left">
            <a href="<?=site_url('pembayaran/pembayaran')?>" class="btn btn-danger"><i class="fa fa-undo"></i> Back</a>
          </div>

        </header>
      <div class="col-lg-13">
        <div class="panel-body">
          <?php echo form_open_multipart('pembayaran/process_usr') ?>
          <div class="form-group">
            
            <label class="col-md-2" for="no_rek">Nomor Rekening *</label>
            <div class="col-md-10">
              <input type="hidden" name="pembayaran_id" value="<?=$row->pembayaran_id?>">
              <input type="number" name="no_rek" value="<?=$row->no_rek?>" class="form-control" minlength="10" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2" for="atas_nama">Atas Nama *</label>
            <div class="col-md-10">
              <input type="text" name="atas_nama" value="<?=$row->atas_nama?>" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2" for="jumlah">Jumlah Transfer *</label>
            <div class="col-md-10">
              <input type="number" name="jumlah" value="<?=$row->jumlah?>" class="form-control" required>
            </div>
          </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="foto">Bukti Transfer *</label>
              <div class="col-md-10">
                <input type="hidden" value="<?=$this->fungsi->user_login()->id?>" name="id_user" class="form-control" required>
                <?php if($subpage == 'Edit') {
                  if ($row->foto != null) {?>
                    <div style="margin-bottom:10px">
                      <div class="thumbnail-gallery">
  											<a class="img-thumbnail lightbox" href="<?=base_url('upload/pembayaran/'.$row->foto)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
  												<img class="img-responsive" width="215" src="<?=base_url('upload/pembayaran/'.$row->foto)?>" style="width:100px">
  												<span class="zoom">
  													<i class="fa fa-search"></i>
  												</span>
  											</a>
  										</div>
                    </div>
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

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
              <h2>Rincian Biaya Daftar Ulang</h2>
          <img src="<?=base_url()?>assets/backend/assets/images/biaya.jpg" width="600" style="margin-bottom:15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            </div>
          
         
        </div>
          <?php echo form_close() ?>
        </div>
      </div>
      </section>
