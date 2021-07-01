<div class="box box-info">
<section class="content">
  <div class="row">
      

      <div class="col-lg-8">
          <div class="box-header">
            <div class="container-fluid">
                <div class="table-responsive">
	                 <div class="card mb-3">
                      <div class="card-header">
                        <i class=""></i>
                     Surat Keterangan </div>

     		<form method ='post' action='<?= base_url('surat/Surat/cetak_pdf') ?>'>
          <div class="container-fluid"></br> 
            <div class="row">

              <div class="col-lg-6">
                <div class="form-group">
                  <label>Jenis Surat :  </label>
                  <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" value="<?= $data_surat['jenis_surat']?>" readonly required/>
                </div>
              </div>
  
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Nomor Surat :</label>
                  <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" value="<?= $data_surat['no_surat']?>" readonly required/>
                  <input type="hidden" name="nosu" class="form-control" placeholder="Nomor Surat" value="" readonly required/>
                </div>
              </div>
            </div>
            </br>

            <table cellpadding="2" cellspacing="4" style="font-size: 15px;">
            <tr>
                <b>
                    Data warga:
                </b>
            </tr>
              <tr>
                  <td width="150px">Nama </td>
                  <td>:</td>
                  <td><?= $data_surat['nama']?></td>
              </tr>
              <tr>
                  <td>Tempat, tanggal lahir</td>
                  <td>:</td>
                  <td><?= $data_surat['tempat_tgl_lahir']?></td>
              </tr>
              <tr>
                  <td>Status perkawinan</td>
                  <td>:</td>
                  <td><?= $data_surat['status']?></td>
              </tr>
              <tr>
                  <td>Agama</td>
                  <td>:</td>
                  <td><?= $data_surat['agama']?></td>
              </tr>
              <tr>
                  <td>Jenis kelamin</td>
                  <td>:</td>
                  <td><?= $data_surat['jk']?></td>
              </tr>
              <tr>
                  <td>Pekerjaan</td>
                  <td>:</td>
                  <td><?= $data_surat['pekerjaan']?></td>
              </tr>
              <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><?= $data_surat['alamat']?></td>
              </tr>
          </table>
          <br>

            <select name="ttd" class="form-control" required >
                <option selected disabled value="">---Pilih TTD---</option>
                <option value="Antoni Budiarso%Kepala Desa">Kepala Desa</option>
                <option value="Ninuk Winarsih%Sekretaris Desa">Sekretaris Desa</option>
            </select></br>

            <input type="hidden" name="jenis_surat" value="<?=$this->uri->segment(4)?>">
            <input type="hidden" name="id_surat" value="<?=$this->uri->segment(5)?>">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button target="_blank" type="submit" class="btn btn-primary">Buat</button>
          
        </form>
        
    </div>

</div>
</div>
</div>
</div>
</section>
</div>
