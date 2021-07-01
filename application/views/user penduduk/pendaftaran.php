  <section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/kelurahan.png" alt="">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">

                <h1  align="center"><p>Pelayanan Surat Online</p>
                    <a href="https://Semarapurakaja.desa.id">Desa Kalongan</a>
                </h1>

                <p class="lead">Silahkan lengkapi semua isian sesuai dengan data yang diperlukan</p>


                <form id="contact-form" method="post" action="<?= base_url('suratPengantar/add') ?>" role="form">

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Nama *</label>
                                    <input id="form_name" type="text" name="nama" class="form-control" placeholder="Silahkan masukkan nama anda *" required="required" data-error="Nama harus diisi!.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">NIK *</label>
                                    <input id="form_lastname" type="text" name="NIK" class="form-control" placeholder="Silahkan masukkan NIK anda *" required="required" data-error="NIK Harus diisi!.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_alamat">Alamat *</label>
                                    <input id="form_alamat" type="text" name="alamat" class="form-control" placeholder="Silahkan masukkan alamat anda *" required="required" data-error="Format alamat salah.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_wa">No Whatsapp *</label>
                                    <input id="form_wa" type="text" name="whatsapp" class="form-control" placeholder="Silahkan masukkan no whatsapp anda *" required="required" data-error="Format no salah.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need">Pilih Jenis Surat *</label>
                                    <select id="form_need" name="keperluan" class="form-control" required="required" data-error="Pilih jenis surat yang anda perlukan">
                                        <option value=""></option>
                                        <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                        <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                        <option value="Surat Keterangan Miskin">Surat Keterangan Miskin</option>
                                        <option value="Surat Keterangan Belum Pernah Menikah">Surat Keterangan Belum Pernah Menikah</option>
                                        <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                                        <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                        <option value="Surat Keterangan Beda Nama">Surat Keterangan Beda Nama</option>
                                        <option value="Surat Keterangan Penghasilan">Surat Keterangan Penghasilan</option>
                                        <option value="Surat Keterangan Harga Tanah">Surat Keterangan Harga Tanah</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Pesan *</label>
                                    <textarea id="form_message" name="keterangan" class="form-control" placeholder="Silahkan isi keperluan atau keterangan lainnya disini *" rows="4" required="required" data-error="Silahkan isi pesan atau keterangan anda."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success btn-send"><a href=<?= base_url('suratPengantar/add') ?>> 
                                </a>
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
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->
</section>
