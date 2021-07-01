<div class="container-fluid">
  <div class="table-responsive">
    <div class="card mb-3">
      <div class="card-header">
        <i class=""></i>
        Surat Undangan
      </div>

      <form method='post' action=''>
        <div class="container-fluid"></br>
          <div class="row">

            <div class="col-lg-6">
              <div class="form-group">
                <label>Jenis Surat : </label>
                <input type="text" width="50%" name="jenis_surat" class="form-control" value="Surat Undangan" readonly required/>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" value="<?= $no_surat ?>" readonly required />
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Kepada :</label>
                <input type="text" id="kepada" name="kepada" required class="form-control"/>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Tanggal :</label>
                <input type="date" id="tanggal_surat" name="tanggal_surat" required class="form-control"/>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label>Kontent Surat :</label>
				<small id="emailHelp" class="form-text text-muted">Silakan ganti titik(........) sesuai dengan kebutuhan anda.</small>
                <textarea rows="30" name="kontent" id="textarea" class="form-control">	
					<table width="593">
						<tr>
							<td style="padding-bottom: 20px;" colspan="2">                    
								<table width="55%">
									<tr>
										<td width="15%">No</td>
										<td width="2%"> : </td>
										<td width="40%"><?= $no_surat ?></td>
									</tr>
									<tr>
										<td>Perihal</td>
										<td>:</td>
										<td>........</td>
									</tr>                        
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Kepada <br>
								Yth ........ <br>
								di Tempat <br>
							</td>
						</tr>
						<tr>
							<td align="left" colspan="2">
								<b><i> Assalamu’alaikum Wr. Wb </i></b> <br> <br>
								<p align="justify"> Segala  Puja  Puji  hanya  milik  Allah  yang  memberi  Rahmat  dan  Taufiknya  kepada  kita. Sholawat  serta  salam  kita  sampaikan  kepada  Baginda  Nabi  Besar  Muhammad  SAW, beserta  sahabatnya,  semoga  kita  selalu  dalam  lindungan  Allah  SWT,  Amin.  Bersama  ini kami mengundang ........ dalam acara ........ Tingkat desa yang InsyaAllah akan dilaksanakan pada: </p>

							</td>
						</tr>
						<tr>
							<td align="left" colspan="2">
								<table style="margin-left: 80px;" width="55%">
									<tr>
										<td width="25%">Tanggal</td>
										<td width="2%"> : </td>
										<td width="40%">........</td>
									</tr>
									<tr>
										<td>Pukul</td>
										<td>:</td>
										<td>........</td>
									</tr>
									<tr>
										<td>Tempat</td>
										<td>:</td>
										<td>........</td>
									</tr>
								</table>
							</td>
						</tr>            
						<tr>
							<td align="left" colspan="2">
								Demikianlah surat tugas ini dibuat untuk dapat dipergunakan sebagaimana mestinya.  Atas kerja samanya diucapkan terima kasih.
								<br>
								<br>
								<b><i> Wassalamu’alaikum Wr. Wb</i></b>
							</td>
						</tr>			
					</table>													
                  </textarea>
              </div>
            </div>


          </div>

          </br>

          <select name="ttd" class="form-control" required>
            <option value="">---Pilih TTD---</option>
            <option value="Ahmad Husin%Camat">Camat</option>
            <option value="Suyatno%Sekretaris Camat">Sekretaris Camat</option>
          </select></br>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Buat</button>

        </div>
      </form>
    </div>
  </div>
</div>
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
		console.log(tgl_surat)
        var arr_tgl = tgl_surat.split("-")              
        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];                                 
        var no_surat = `<?= $no_surat ?>`
		var kepada =$('#kepada').val();
		var html = `            
			<table width="593">
				<tr>
					<td style="padding-bottom: 20px;" colspan="2">                    
						<table width="55%">
							<tr>
								<td width="15%">No</td>
								<td width="2%"> : </td>
								<td width="40%">${no_surat}</td>
							</tr>
							<tr>
								<td>Perihal</td>
								<td>:</td>
								<td>........</td>
							</tr>                        
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						Kepada <br>
						Yth ${kepada} <br>
						di Tempat <br>
					</td>
				</tr>
				<tr>
					<td align="left" colspan="2">
						<b><i> Assalamu’alaikum Wr. Wb </i></b> <br> <br>
						<p align="justify"> Segala  Puja  Puji  hanya  milik  Allah  yang  memberi  Rahmat  dan  Taufiknya  kepada  kita. Sholawat  serta  salam  kita  sampaikan  kepada  Baginda  Nabi  Besar  Muhammad  SAW, beserta  sahabatnya,  semoga  kita  selalu  dalam  lindungan  Allah  SWT,  Amin.  Bersama  ini kami mengundang ........ dalam acara ........ Tingkat desa yang InsyaAllah akan dilaksanakan pada: </p>

					</td>
				</tr>
				<tr>
					<td align="left" colspan="2">
						<table style="margin-left: 80px;" width="55%">
							<tr>
								<td width="25%">Tanggal</td>
								<td width="2%"> : </td>
								<td width="40%">${arr_tgl[2]}, ${bulan[parseInt(arr_tgl[1])]} ${arr_tgl[0]}</td>
							</tr>
							<tr>
								<td>Pukul</td>
								<td>:</td>
								<td>........</td>
							</tr>
							<tr>
								<td>Tempat</td>
								<td>:</td>
								<td>........</td>
							</tr>
						</table>
					</td>
				</tr>            
				<tr>
					<td align="left" colspan="2">
						Demikianlah surat tugas ini dibuat untuk dapat dipergunakan sebagaimana mestinya.  Atas kerja samanya diucapkan terima kasih.
						<br>
						<br>
						<b><i> Wassalamu’alaikum Wr. Wb</i></b>
					</td>
				</tr>			
			</table>
                `
        tinymce.activeEditor.setContent(html);
        })    
</script>