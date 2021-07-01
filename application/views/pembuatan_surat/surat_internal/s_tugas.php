<div class="container-fluid">
  <div class="table-responsive">
    <div class="card mb-3">
      <div class="card-header">
        <i class=""></i>
        Surat Tugas
      </div>

      <form method='post' action=''>
        <div class="container-fluid"></br>
          <div class="row">

            <div class="col-lg-6">
              <div class="form-group">
                <label>Jenis Surat : </label>
                <input type="text" width="50%" name="jenis_surat" class="form-control" value="Surat Tugas" readonly required/>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" value="<?=$no_surat?>" readonly required />
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Tanggal Surat :</label>
                <input id="tanggal_surat" type="date" name="tanggal_surat" class="form-control" placeholder="Nomor Surat" value="" required />
              </div>
            </div>

          </div>
          </br>

          <div class="table-responsive">

            <div class="card mb-3">
              <div class="card-header">
                <i class=""></i>
                Data Perangkat Desa
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pilih</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Divisi</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $id = 1;;
                      foreach ($data_perangkat_desa as  $data) { ?>
                        <tr>
                          <td><?= $id++ ?>.</td>
                          <td><input required type='radio' name='id_perangkat_desa' value='<?= $data->id; ?>' />

                          </td>
                          <td><?= $data->nik ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->jabatan ?></td>
                          <td><?= $data->divisi ?></td>
                          <td><?= $data->status ?></td>

                        </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>           
            <small id="emailHelp" class="form-text text-muted">Silakan ganti titik(........) sesuai dengan kebutuhan anda.</small> 
            <textarea rows="10" name="kontent" id="textarea" class="form-control">
              Untuk mengikuti kegiatan<strong> ......................</strong> yang akan dilaksanakan pada :
                    <table id="tabel" style="margin-left: 100px;" width="55%">
                        <tr>
                            <td width="15%">Tanggal</td>
                            <td width="2%"> : </td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td> : </td>
                            <td ></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td> : </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Acara</td>
                            <td> : </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td> : </td>
                            <td></td>
                        </tr>
                    </table>
                  </textarea>
          </div></br>
          <select name="ttd" class="form-control" required >
            <option value="">---Pilih TTD---</option>
            <option value="Ahmad Husin%Camat">Camat</option>
            <option value="Suyatno%Sekretaris Camat">Sekretaris Camat</option>
          </select></br>


          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Buat</button>

      </form>

    </div>

  </div>
</div>


</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<script src="<?= base_url() ?>plugins/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "#textarea",theme: "modern",height: 220,
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor"
       ],
       toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
       toolbar2: "| link unlink anchor | image media | forecolor backcolor  | print preview code ",
       image_advtab: true ,

    });
    // config tanggal surat
    $('#tanggal_surat').on('change', function(){
        var tgl_surat = $('#tanggal_surat').val()
        var arr_tgl = tgl_surat.split("-")              
        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];                                 
        var html = `
            Untuk mengikuti kegiatan<strong> ......................</strong> yang akan dilaksanakan pada :
            <table id="tabel" style="margin-left: 100px;" width="55%">
                <tr>
                    <td width="15%">Tanggal</td>
                    <td width="2%"> : </td>
                    <td width="40%">${arr_tgl[2]}, ${bulan[parseInt(arr_tgl[1])]} ${arr_tgl[0]}</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td> : </td>
                    <td ></td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td> : </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Acara</td>
                    <td> : </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td> : </td>
                    <td></td>
                </tr>
            </table>
                `
        tinymce.activeEditor.setContent(html);
        })     
    
  </script>