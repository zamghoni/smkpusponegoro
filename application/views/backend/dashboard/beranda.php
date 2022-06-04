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
      </ol>
    </div>
  </header>

  <?php $this->view('message'); ?>

<!-- <div class="alert bg-danger fade in nomargin">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
   <h4>Pengumuman !!</h4>
   <p><strong>Setting Identitas Diri, Data Sekolah, Upload Foto 3x4, Scan Ijazah Depan, Scan Ijazah Belakang, Scan SKHU, Pilih Gelombang dan Jurusan Terlebih Dahulu</strong>
       <a href="<?=site_url('pendaftar/form_reg')?>" class="btn btn-primary mt-xs mb-xs">Isi Sekarang !!</a>
     </p>
 </div> -->

 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
  <!-- <div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
          Modal content
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h3 class="modal-title text-center">Pengumuman !!</h3>
             </div>
             <div class="modal-body text-center">
               <p><strong>Setting Identitas Diri, Data Sekolah, Upload Foto 3x4, Scan Ijazah Depan, Scan Ijazah Belakang, Scan SKHU, Pilih Gelombang dan Jurusan Terlebih Dahulu</strong></p>
               <p><a href="<?=site_url('pendaftar/form_reg')?>" class="btn btn-primary mt-xs mb-xs">Isi Sekarang !!</a></p>
               <p><strong>Segera lakukan pembayaran ke Nomor Rekening: 9.3509.930.0000.11100 BANK BTN a.n TS-SMK TELKOM MALANG dan Upload bukti pembayaran </strong></p>
               <p><a href="<?=site_url('pembayaran/pembayaran')?>" class="btn btn-primary mt-xs mb-xs">Upload Sekarang !!</a></p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
         </div> 
     </div>
 </div> -->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<section class="panel">
  <header class="panel-heading">
    <div class="col-lg-8">
      <h2 class="panel-title">Data <?=$page .' '.$this->fungsi->user_login()->username?></h2>
    </div>
    <div class="text-center">
      <a href="<?=site_url('pendaftar/form_reg')?>" class="btn btn-primary">Tambah Data</a>
      <a href="<?=site_url('pendaftar/cetak_formulir')?>" class="btn btn-danger" target="_blank">Cetak Formulir</a>
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
            <?php if ($data->user_id == $this->fungsi->user_login()->id){ ?>
          <tr>
            <th><?=$data->nama_siswa?></th>
            <td><?=$data->judul?></td>
            <!--
            <?php  $date = date('Y-m-d', strtotime($data->created_at));?>
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
                   echo "SKHU : <span class='label label-danger'>NO</span><br>";}
                 if($data->scan_akte != null) { ?> Akte :
                 <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_akte)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                   OK</a><br>
              <?php } else {
                  echo "Akte : <span class='label label-danger'>NO</span><br>";}
                  if($data->scan_kk != null) { ?> KK :
                  <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_kk)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                    OK</a><br>
               <?php } else {
                     echo "KK : <span class='label label-danger'>NO</span>";}?>
            </td>
            <td class="actions-hover actions-fade">
            <?php if ($this->fungsi->user_login()->status != 1) { ?>
              <a href="<?=site_url('pendaftar/daftar_edit/'.$data->pendaftar_id)?>" title="Edit"><i class="fa fa-pencil"></i></a>
              <?php } ?>
              <!-- <a href="<?=site_url('pendaftar/del/'.$data->pendaftar_id)?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?=$data->nama_siswa?>?')" title="Delete" class="delete-row"><i class="fa fa-trash-o"></i></a> -->
            </td>
          </tr>
          <?php } ?>
          <?php } ?>
      </tbody>
    </table>
    </div>
  </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').modal('show');
    });
</script>
