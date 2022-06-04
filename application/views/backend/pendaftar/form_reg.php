<section role="main" class="content-body">
  <header class="page-header">
    <h2><?=$page;?></h2>

    <div class="right-wrapper pull-right" style="margin-right:45px">
      <ol class="breadcrumbs">
        <li>
          <a href="<?=site_url('dashboard/pendaftar')?>">
            <i class="fa fa-home"></i>
          </a>
        </li>
        <li><span><?=$page;?></span></li>
        <li><span><?=$subpage;?></span></li>
      </ol>
    </div>
  </header>
  <?php $this->view('message')?>

  <section class="panel form-wizard" id="w1">
		<header class="panel-heading">
			

			<h2 class="panel-title">Formulir Pendaftaran</h2>
		</header>
		<div class="panel-body panel-body">
			<div class="wizard-tabs" style="margin-top:10px">
				<ul class="wizard-steps">
					<li class="active">
						<a href="#w1-data-diri" data-toggle="tab" class="text-center">
							<span class="badge hidden-xs">1</span>
							Data Diri
						</a>
					</li>
					<li>
						<a href="#w1-data-sekolah" data-toggle="tab" class="text-center">
							<span class="badge hidden-xs">2</span>
							Data Sekolah
						</a>
					</li>
					<li>
						<a href="#w1-upload" data-toggle="tab" class="text-center">
							<span class="badge hidden-xs">3</span>
							Upload File
						</a>
					</li>
				</ul>
			</div>
      <hr>
			<?php echo form_open_multipart('pendaftar/daftar') ?>
				<div class="tab-content">
          <div id="w1-data-diri" class="tab-pane active">
          <div class="col-lg-6">
            <div class="panel-body">
              <h4 class="panel-title" style="margin-bottom:8px">A. Identitas Calon Siswa</h4>
              <p>Lengkapi Data Diri Anda dengan data yang sesungguhnya.</p>
              <hr>
              <div class="container col-lg-12">
                <div class="form-group">
  								<label class="control-label" for="w1-nisn">NISN *</label>
                    <input type="hidden" name="pendaftar_id" value="<?=$row->pendaftar_id?>">
                    <input type="hidden" value="<?=$this->fungsi->user_login()->id?>" name="user_id" class="form-control" required>
  									<input type="number" value="<?=$row->nisn?>" class="form-control input-sm" name="nisn" maxlength="10" id="w1-nisn" maxlength="10" required>
                </div>
  							<div class="form-group">
  								<label class="control-label" for="w1-nama_siswa">Nama Lengkap Siswa *</label>
  									<input type="text" value="<?=$row->nama_siswa?>" class="form-control input-sm" name="nama_siswa" id="w1-nama_siswa" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-tempat_lahir">Tempat Lahir *</label>
  									<input type="text" value="<?=$row->tempat_lahir?>" class="form-control input-sm" name="tempat_lahir" id="w1-tempat_lahir" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-tgl_lahir">Tanggal Lahir *</label>
  									<input type="date" value="<?=$row->tgl_lahir?>" class="form-control input-sm" name="tgl_lahir" id="w1-tgl_lahir" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-jk">Jenis Kelamin *</label>
                    <select class="form-control" name="jk" class="collapse submenu" id="w1-jk" required>
                      <?php $jk = $this->input->post('jk') ? $this->input->post('jk') : $row->jk ?>
                      <option value="">- Pilih -</option>
                      <option value="L" <?=$jk == 'L' ? 'selected' : null?>> Laki-Laki </option>
                      <option value="P" <?=$jk == 'P' ? 'selected' : null?>> Perempuan </option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-agama">Agama *</label>
                    <select class="form-control" name="agama" class="collapse submenu" id="w1-agama" required>
                      <?php $agama = $this->input->post('agama') ? $this->input->post('agama') : $row->agama ?>
                      <option value="">- Pilih -</option>
                      <option value="Islam" <?=$agama == 'Islam' ? 'selected' : null?>> Islam </option>
                      <option value="Kristen" <?=$agama == 'Kristen' ? 'selected' : null?>> Kristen </option>
                      <option value="Katolik" <?=$agama == 'Katolik' ? 'selected' : null?>> Katolik </option>
                      <option value="Hindu" <?=$agama == 'Hindu' ? 'selected' : null?>> Hindu </option>
                      <option value="Buddha" <?=$agama == 'Buddha' ? 'selected' : null?>> Buddha </option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" id="w1-alamat"><?=$row->alamat?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-kode_pos">Kode Pos *</label>
                    <input type="number" value="<?=$row->kode_pos?>" name="kode_pos" class="form-control" id="w1-kode_pos" maxlength="5" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-no_telp">No Telp. *</label>
                    <input type="number" value="<?=$row->no_telp?>" name="no_telp" class="form-control" id="w1-no_telp" maxlength="12" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-no_hp">No Handphone *</label>
                    <input type="number" value="<?=$row->no_hp?>" name="no_hp" class="form-control" id="w1-no_hp" maxlength="13" required>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="panel-body">
            <h4 class="panel-title" style="margin-bottom:8px">B. Data Orang Tua/Wali</h4>
            <p>Lengkapi Data Orang Tua/Wali Anda dengan data yang sesungguhnya.</p>
            <hr>
              <div class="container col-lg-12">
  							<div class="form-group">
                  <label class="control-label" for="w1-nama_ayah">Nama Ayah *</label>
  									<input type="text" value="<?=$row->nama_ayah?>" class="form-control input-sm" name="nama_ayah" id="w1-nama_ayah" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-nama_ibu">Nama Ibu *</label>
  									<input type="text" value="<?=$row->nama_ibu?>" class="form-control input-sm" name="nama_ibu" id="w1-nama_ibu" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-nama_wali">Nama Wali *</label>
                    <input type="text" value="<?=$row->nama_wali?>" class="form-control input-sm" name="nama_wali" id="w1-nama_wali" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-alamat_org">Alamat Orang Tua/Wali</label>
                    <textarea class="form-control" name="alamat_org" rows="3" id="w1-alamat_org"><?=$row->alamat_org?></textarea>
                </div>
              </div>
  					</div>
          </div>
          
        </div>
					<div id="w1-data-sekolah" class="tab-pane">
            <div class="col-lg-6">
              <div class="panel-body">
                <h4 class="panel-title" style="margin-bottom:8px">D. Data Sekolah</h4>
                <p>Lengkapi Data Sekolah Anda dengan data yang sesungguhnya.</p>
                <hr>
                <div class="container col-lg-12">
                  <div class="form-group">
      							<label class="control-label" for="w1-nama_sekolah">Nama Sekolah *</label>
      								<input type="text" value="<?=$row->nama_sekolah?>" class="form-control input-sm" name="nama_sekolah" id="w1-nama_sekolah" required>
      						</div>
                  <div class="form-group">
                    <label class="control-label" for="w1-alama_sekot">Alamat Sekolah</label>
                      <textarea class="form-control" name="alamat_sekolah" rows="3" id="w1-alamat_sekolah"><?=$row->alamat_sekolah?></textarea>
                  </div>
                  <div class="form-group">
      							<label class="control-label" for="w1-kec_sekolah">Kecamatan Sekolah *</label>
      								<input type="text" value="<?=$row->kec_sekolah?>" class="form-control input-sm" name="kec_sekolah" id="w1-kec_sekolah" required>
      						</div>
                  <div class="form-group">
      							<label class="control-label" for="w1-kab_kota_sekolah">Kabupaten/Kota Sekolah *</label>
      								<input type="text" value="<?=$row->kab_kota_sekolah?>" class="form-control input-sm" name="kab_kota_sekolah" id="w1-kab_kota_sekolah" required>
      						</div>
                  <div class="form-group">
      							<label class="control-label" for="w1-propinsi">Propinsi *</label>
      								<input type="text" value="<?=$row->propinsi?>" class="form-control input-sm" name="propinsi" id="w1-propinsi" required>
      						</div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="panel-body">
                <h4 class="panel-title" style="margin-bottom:8px">E. Nomor Ijazah dan Nilai UN</h4>
                <p>Lengkapi Data Ijazah dan Nilai Ujian Nasional dengan data yang sesungguhknya.</p>
                <hr>
                <div class="container col-lg-12">
                  <div class="form-group">
                    <label class="control-label" for="w1-tahun_lulus">Tahun Lulus *</label>
    									<input type="number" value="<?=$row->tahun_lulus?>" class="form-control input-sm" name="tahun_lulus" id="w1-tahun_lulus" maxlength="4" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="w1-no_ijazah">Nomor Ijazah *</label>
    									<input type="text" value="<?=$row->no_ijazah?>" class="form-control input-sm" name="no_ijazah" id="w1-no_ijazah" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="w1-bhs_indo">Bahasa Indonesia *</label>
    									<input type="number" value="<?=$row->bhs_indo?>" class="form-control input-sm" name="bhs_indo" id="w1-bhs_indo" maxlength="4" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="w1-bhs_inggris">Bahasa Inggris *</label>
    									<input type="number" value="<?=$row->bhs_inggris?>" class="form-control input-sm" name="bhs_inggris" id="w1-bhs_inggris" maxlength="4" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="w1-mtk">Matematika *</label>
    									<input type="number" value="<?=$row->mtk?>" class="form-control input-sm" name="mtk" id="w1-mtk" maxlength="4" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="w1-ipa">Ilmu Pengetahuan Alam *</label>
    									<input type="number" value="<?=$row->ipa?>" class="form-control input-sm" name="ipa" id="w1-ipa" maxlength="4" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="panel-body">
                <h4 class="panel-title" style="margin-bottom:8px">F. Prestasi dan Penghargaan</h4>
                <p>Lengkapi Data Prestasi dan Penghargaan yang pernah diraih di Sekolah dengan data yang sesungguhnya.</p>
                <hr>
                <div class="container col-lg-12">
                  <div class="form-group">
                    <label class="control-label" for="w1-prestasi">Prestasi Sekolah</label>
                      <textarea class="form-control" name="prestasi" rows="3" id="w1-prestasi"><?=$row->prestasi?></textarea>
                      <small>Tuliskan <b>Nama</b> Prestasi atau Penghargaan, <b>Tingkat</b> Prestasi atau Penghargaan dan <b>Tahun</b> Prestasi atau Penghargaan</small>
                  </div>
                </div>
              </div>
            </div>
					</div>
					<div id="w1-upload" class="tab-pane">
            <div class="col-lg-12" style="margin-bottom:25px">
            <div class="panel-body">
              <h4 class="panel-title" style="margin-bottom:8px">G. Pilih Jurusan dan Upload File</h4>
              <p>Lengkapi Upload File dengan mengupload Foto 3x4, Scan Ijazah Depan dan Belakang serta Scan SKHU</p>
              <hr>
              <div class="form-group">
              <label class="col-md-3 control-label" for="id_jurusan">Jurusan *</label>
              <div class="col-md-6">
                <select class="form-control" name="id_jurusan" id="id_jurusan">
                  <option value="">- Pilih -</option>
                  <?php  foreach ($jurusan->result() as $key => $data) { ?>
                    <option value="<?=$data->jurusan_id?>" <?=$data->jurusan_id == $row->jurusan_id ? 'selected' : null?>> <?=$data->judul?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label" for="foto3x4">Foto 3x4 </label>
            <div class="col-md-2">
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
              </div>
              <div class="col-md-7">
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
            <label class="col-md-3 control-label" for="scan_ijazah1">Scan Ijazah Depan</label>
            <div class="col-md-2">
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
                </div>
                <div class="col-md-7">
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
            <label class="col-md-3 control-label" for="scan_ijazah2">Scan Ijazah Belakang</label>
            <div class="col-md-2">
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
                </div>
                <div class="col-md-7">
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
            <label class="col-md-3 control-label" for="scan_skhu">Scan SKHU</label>
            <div class="col-md-2">
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
                </div>
                <div class="col-md-7">
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
            <label class="col-md-3 control-label" for="scan_akte">Scan Akte Kelahiran</label>
            <div class="col-md-2">
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
                </div>
                <div class="col-md-7">
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
            <label class="col-md-3 control-label" for="scan_kk">Scan Kartu Keluarga</label>
            <div class="col-md-2">
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
                </div>
                <div class="col-md-7">
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
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close() ?>
		<div class="panel-footer">
      <div class="col-lg-12 text-center">
        <h5>Catatan Tanda (*): Harus Di isi</h5>
      </div>
			<ul class="pager">
				<li class="previous disabled">
					<a><i class="fa fa-angle-left"></i> Previous</a>
				</li>
				<li class="finish hidden pull-right">
					<a>Finish</a>
				</li>
				<li class="next">
					<a>Next <i class="fa fa-angle-right"></i></a>
				</li>
			</ul>
		</div>
	</section>
