<body id="page-top">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
        </div>
                <form action="<?= base_url('penduduk/proses'); ?>" method="post">
                <div class="form-group">
                    <label for="form_name">Nama *</label>
                    <input value="<?=$row->id?>" id="form_name" type="hidden" name="id" class="form-control" placeholder="Silahkan masukkan nama anda *" required="required" data-error="Nama harus diisi!.">
                    <input value="<?=$row->nama?>" id="form_name" type="text" name="nama" class="form-control" placeholder="Silahkan masukkan nama anda *" required="required" data-error="Nama harus diisi!.">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="form_lastname">NIK *</label>
                    <input value="<?=$row->NIK?>" id="form_lastname" type="text" name="NIK" class="form-control" placeholder="Silahkan masukkan NIK anda *" required="required" data-error="NIK Harus diisi!.">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="form_wa">Jenis Kelamin *</label>
                    <select value="<?=$row->jk?>" name="jk" class="form-control" id="sel1" required>
                    <option value="" selected disabled>Choose...</option>
                    <?php
                      if ($row->jk == 'Laki-laki') {
                        echo '<option selected value="Laki-laki">Laki-laki</option>';
                        echo '<option value="Perempuan">Perempuan</option>';
                      }else{
                        echo '<option value="Laki-laki">Laki-laki</option>';
                        echo '<option selected value="Perempuan">Perempuan</option>';
                      }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="form_alamat">Alamat *</label>
                    <textarea value="<?=$row->alamat?>" required name="alamat" class="form-control" rows="3" id="comment" placeholder="Silahkan masukkan alamat anda" ><?=$row->alamat?></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="form_wa">Agama *</label>
                    <input type="text" value="<?=$row->agama?>" required name="agama" class="form-control" id="sel1">                        
                    </input>
                </div>
                <div class="form-group">
                    <label for="form_wa">Tempat tanggal lahir *</label>
                    <input value="<?=$row->tempat_tgl_lahir?>" id="form_wa" type="text" name="tempat_tgl_lahir" class="form-control" placeholder="Silahkan masukkan tempat tanggal lahir anda *" required="required" data-error="Format no salah.">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="form_wa">Email </label>
                    <input value="<?=$row->email?>" id="form_wa" type="email" name="email" class="form-control" placeholder="silakan kosongi jika tidak ada data email" data-error="Format no salah.">
                    <SMALL> 
                        Ketik email yang aktif karena notifikasi akan dikirim melalui email.
                    </SMALL> 
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="form_wa">Pekerjaan</label>
                    <input value="<?=$row->pekerjaan?>" id="form_wa" type="text" name="pekerjaan" class="form-control" placeholder="Silahkan masukkan pekerjaan anda *" required="required" data-error="Format no salah.">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="form_wa">Status perkawinan</label>
                    <select value="<?=$row->status?>" required name="status" class="form-control" id="sel1">
                        <option value="" selected disabled>Choose...</option>
                        <?php
                          if ($row->jk == 'Kawin') {
                            echo '<option selected value="Kawin">Kawin</option>';
                            echo '<option value="Belum Kawin">Belum Kawin</option>';
                          }else{
                            echo '<option value="Kawin">Kawin</option>';
                            echo '<option selected value="Belum Kawin">Belum Kawin</option>';
                          }
                        ?>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="form_wa">Whatsapp</label>
                    <input value="<?=$row->wa?>" id="form_wa" type="text" name="wa" class="form-control" placeholder="Silahkan masukkan nomor whatsapp anda *" required="required" data-error="Format no salah.">
                </div>
                    

                <div class="form-group">
                    <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                      <i class="fa fa-paper-plane"></i> Save</button>
                 </div>

                </form>
        </div>
        
               
