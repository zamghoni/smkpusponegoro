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
        <a href="<?=site_url('kategori/form')?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Data <?=$page;?></a>
      </div>
    </header>
    <div class="panel-body">
      <div class="table-responsive col-lg-12">
      <table class="table table-hover mb-none table-bordered table-striped mb-none dataTable no-footer" id="datatable-default">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php $no=1;
            foreach($row->result()as $key => $data) {?>
            <tr>
              <td><?=$no;?></td>
              <td><?=$data->nama_kategori?></td>
              <td class="actions-hover actions-fade">
								<a href="<?=site_url('kategori/edit/'.$data->kategori_id)?>" title="Edit"><i class="fa fa-pencil"></i></a>
								<a href="<?=site_url('kategori/del/'.$data->kategori_id)?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?=$data->nama_kategori?>?')" title="Delete" class="delete-row"><i class="fa fa-trash-o"></i></a>
							</td>
            </tr>
            <?php
            $no++;
            } ?>
        </tbody>
      </table>
    </div>
    </div>
  </section>
