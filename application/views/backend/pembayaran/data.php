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
        <h2 class="panel-title">Data <?=$page;?></h2>
      </div>
      <div class="text-left">
        <a href="<?=site_url('pembayaran/form')?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Data <?=$page;?></a>
      </div>
    </header>
    <div class="panel-body">
      <div class="table-responsive col-lg-12">
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
              <tr>
                <td><?=$data->username?></td>
                <td><?=$data->no_rek?></td>
                <td><?=strtoupper($data->atas_nama)?></td>
                <td><?='Rp. '.$data->jumlah?></td>
                <td><?='Dibuat :'.$data->created.'<br> Diupdate :'.$data->updated?><br>
                <?php if ($data->status == 0) { ?>
              <a href="<?=site_url('pembayaran/lunas/'.$data->id)?>" title="Klik untuk merubah"><span class='label label-danger'>Pembayaran Masuk</span></a>
            <?php } else { ?>
              <a href="<?=site_url('pembayaran/cek/'.$data->id)?>" title="Klik untuk merubah"><span class='label label-success'>Lunas Pembayaran</span></a>
            <?php } ?>
                  <!-- <?=$data->status == 0? "<span class='label label-danger'>Pembayaran Masuk</span>" : "<span class='label label-success'>Lunas Pembayaran</span>"?></td> -->
                <td>
                  <?php if($data->foto != null) { ?>
                    <div class="thumbnail-gallery">
											<a class="img-thumbnail lightbox" href="<?=base_url('upload/pembayaran/'.$data->foto)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
												<img class="img-responsive" width="215" src="<?=base_url('upload/pembayaran/'.$data->foto)?>" style="width:100px">
												<span class="zoom">
													<i class="fa fa-search"></i>
												</span>
											</a>
										</div>
                  <?php } ?>
                </td>
              <td class="actions-hover actions-fade">
                <?php if ($data->status == 1) { ?>
                  <a href="<?=site_url('pembayaran/cetak_pembayaran/'.$data->pembayaran_id)?>" title="Cetak Pembayaran" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                <?php } ?>
								<a href="<?=site_url('pembayaran/edit/'.$data->pembayaran_id)?>" title="Edit"><i class="fa fa-pencil"></i></a>
								<a href="<?=site_url('pembayaran/del/'.$data->pembayaran_id)?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?=$data->foto?>?')" title="Delete" class="delete-row"><i class="fa fa-trash-o"></i></a>
							</td>
            </tr>
            <?php
            } ?>
        </tbody>
      </table>
    </div>
    </div>
  </section>
