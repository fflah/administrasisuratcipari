<body id="page-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
           <h1 class="judul h3 text-gray-800">Daftar <?= $title ?></h1>
           <div class="card shadow mb-0">
            <div class="card-header py-3">
                <a href="<?= base_url('perangkat_desa/add'); ?>" class="btn btn-primary mb-3"> <i class="fa fa-user-plus"></i> Create </a>
            </div>


            <div class="card-body">
              <div class="table-responsive">
                <table class="table table table-bordered table-striped" id="dataTable">
                  <thead>
                      <tr align="center" class="bg-primary" style = "color: white;">
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jabatan</th>
                        <th>Devisi</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php  $id = 1;;
                    foreach($row->result() as $key => $data) { ?>
                        <tr>
                        <td><?=$id++?>.</td>
                        <td><?=$data->nama?></td>
                        <td><?=$data->nik?></td>
                        <td><?=$data->jabatan?></td>
                        <td><?=$data->divisi?></td>
                        <td><?=$data->status?></td>
                        <td class="text-center">
                            <a href="<?=site_url('perangkat_desa/edit/'.$data->id)?>" class="btn btn-info btn-xs">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal" onclick="delete_data(<?=$data->id?>)">
                                <i class="fa fa-trash"> </i> 
                            </a>
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
        <form method ='post' action="<?php echo base_url().'perangkat_desa/hapusdata'; ?>">
          <input type="hidden" name="id">
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

<script>

    function delete_data(id) {
        $('input[name=id]').val(id);
    }
</script>









