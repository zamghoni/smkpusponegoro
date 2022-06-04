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
            <a href="<?=site_url('pendaftar')?>" class="btn btn-sm btn-danger"><i class="fa fa-undo"></i> Back</a>
          </div>
        </header>
        <div class="panel-body">
          <?php echo form_open_multipart('pendaftar/process') ?>
          <h4 class="panel-title" style="margin-left:15px">A. Identitas Calon Siswa</h4>
          <hr>
            <div class="form-group">
              <label class="col-md-2 control-label" for="nisn">NISN *</label>
              <div class="col-md-10">
                <input type="hidden" name="pendaftar_id" value="<?=$row->pendaftar_id?>">
                <input type="number" value="<?=$row->nisn?>" name="nisn" class="form-control" id="nisn" maxlength="10" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="nama_siswa">Nama Siswa *</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->nama_siswa?>" name="nama_siswa" class="form-control" id="nama_siswa" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="user_id">User Id *</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->user_id?>" name="user_id" class="form-control" id="user_id" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="id_jurusan">Jurusan *</label>
              <div class="col-md-10">
                <select class="form-control" name="id_jurusan" id="id_jurusan">
                  <option value="">- Pilih -</option>
                  <?php  foreach ($jurusan->result() as $key => $data) { ?>
                    <option value="<?=$data->jurusan_id?>" <?=$data->jurusan_id == $row->jurusan_id ? 'selected' : null?>> <?=$data->judul?></option>
                  <?php }?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="tempat_lahir">Tempat Lahir *</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->tempat_lahir?>" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
              </div>
            </div>

            <div class="form-group">
  							<label class="col-md-2 control-label" for="tgl_lahir">Tanggal Lahir</label>
  							<div class="col-md-10">
  								<div class="input-group">
  									<span class="input-group-addon">
  										<i class="fa fa-calendar"></i>
  									</span>
  									<input type="date" value="<?=$row->tgl_lahir?>" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
  								</div>
  							</div>
  						</div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="jk">Jenis Kelamin *</label>
              <div class="col-md-10">
                <select class="form-control" name="jk" class="collapse submenu" required>
                  <?php $jk = $this->input->post('jk') ? $this->input->post('jk') : $row->jk ?>
                  <option value="">- Pilih -</option>
                  <option value="L" <?=$jk == 'L' ? 'selected' : null?>> Laki-Laki </option>
                  <option value="P" <?=$jk == 'P' ? 'selected' : null?>> Perempuan </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="agama">Agama *</label>
              <div class="col-md-10">
                <select class="form-control" name="agama" class="collapse submenu" required>
                  <?php $agama = $this->input->post('agama') ? $this->input->post('agama') : $row->agama ?>
                  <option value="">- Pilih -</option>
                  <option value="Islam" <?=$agama == 'Islam' ? 'selected' : null?>> Islam </option>
                  <option value="Kristen" <?=$agama == 'Kristen' ? 'selected' : null?>> Kristen </option>
                  <option value="Katolik" <?=$agama == 'Katolik' ? 'selected' : null?>> Katolik </option>
                  <option value="Hindu" <?=$agama == 'Hindu' ? 'selected' : null?>> Hindu </option>
                  <option value="Buddha" <?=$agama == 'Buddha' ? 'selected' : null?>> Buddha </option>
                </select>
              </div>
            </div>
            <div class="form-group">
							<label class="col-md-2 control-label" for="textareaDefault">Alamat Lengkap *</label>
							<div class="col-md-10">
								<textarea class="form-control" name="alamat" rows="2" id="textareaDefault"><?=$row->alamat?></textarea>
							</div>
						</div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="kode_pos">Kode Pos *</label>
                <div class="col-md-10">
                  <input type="number" value="<?=$row->kode_pos?>" name="kode_pos" class="form-control" id="kode_pos" maxlength="5" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="no_telp">No Telp *</label>
                <div class="col-md-10">
                  <input type="number" value="<?=$row->no_telp?>" name="no_telp" class="form-control" id="no_telp" maxlength="12" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="no_hp">No Handphone *</label>
                <div class="col-md-10">
                  <input type="number" value="<?=$row->no_hp?>" name="no_hp" class="form-control" id="no_hp" maxlength="13" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="nama_ayah">Nama Ayah *</label>
                <div class="col-md-10">
                  <input type="text" value="<?=$row->nama_ayah?>" name="nama_ayah" class="form-control" id="nama_ayah" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="nama_ibu">Nama Ibu *</label>
                <div class="col-md-10">
                  <input type="text" value="<?=$row->nama_ibu?>" name="nama_ibu" class="form-control" id="nama_ibu" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="nama_wali">Nama Wali *</label>
                <div class="col-md-10">
                  <input type="text" value="<?=$row->nama_wali?>" name="nama_wali" class="form-control" id="nama_wali" required>
                </div>
              </div>
              <div class="form-group">
  							<label class="col-md-2 control-label" for="textareaDefault">Alamat Orangtua/Wali*</label>
  							<div class="col-md-10">
  								<textarea class="form-control" name="alamat_org" rows="2" id="textareaDefault"><?=$row->alamat_org?></textarea>
  							</div>
  						</div>
              <br>
              <h4 class="panel-title" style="margin-left:15px">B. Identitas Sekolah Asal</h4>
              <hr>
              <div class="form-group">
                <label class="col-md-2 control-label" for="nama_sekolah">Nama Sekolah *</label>
                <div class="col-md-10">
                  <input type="text" value="<?=$row->nama_sekolah?>" name="nama_sekolah" class="form-control" id="nama_sekolah" required>
                </div>
              </div>
              <div class="form-group">
  							<label class="col-md-2 control-label" for="textareaDefault">Alamat Sekolah*</label>
  							<div class="col-md-10">
  								<textarea class="form-control" name="alamat_sekolah" rows="2" id="textareaDefault"><?=$row->alamat_sekolah?></textarea>
  							</div>
  						</div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="kec_sekolah">Kecamatan Sekolah *</label>
                <div class="col-md-10">
                  <input type="text" value="<?=$row->kec_sekolah?>" name="kec_sekolah" class="form-control" id="kec_sekolah" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="kab_kota_sekolah">Kabupaten/Kota Sekolah*</label>
                <div class="col-md-10">
                  <input type="text" value="<?=$row->kab_kota_sekolah?>" name="kab_kota_sekolah" class="form-control" id="kab_kota_sekolah" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="propinsi">Propinsi *</label>
                <div class="col-md-10">
                  <input type="text" value="<?=$row->propinsi?>" name="propinsi" class="form-control" id="propinsi" required>
                </div>
              </div>
              <br>
              <h4 class="panel-title" style="margin-left:15px">C. Nomor Ijazah dan Nilai</h4>
              <hr>
              <div class="form-group">
                <label class="col-md-2 control-label" for="tahun_lulus">Tahun Lulus *</label>
                <div class="col-md-10">
                  <input type="number" value="<?=$row->tahun_lulus?>" name="tahun_lulus" class="form-control" id="tahun_lulus" maxlength="4" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="no_ijazah">Nomor Ijazah *</label>
                <div class="col-md-10">
                  <input type="text" value="<?=$row->no_ijazah?>" name="no_ijazah" class="form-control" id="no_ijazah" required>
                </div>
              </div>
              <div class="container">
                <h5 class="panel-title" style="margin-left:15px">Masukkan Nilai</h5><br>
              <div class="form-group">
                <label class="col-md-2 control-label" for="bhs_indo">Bahasa Indonesia *</label>
                <div class="col-md-5">
                  <input type="number" value="<?=$row->bhs_indo?>" name="bhs_indo" class="form-control" id="bhs_indo" maxlength="4" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="bhs_inggris">Bahasa Inggris *</label>
                <div class="col-md-5">
                  <input type="number" value="<?=$row->bhs_inggris?>" name="bhs_inggris" class="form-control" id="bhs_inggris" maxlength="4" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="mtk">Matematika *</label>
                <div class="col-md-5">
                  <input type="number" value="<?=$row->mtk?>" name="mtk" class="form-control" id="mtk" maxlength="4" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="ipa">Ilmu Pengetahuan Alam *</label>
                <div class="col-md-5">
                  <input type="number" value="<?=$row->ipa?>" name="ipa" class="form-control" id="ipa" maxlength="4" required>
                </div>
              </div>
              </div>
              <br>
              <h4 class="panel-title" style="margin-left:15px">D. Prestasi dan Penghargaan</h4>
              <hr>
              <div class="form-group">
  							<label class="col-md-2 control-label" for="textareaDefault">Prestasi*</label>
  							<div class="col-md-10">
  								<textarea class="form-control" name="prestasi" rows="2" id="textareaDefault"><?=$row->prestasi?></textarea>
  							</div>
  						</div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="foto2x4">Foto 3x4 </label>
              <div class="col-md-10">
                <?php if($subpage == 'Edit') {
                  if ($row->foto3x4 != null) {?>
                        <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->foto3x4)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                          <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->foto3x4)?>" style="width:100px">
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
  												<input type="file" name="foto3x4" id="foto3x4">
  											</span>
  											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
  										</div>
                      <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
  									</div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="scan_ijazah1">Scan Ijazah Depan</label>
              <div class="col-md-10">
                <?php if($subpage == 'Edit') {
                  if ($row->scan_ijazah1 != null) {?>
                        <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->scan_ijazah1)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                          <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->scan_ijazah1)?>" style="width:100px">
                          <span class="zoom">
                            <i class="fa fa-search"></i>
                          </span>
                        </a>
                    <?php }
                    } ?>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <input name="old_scan_ijazah1" value="<?=$row->scan_ijazah1?>" type="hidden">
  										<div class="input-append">
  											<div class="uneditable-input">
  												<i class="fa fa-file fileupload-exists"></i>
  												<span class="fileupload-preview"></span>
  											</div>
  											<span class="btn btn-default btn-file">
  												<span class="fileupload-exists">Change</span>
  												<span class="fileupload-new">Select file</span>
  												<input type="file" name="scan_ijazah1" id="scan_ijazah1">
  											</span>
  											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
  										</div>
                      <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
  									</div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="scan_ijazah2">Scan Ijazah Belakang</label>
              <div class="col-md-10">
                <?php if($subpage == 'Edit') {
                  if ($row->scan_ijazah2 != null) {?>
                        <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->scan_ijazah2)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                          <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->scan_ijazah2)?>" style="width:100px">
                          <span class="zoom">
                            <i class="fa fa-search"></i>
                          </span>
                        </a>
                    <?php }
                    } ?>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <input name="old_scan_ijazah2" value="<?=$row->scan_ijazah2?>" type="hidden">
  										<div class="input-append">
  											<div class="uneditable-input">
  												<i class="fa fa-file fileupload-exists"></i>
  												<span class="fileupload-preview"></span>
  											</div>
  											<span class="btn btn-default btn-file">
  												<span class="fileupload-exists">Change</span>
  												<span class="fileupload-new">Select file</span>
  												<input type="file" name="scan_ijazah2" id="scan_ijazah2">
  											</span>
  											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
  										</div>
                      <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
  									</div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="scan_skhu">Scan SKHU</label>
              <div class="col-md-10">
                <?php if($subpage == 'Edit') {
                  if ($row->scan_skhu != null) {?>
                        <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->scan_skhu)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                          <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->scan_skhu)?>" style="width:100px">
                          <span class="zoom">
                            <i class="fa fa-search"></i>
                          </span>
                        </a>
                    <?php }
                    } ?>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <input name="old_scan_skhu" value="<?=$row->scan_skhu?>" type="hidden">
  										<div class="input-append">
  											<div class="uneditable-input">
  												<i class="fa fa-file fileupload-exists"></i>
  												<span class="fileupload-preview"></span>
  											</div>
  											<span class="btn btn-default btn-file">
  												<span class="fileupload-exists">Change</span>
  												<span class="fileupload-new">Select file</span>
  												<input type="file" name="scan_skhu" id="scan_skhu">
  											</span>
  											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
  										</div>
                      <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
  									</div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="scan_akte">Scan Akte Kelahiran</label>
              <div class="col-md-10">
                <?php if($subpage == 'Edit') {
                  if ($row->scan_akte != null) {?>
                        <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->scan_akte)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                          <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->scan_akte)?>" style="width:100px">
                          <span class="zoom">
                            <i class="fa fa-search"></i>
                          </span>
                        </a>
                    <?php }
                    } ?>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <input name="old_scan_akte" value="<?=$row->scan_akte?>" type="hidden">
  										<div class="input-append">
  											<div class="uneditable-input">
  												<i class="fa fa-file fileupload-exists"></i>
  												<span class="fileupload-preview"></span>
  											</div>
  											<span class="btn btn-default btn-file">
  												<span class="fileupload-exists">Change</span>
  												<span class="fileupload-new">Select file</span>
  												<input type="file" name="scan_akte" id="scan_akte">
  											</span>
  											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
  										</div>
                      <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
  									</div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="scan_kk">Scan Kartu Keluarga</label>
              <div class="col-md-10">
                <?php if($subpage == 'Edit') {
                  if ($row->scan_kk != null) {?>
                        <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->scan_kk)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                          <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->scan_kk)?>" style="width:100px">
                          <span class="zoom">
                            <i class="fa fa-search"></i>
                          </span>
                        </a>
                    <?php }
                    } ?>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <input name="old_scan_kk" value="<?=$row->scan_kk?>" type="hidden">
  										<div class="input-append">
  											<div class="uneditable-input">
  												<i class="fa fa-file fileupload-exists"></i>
  												<span class="fileupload-preview"></span>
  											</div>
  											<span class="btn btn-default btn-file">
  												<span class="fileupload-exists">Change</span>
  												<span class="fileupload-new">Select file</span>
  												<input type="file" name="scan_kk" id="scan_kk">
  											</span>
  											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
  										</div>
                      <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
  									</div>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
            </div>

          <?php echo form_close() ?>
        </div>
      </section>
      </script>
