<section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/kelurahan.png" alt="">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">

                <h1  align="center"><p>Pelayanan Surat Online</p>
                    <a href="https://Semarapurakaja.desa.id">Desa gandrungmangu</a>
                </h1>

                <p id="judul_cek_nik" class="lead">Silahkan validasi NIK anda dibawah ini</p>
                
                <form id="form_cek_nik" class="form-inline" action="">
                <div class="form-group">
                        <label for="nik_input"> </label> &nbsp;
                        <input type="nik_input" placeholder="Masukan NIK anda" class="form-control" id="nik_input">
                        &nbsp; &nbsp; &nbsp;
                    </div>
                    <button type="submit" class="btn btn-primary">CEK</button>
                </form>
                
                <form id="contact-form" method="post" action="<?= base_url('suratPengantar/add_surat_general') ?>" role="form" enctype="multipart/form-data">
                <p class="lead">Silahkan lengkapi semua isian sesuai dengan data yang diperlukan</p>

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_name">Nama *</label>
                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="Silahkan masukkan nama anda *" required="required" data-error="Nama harus diisi!.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_lastname">NIK *</label>
                                    <input id="nik" type="text" name="NIK" class="form-control" placeholder="Silahkan masukkan NIK anda *" required="required" data-error="NIK Harus diisi!.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Jenis Kelamin *</label>
                                    <select name="jk" class="form-control" id="jk" required>
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_alamat">Alamat *</label>
                                    <textarea required name="alamat" class="form-control" rows="3" id="alamat" placeholder="Silahkan masukkan alamat anda" ></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Agama *</label>
                                    <select required name="agama" class="form-control" id="agama">
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Tempat tanggal lahir *</label>
                                    <input id="ttl" type="text" name="tempat_tgl_lahir" class="form-control" placeholder="Silahkan masukkan tempat tanggal lahir anda *" required="required" data-error="Format no salah.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Email *</label>
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Silahkan masukkan email anda *" required="required" data-error="Format no salah.">
                                    <SMALL> 
                                     Ketik email yang aktif karena notifikasi akan dikirim melalui email.
                                    </SMALL> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Pekerjaan</label>
                                    <input id="pekerjaan" type="text" name="pekerjaan" class="form-control" placeholder="Silahkan masukkan pekerjaan anda *" required="required" data-error="Format no salah.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Status perkawinan</label>
                                    <select required name="status" class="form-control" id="status">
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Whatsapp</label>
                                    <input id="wa" type="text" name="wa" class="form-control" placeholder="Silahkan masukkan nomor whatsapp anda *" required="required" data-error="Format no salah.">
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Jenis Surat</label>
                                     <input type="text" width="50%" name="jenis_surat" class="form-control" value="Surat Kelahiran" readonly required >  
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Nama Ayah</label>
                                    <input id="form_wa" type="text" name="nama_ayah" class="form-control" placeholder="Silahkan masukkan nama ayah anda *" required="required" data-error="Format no salah.">
                                </div>
                            </div>
                            
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Nama Ibu</label>
                                    <input id="form_wa" type="text" name="nama_ibu" class="form-control" placeholder="Silahkan masukkan nama ibu anda *" required="required" data-error="Format no salah.">
                                </div>
                            </div>
                            
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="form_wa">Anak ke</label>
                                    <input id="form_wa" type="text" name="anak_ke" class="form-control" placeholder="Silahkan masukkan anak keberapa dari saudara anda *" required="required" data-error="Format no salah.">
                                </div>
                            </div>
                            
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Surat Pengantar RT/RW*</label>
                                    <div class="custom-file">
                                        <input required name="surat_rt_rw" type="file" class="custom-file-input" id="surat_rt_rw">
                                        <label class="custom-file-label" for="surat_rt_rw">Choose file</label>
                                    </div>
                                    <SMALL> 
                                     Upload dalam file .png, .jpg, .pdf, .doc maksimal 3MB
                                    </SMALL> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>E-KTP kedua Orang Tua*</label>
                                    <div class="custom-file">
                                        <input required name="ktp_ortu" type="file" class="custom-file-input" id="ktp_ortu">
                                        <label class="custom-file-label" for="ktp">Choose file</label>
                                    </div>
                                    <SMALL> 
                                     Upload dalam file .png, .jpg, .pdf, .doc maksimal 3MB
                                    </SMALL> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Kartu Keluarga (KK)*</label>
                                    <div class="custom-file">
                                        <input required name="kk" type="file" class="custom-file-input" id="kk">
                                        <label class="custom-file-label" for="ktp">Choose file</label>
                                    </div>
                                    <SMALL> 
                                     Upload dalam file .png, .jpg, .pdf, .doc maksimal 3MB
                                    </SMALL> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Surat Nikah Orang Tua*</label>
                                    <div class="custom-file">
                                        <input required name="surat_nikah" type="file" class="custom-file-input" id="surat_nikah">
                                        <label class="custom-file-label" for="ktp">Choose file</label>
                                    </div>
                                    <SMALL> 
                                     Upload dalam file .png, .jpg, .pdf, .doc maksimal 3MB
                                    </SMALL> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Surat Keterangan Lahir dari RS*</label>
                                    <div class="custom-file">
                                        <input required name="surat_keterangan_rs" type="file" class="custom-file-input" id="surat_keterangan_rs">
                                        <label class="custom-file-label" for="kk">Choose file</label>
                                    </div>
                                    <SMALL> 
                                     Upload dalam file .png, .jpg, .pdf, .doc maksimal 3MB
                                    </SMALL> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="comment">Keterangan:</label>
                                    <textarea name="keterangan" class="form-control" rows="3" id="comment" placeholder="Isi jika ada keterangan"></textarea>
                                </div>
                            </div>
                           

                            <div class="col-md-6" >
                                <input type="submit" class="btn btn-success btn-send">
                            </div>
                            <div class="col-md-6">
                                <input type="button" class="btn btn-danger btn-send" value="Kembali" onclick="window.history.back()" />
                                </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong>*</strong> Harus diisi
                                    </p>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.10 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->
