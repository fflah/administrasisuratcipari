<body id="page-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
           <h1 class="judul h3 text-gray-800">Daftar <?= $title ?></h1>
            <div class="card shadow mb-0">
              <div class="card-header py-3">
                  <a href="<?= base_url('suratmasuk/add'); ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i>Tambah Data</a>
               </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr align="center"  class="bg-primary" style = "color: white;"> 
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>SKPD/Intansi</th>
                        <th>Tanggal Surat</th>
                        <th>Tanggal Terima</th>
                        <th>Perihal</th>
                        <th>File</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php  $no = 1;;
                    foreach($row->result() as $key => $data) { ?>
                        <tr align="center">
                        <td><?=$no++?>.</td>
                        <td><?=$data->no_surat?></td>
                        <td><?=$data->pengirim?></td>
                        <td><?php echo tanggal_indo(date('Y-m-d ', strtotime ($data->tgl_surat)))?></td>
                        <td><?php echo tanggal_indo(date('Y-m-d ', strtotime ($data->tgl_terima)))?></td>
                        <!--<td><?=$data->tgl_terima?></td>!-->
                        <td><?=$data->keterangan?></td>
                        <td><a href="<?php echo base_url().'suratmasuk/download/'.$data->no; ?>" href=<?= base_url('./assets/upload/')?>> <?=$data->file_surat?> </a> </a></td>
                        <td class="text-center">
                            <a href="<?=site_url('suratmasuk/edit/'.$data->no)?>" class="btn btn-info btn-xs" >
                                <i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('suratmasuk/openfile/' .$data->file_surat )?>" class="btn btn-success btn-xs" >
                                <i class="fa fa-eye"> </i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal" onclick="delete_data(<?=$data->no?>)"><i class="fa fa-trash"> </i></a>
                         
                        </td>  
                    </tr>
                  <?php
               } ?>
           </tbody>
          </table>
      </div>
<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method ='post' action="<?php echo base_url().'suratmasuk/hapusdata'; ?>">
          <input type="hidden" name="no">
          <div class="form-group">
            <p><b>Apakah Anda Yakin Menghapus Data Ini?</b></p>
          </div>
          
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>

    function delete_data(id) {
        $('input[name=no]').val(id);
    }
</script>
