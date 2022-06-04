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
        <a href="<?=site_url('pendaftar/form')?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Data <?=$page;?></a>
      </div>
    </header>
    <div class="panel-body">
      <div class="table-responsive col-lg-12">
      <table class="table table-hover mb-none table-bordered table-striped mb-none dataTable no-footer" id="datatable-default">
        <thead>
          <tr>
            <th>Nama Siswa</th>
            <th>Jurusan</th>
            <th>Asal Sekolah</th>
            <th>Nomor HP</th>
            <th>NEM</th>
            <th>Dokumen Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;
          foreach($row->result()as $key => $data) {?>
          <tr>
            <td><?=$data->nama_siswa?></td>
            <td><?=$data->judul?></td>
            <!--
            <?php 
            $dates = date_create($data->created_at);
            $date = date_format($dates, "Y-m-d");?>
            <td><?=date_indo($date);?></td>
            -->
            <td><?=$data->nama_sekolah?></td>
            <td><?=$data->no_hp?></td>
            <td><?=($data->bhs_indo + $data->bhs_inggris + $data->mtk + $data->ipa);?></td>
            <td>

                <?php if($data->foto3x4 != null) { ?>Foto 3x4 :
                  <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->foto3x4)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                    OK</a><br>
              <?php } else {
                  echo "Foto 3x4 : <span class='label label-danger'>NO</span> <br>";}
                if($data->scan_ijazah1 != null) { ?>Ijazah Depan :
                <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_ijazah1)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                  OK</a><br>
               <?php } else {
                   echo "Ijazah Depan : <span class='label label-danger'>NO</span> <br>";}
                 if($data->scan_ijazah2 != null) {?>Ijazah Belakang :
                 <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_ijazah2)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                   OK</a><br>
               <?php } else {
                    echo "Ijazah Belakang : <span class='label label-danger'>NO</span> <br>";}
                  if($data->scan_skhu != null) { ?> SKHU :
                  <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_skhu)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                    OK</a><br>
               <?php } else {
                     echo "SKHU : <span class='label label-danger'>NO</span> <br>";}
                   if($data->scan_akte != null) { ?> Akte :
                   <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_akte)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                     OK</a><br>
                <?php } else {
                    echo "Akte : <span class='label label-danger'>NO</span><br>";}
                    if($data->scan_kk != null) { ?> SKHU :
                    <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_kk)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                      OK</a><br>
                 <?php } else {
                       echo "KK : <span class='label label-danger'>NO</span>";}?>
            </td>
            <td class="actions-hover actions-fade">
              <a href="<?=site_url('pendaftar/cetak_formulir_adm/'.$data->user_id)?>" title="Cetak Formulir" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
              <a href="<?=site_url('pendaftar/edit/'.$data->pendaftar_id)?>" title="Edit"><i class="fa fa-pencil"></i></a>
              <a href="<?=site_url('pendaftar/del/'.$data->pendaftar_id)?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?=$data->nama_siswa?>?')" title="Delete" class="delete-row"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
  </section>
