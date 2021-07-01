<div class="box box-info">
<section class="content">
  <div class="row">
      <div class="col-lg-3"> 

          <div class="box-header">
            <h5 class="box-title">Data Warga</h5>
            <br><br>
              <label>NIK Warga</label>
                <input type="text" width="50%" name="nik_warga" class="form-control" placeholder="" value="" readonly required/>
              <label>Nama Warga</label>
                <input type="text" width="50%" name="nama_warga" class="form-control" placeholder="" value="" readonly required/>
              <label>Jenis Kelamin</label>
                <input type="text" width="50%" name="jk" class="form-control" placeholder="" value="" readonly required/>
              <label>Tempat, Tanggal Lahir</label>
                <input type="text" width="50%" name="tempat_tgl_lahir" class="form-control" placeholder="" value="" readonly required/>
              <label>Agama</label>
                <input type="text" width="50%" name="agama" class="form-control" placeholder="" value="" readonly required/>
              <label>Status Perkawinan</label>
                <input type="text" width="50%" name="status_kawin" class="form-control" placeholder="" value="" readonly required/>
              <label>Pekerjaan</label>
                <input type="text" width="50%" name="pekerjaan" class="form-control" placeholder="" value="" readonly required/>
              <label>Alamat</label>
                <input type="textarea" width="50%" name="alamat" class="form-control" placeholder="" value="" readonly required/>
          </div>

      </div>

      <div class="col-lg-8">
          <div class="box-header">
            <div class="container-fluid">
                <div class="table-responsive">
                   <div class="card mb-3">
                      <div class="card-header">
                        <i class=""></i>
                      Surat Pernyataan </div>

        <form method ='post' action='#'>
          <div class="container-fluid"></br> 
            <div class="row">

              <div class="col-lg-6">
                <div class="form-group">
                  <label>Jenis Surat : </label>
                  <input type="text" width="50%" name="jenis_surat" class="form-control" value="Surat Keterangan . . . . . . . ."required/>
                  <input type="hidden" width="50%" name="nik_warga" class="form-control" placeholder="" value="" required/>
                  <input type="hidden" width="50%" name="nama_warga" class="form-control" placeholder="" value="" required/>
                  <input type="hidden" width="50%" name="kategori" class="form-control" placeholder="" value="Keterangan" readonly required/>
                  <input type="hidden" width="50%" name="jumlah" class="form-control" placeholder="" value="1" readonly required/>
                  <input type="hidden" width="50%" name="tanggal" class="form-control" placeholder="" value="" readonly required/>
                </div>
              </div>
  
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Nomor Surat :</label>
                  <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" value="" readonly required/>
                  <input type="hidden" name="nosu" class="form-control" placeholder="Nomor Surat" value="" readonly required/>
                </div>
              </div>
            </div>
            </br>

            <textarea name="keterangan" id="textarea" class="form-control">
              <p>
               
              </p>
            </textarea></br>

            <select name="ttd" class="form-control" required >
                        <option value="">---Pilih TTD---</option>
                        <option value="Antoni Budiarso">Kepala Desa</option>
                        <option value="Ninuk Winarsih">Sekretaris Desa</option>
            </select></br>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Buat</button>
          
        </form>
        
    </div>

</div>
</div>
</div>
</div>
</section>
</div>
