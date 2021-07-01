<body id="page-top">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h1 class="judul h3 text-gray-800">Daftar <?= $title ?></h1>

        <div class="card shadow mb-4">

          <div class="card-header py-3">
            <!-- <a href="<?= base_url('suratkeluar/add'); ?>" class="btn btn-primary mb-3">Tambah Data</a> -->

          </div>




          <div class="card-body">
            <div class="table-responsive">
              <table id="datatable-surat-keluar" class = "table table table-bordered table-striped">
                <thead>
                  <tr  align="center"  class="bg-primary" style = "color: white;">
                    <th></th>
                    <th>No</th>
                    <th>No. Surat</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Surat</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody align="center">
                </tbody>
              </table>
            </div>


          </div>



          <!-- Modal hapus data -->

          <div class="modal fade" id="hapusData" tabindex="-1" role="dialog" aria-labelledby="hapusDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="hapusData">Hapus data </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form id="deleteSurat" action="">
                  <div class="modal-body">
                    <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                    <input class="form-control" type="hidden" name="input_idDelete" id="id">
                    <input class="form-control" type="hidden" name="input_idDelete" id="jenis_surat">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger" name="btn_delete" id="btn_delete"> Hapus</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- End modal hapus data -->


          <script>
            $(document).ready(function() {

              var table = $('#datatable-surat-keluar').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                  "url": "<?php echo site_url('/suratkeluar/permintaan_surat_datatabel') ?>",
                  "type": "POST"
                },
                "columns": [{
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                  },
                  {
                    "data": "no"
                  },
                  {
                    "data": "no_surat"
                  },
                  {
                    "data": "jenis_surat"
                  },
                  {
                    "data": "tanggal"
                  },
                  {
                    "data": "NIK",
                    "render": function(data){
            if (data != null) {
              return data
            }else{
              return '-'
            }
                    }
                  },
                  {
                    "data": "nama",
          "render": function(data){
            if (data != null) {
              return data
            }else{
              return '-'
            }
          }
                  },
                  {
                    "data": "aksi",
                    "render": function(data) {
                      var jenis_surat = data.jenis_surat.replace(/ /g, "_")
                      return `<td align="center">
                        
                   <a class="btn btn-success btn-xs" href="<?= site_url('/suratkeluar/cetak_pdf/') ?>${jenis_surat}/${data.id}" align="text-center"><i class="fa fa-print"></i></a>
                          <a style="cursor:pointer" class="btn btn-danger btn-xs" onclick="hapusSurat(${data.id},'${data.jenis_surat}')"><i class="fa fa-trash"></i></a>
                      </td>`
                    }
                  },
                ]
              });


      $("#deleteSurat").on("submit", function(e) {
      e.preventDefault();
      
      var id = $('#id').val();
      var jenis_surat = $('#jenis_surat').val()

      $.ajax({
      type: "POST",
      url: "<?php echo site_url('suratkeluar/deleteSurat') ?>",
      dataType: "JSON",
      data: {
        id: id,
        jenis_surat: jenis_surat
      },
      success: function(data) {
        $('#hapusData').modal('hide');
        $('#datatable-surat-keluar').DataTable().ajax.reload()
        //setTimeout(function() {
       // alert('data berhasil dihapus')
       // }, 1000);

      }
      });

    });
    
            });
          </script>


          <script>
            function hapusSurat(id, jenis_surat) {
              $('#id').val(id);
              $('#jenis_surat').val(jenis_surat)
              $('#hapusData').modal('show');
            }

            
          </script>