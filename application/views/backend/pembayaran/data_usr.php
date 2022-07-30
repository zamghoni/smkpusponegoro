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
<?php $this->view('message')?>

  <section class="panel">
    <header class="panel-heading">

      <div class="col-lg-10">
        <h2 class="panel-title">Data <?=$page .' '.$this->fungsi->user_login()->username?></h2>
      </div>
      <div class="text-left">
        <a href="<?=site_url('pembayaran/form_pay')?>" class="btn btn-primary">Tambah Data</a>
      </div>
    </header>
    <div class="panel-body">
      <div class="table-responsive col-lg-12">
        <?php
        foreach($row->result()as $key => $data) {?>
          <?php if ($data->id_user == $this->fungsi->user_login()->id){ ?>
        <?php if ($data->status == 1) { ?>
          <div class="text-center">
              <h3>Selamat Pembayaran Anda sudah kami terima. <br> Silahkan cetak bukti pembayaran pada tombol dibawah ini</h3>
              <a href="<?=site_url('pembayaran/cetak_pembayaran/'.$data->pembayaran_id)?>" title="Cetak Pembayaran" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Cetak Bukti Pembayaran</a>
            </div>
            <hr>
        <?php }}} ?>
      </div>
      <table class="table table-hover mb-none table-bordered table-striped mb-none dataTable no-footer" id="datatable-default">
        <thead>
          <tr>
            <th>Nama User</th>
            <th>No Rek</th>
            <th>Atas Nama</th>
            <th>Jumlah Transfer</th>
            <th>Riwayat - Status</th>
            <th>Bukti Transfer</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php $no=1;
            foreach($row->result()as $key => $data) {?>
              <?php if ($data->id_user == $this->fungsi->user_login()->id){ ?>
            <tr>
              <td><?=ucfirst($data->username)?></td>
              <td><?=$data->no_rek?></td>
              <td><?=strtoupper($data->atas_nama)?></td>
              <td><?='Rp. '.$data->jumlah?></td>
              <td><?='Dibuat :'.$data->created.'<br> Diupdate :'.$data->updated?><br>
                <?=$data->status == 0? "<span class='label label-danger'>Pembayaran Sedang diproses</span>" : "<span class='label label-success'>Lunas Pembayaran</span>"?></td>
              <td>
                <?php if($data->foto != null) { ?>
                    <a class="img-thumbnail lightbox" href="<?=base_url('upload/pembayaran/'.$data->foto)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                      <img class="img-responsive" width="215" src="<?=base_url('upload/pembayaran/'.$data->foto)?>" style="width:100px">
                      <span class="zoom">
                        <i class="fa fa-search"></i>
                      </span>
                    </a>
                <?php } ?>
              </td>
              <td class="actions-hover actions-fade">
                <?php if ($data->status != 1) { ?>
								<a href="<?=site_url('pembayaran/edit_usr/'.$data->pembayaran_id)?>" title="Edit"><i class="fa fa-pencil"></i></a>
              <?php } ?>
							</td>
            </tr>
          <?php }
            } ?>
        </tbody>
      </table>
    </div>
    </div>
  </section>
