<div class="container-fluid">
<div class="table-responsive">
  <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
          Surat Undangan</div>

        <form method ='post' action='#'>
          <div class="container-fluid"></br> 
            <div class="row">

              <div class="col-lg-6">
                <div class="form-group">
                  <label>Jenis Surat : </label>
                  <input type="text" width="50%" name="jenis_surat" class="form-control" value="Surat Undangan" readonly required/ >
                  <input type="hidden" width="50%" name="tanggal" class="form-control" placeholder="" value="<?php echo date('Y-m-d'); ?>" readonly required/>
                  <input type="hidden" width="50%" name="kategori" class="form-control" placeholder="" value="Undangan" readonly required/>
                  <input type="hidden" width="50%" name="jumlah" class="form-control" placeholder="" value="1" readonly required/>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label>Nomor Surat :</label>
                  <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" value=" " readonly required/>
                  <input type="hidden" name="nosu" class="form-control" placeholder="Nomor Surat" value="" readonly required/>
                </div>
              </div>
            
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Informasi :</label>
                  <textarea id="informasi" name="informasi" class="form-control" >
Sifat : <br>
Lampiran :
                  </textarea>
                </div>
              </div>
            

              <div class="col-lg-6">
                <div class="form-group">
                  <label>Kepada :</label>
                  <textarea id="instansi" name="instansi" class="form-control" ></textarea>
                </div>
              </div>
            </div>

            </br>

            <textarea name="keterangan" id="textarea" class="form-control">Mengharap dengan hormat kehadiran Bapak/ Ibu besuk pada :
                  <table width="55%">
                    <tr>
                      <td width="15%">hari, tanggal</td>
                      <td width="2%"> : </td>
                      <td width="40%"></td>
                    </tr>
                    <tr>
                      <td>waktu</td>
                      <td> : </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>tempat</td>
                      <td> : </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>acara</td>
                      <td> : </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>catatan</td>
                      <td> : </td>
                      <td></td>
                    </tr>
                    <tr></tr>
                  </table>
              <p></p>
            Demikian surat undangan ini kami sampaikan, atas partisipasi dan kerjasamanya kami ucapakan terimakasih. 
            </textarea></br>

            <select name="ttd" class="form-control" required >
                        <option value="">---Pilih TTD---</option>
                        <option value="Ahmad Husin">Camat</option>
                        <option value="Suryanto">Sekretaris Camat</option>
            </select></br>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Buat</button>

        </div>
    </form>
</div>
</div>
</div>
