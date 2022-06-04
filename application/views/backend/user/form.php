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
            <a href="<?=site_url('user')?>" class="btn btn-sm btn-danger"><i class="fa fa-undo"></i> Back</a>
          </div>

        </header>
        <div class="panel-body">
          <form class="form-horizontal form-bordered" action="<?=site_url('user/process')?>" method="post" onsubmit="return tambah(this)">
            <div class="form-group">
              <label class="col-md-2 control-label" for="username">Username *</label>
              <div class="col-md-10">
                <input type="hidden" name="id" value="<?=$row->id?>">
                <input type="text" value="<?=$row->username?>" name="username" class="form-control" id="username" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="email">Email *</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->email?>" name="email" class="form-control" id="email"required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="password">Password *</label>
              <div class="col-md-10">
                <input type="password" value="" name="password" class="form-control" id="password">
                <small>(<?=$subpage == 'Edit' ? 'Biarkan kosong jika password tidak diganti' : 'Silahkan password di isi'?>)</small>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="konf_password">Konfirmasi Password *</label>
              <div class="col-md-10">
                <input type="password" value="" name="konf_password" class="form-control" id="konf_password" >
                <small>(<?=$subpage == 'Edit' ? 'Biarkan kosong jika password tidak diganti' : 'Silahkan konfirmasi password di isi sama dengan password'?>)</small>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="role">Role *</label>
              <div class="col-md-10">
                <select class="form-control" name="role" class="collapse submenu" id="role" required >
                  <?php $role = $this->input->post('role') ? $this->input->post('role') : $row->role ?>
                  <option value="">- Pilih -</option>
                  <option value="0" <?=$role == '0' ? 'selected' : null?>> User </option>
                  <option value="1" <?=$role == '1' ? 'selected' : null?>> Admin </option>
                </select>
              </div>
            </div>

            <!-- <div class="form-group">
              <label class="col-md-2 control-label" for="status">Status Pembayaran *</label>
              <div class="col-md-10">
                <select class="form-control" name="status" class="collapse submenu" id="status" required >
                  <?php $status = $this->input->post('status') ? $this->input->post('status') : $row->status ?>
                  <option value="">- Pilih -</option>
                  <option value="0" <?=$status == '0' ? 'selected' : null?>> Belum Bayar </option>
                  <option value="1" <?=$status == '1' ? 'selected' : null?>> Lunas </option>
                </select>
              </div>
            </div> -->

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>

          </form>
        </div>
      </section>
<?php if ($page == 'add') {?>
  <script type="text/javascript">
  function tambah(form) {
    if (form.password.value=='') {
      alert('Password, Harus diisi');
      return false;
    } else if (form.konf_password.value=='') {
      alert('Konfirmasi Password, Harus diisi');
      return false;
    } else if (form.konf_password.value!=form.password.value) {
      alert('Konfirmasi Password, Tidak Sesuai');
      return false;
    }else {
      return true;
    };
  }
  </script>
<?php } ?>