</section>
                               
                              
<script>
    $('#contact-form').hide()

    $(document).ready(function() {
        $('#form_cek_nik').on('submit', function(e){
            e.preventDefault();
            var nik = $('#nik_input').val()
            console.log(nik)
            if (nik) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('layananSurat/cek_nik') ?>",
                    dataType: "JSON",
                    data: {
                        nik: nik,
                    },
                    success: function(data) {
                        if (data != null) {
                            $('#nama').val(data.nama)
                            $('#nik').val(data.NIK)
                            $('#jk').val(data.jk)
                            $('#alamat').val(data.alamat)
                            $('#agama').val(data.agama)
                            $('#ttl').val(data.tempat_tgl_lahir)
                            if(data.email != null){
                               $('#email').val(data.email)
                            }
                            $('#pekerjaan').val(data.pekerjaan)
                            $('#status').val(data.status)
                            $('#wa').val(data.wa)
                            $('#contact-form').show()
                            $('#form_cek_nik').hide()
                            $('#judul_cek_nik').hide()

                        } else{
                            alert('data anda tidak ditemukan silakan menghubungi admin atau datang ke balai desa, terimakasih.')
                        }

                    }
                });
            }
        })
    });
</script>             
             

<script>
    $('#surat_rt_rw').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        text = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
        $(this).next('.custom-file-label').html(text);
    })
    $('#surat_nikah').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        text = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
        $(this).next('.custom-file-label').html(text);
    })
    $('#kk').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        text = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
        $(this).next('.custom-file-label').html(text);
    })
    $('#ktp_ortu').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        text = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
        $(this).next('.custom-file-label').html(text);
    })
    $('#kk').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        text = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
        $(this).next('.custom-file-label').html(text);
    })
    $('#surat_keterangan_rs').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        text = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
        $(this).next('.custom-file-label').html(text);
    })
</script>
    
