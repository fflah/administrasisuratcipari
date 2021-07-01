<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Modal Dialog berhasil login-->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Login</strong> berhasil, selamat datang <strong><?= ucfirst($this->fungsi->user_login()->username) ?></strong>.
  </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div style="cursor:pointer" title="klik untuk detail data" onclick="data_surat_masuk()" class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Data Surat Masuk</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $masuk ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-paper-plane"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div style="cursor:pointer" title="klik untuk detail data" onclick="data_surat_keluar()" class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Data Surat Keluar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $keluar ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-paper-plane"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>

  <div class="row">
  	<div id="data_surat_masuk" class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>            
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
			<div class="table-responsive">
				<table id="datatable-surat-masuk" class="table table-striped display nowrap table-sm" style="width: 100%;" id="table1" align="center">
					<thead>
						<tr align="center"  class="bg-primary" style = "color: white;"> 
						<th></th>
						<th>No</th>
						<th>No. Surat</th>
						<th>Pengirim</th>
						<th>Keterangan</th>
						<th>Action</th>
						</tr>
					</thead>
					<tbody align="center">
					</tbody>
				</table>
			</div>
        </div>
      </div>
    </div>


    <div id="data_surat_keluar" class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Surat Keluar</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>            
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
			<div class="table-responsive">
				<table id="datatable-surat-keluar" class="table table-striped display nowrap table-sm" style="width: 100%;" id="table1" align="center">
					<thead>
						<tr align="center" class="bg-primary" style = "color: white;">
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
					<tbody>
					</tbody>
				</table>
			</div>
        </div>
      </div>
    </div>

    
   

</div>

</div>

</div>
<!-- End of Main Content -->


<!-- Modal detail data -->

<div class="modal fade" id="detailData" tabindex="-1" role="dialog" aria-labelledby="detailDataLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="detailData">Detail data </h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<form id="deleteSurat" action="">
			<div class="modal-body">
				<span id="tabel_detail_data">
					
				</span>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</form>
		</div>
	</div>
</div>

<!-- End modal detail data -->

<script>
	$(document).ready(function() {

    $('#data_surat_keluar').hide()
    $('#data_surat_masuk').hide()

		var table = $('#datatable-surat-keluar').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": "<?php echo site_url('/dashboard/permintaan_surat_datatabel') ?>",
			"type": "POST"
		},
		"columns": [{
			"className": 'details-control',
			"orderable": false,
			"data": null,
			"defaultContent": ''
			},
			{"data": "no"},
			{"data": "no_surat"},
			{"data": "jenis_surat"},
			{"data": "tanggal"},
			{"data": "NIK",
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
			{"data": "aksi",
			"render": function(data) {
				var jenis_surat = data.jenis_surat.replace(/ /g, "_")
				return `
				<a onclick="detailSurat(${data.id},'${data.jenis_surat}')" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">detail data</span>
                  </a>
					
				`
			}
			},
		]
		});

		var table_masuk = $('#datatable-surat-masuk').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": "<?php echo site_url('/dashboard/get_surat_masuk') ?>",
			"type": "POST"
		},
		"columns": [{
			"className": 'details-control',
			"orderable": false,
			"data": null,
			"defaultContent": ''
			},
			{"data": "no"},
			{"data": "no_surat"},
			{"data": "pengirim"},
			{"data": "keterangan",
        "render": function (data) {
          if (data != '') {
            return data
          }else{
            return '-'
          }
        }
      },
			{"data": "aksi",
			"render": function(data) {
				return `
				<a onclick="detailSuratMasuk(${data.no})" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">detail data</span>
                  </a>
					
				`
			}
			},
		]
		});

		
	});
	</script>

  <script>
  function detailSuratMasuk(id) {
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('Dashboard/detail_surat_masuk') ?>",
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
        console.log(data.data_surat.no)
        $('#detailData').modal('show');
        var html = `
				<table cellpadding="2" cellspacing="4" style="font-size: 15px;" > 
						<tr>
							<td width="150px">No Surat </td>
							<td>:</td>
							<td>${data.data_surat.no_surat}</td>
						</tr>
						<tr>
							<td>Pengirim</td>
							<td>:</td>
							<td>${data.data_surat.pengirim}</td>
						</tr>
						<tr>
							<td>Tanggal Surat</td>
							<td>:</td>
							<td>${data.data_surat.tgl_surat}</td>
						</tr>
						<tr>
							<td>Tanggal Terima</td>
							<td>:</td>
							<td>${data.data_surat.tgl_terima}</td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td>${data.data_surat.keterangan ? data.data_surat.keterangan : '-'}</td>
						</tr>
						<tr>
							<td>File Surat</td>
							<td>:</td>
							<td><a href="<?=base_url('suratmasuk/download/')?>${data.data_surat.no}">${data.data_surat.file_surat}</a></td>
						</tr>
					</table>
				`

        $('#tabel_detail_data').html(html);

      }
    })
  }
  </script>

	<script>
	function detailSurat(id, jenis_surat) {
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('Dashboard/detail_surat') ?>",
			dataType: "JSON",
			data: {
				id: id,
				jenis_surat: jenis_surat
			},
			success: function(data) {
				$('#detailData').modal('show');
        jenis_surat = data.data_surat.jenis_surat;
		console.log(data.data_surat)
        var html = `
				<table cellpadding="2" cellspacing="4" style="font-size: 15px;">
						<tr>
							<td width="150px">Nama </td>
							<td>:</td>
							<td>${data.data_surat.nama}</td>
						</tr>
						<tr>
							<td>Tempat, tanggal lahir</td>
							<td>:</td>
							<td>${data.data_surat.tempat_tgl_lahir}</td>
						</tr>
						<tr>
							<td>Status perkawinan</td>
							<td>:</td>
							<td>${data.data_surat.status}</td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td>${data.data_surat.agama}</td>
						</tr>
						<tr>
							<td>No Surat</td>
							<td>:</td>
							<td>${data.data_surat.no_surat}</td>
						</tr>
						<tr>
							<td>Tanggal Surat</td>
							<td>:</td>
							<td>${data.data_surat.tanggal}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>${data.data_surat.alamat}</td>
						</tr>
					</table>
				`

				if (jenis_surat == 'Surat Keterangan Usaha') {
					var html = `
							<table cellpadding="2" cellspacing="4" style="font-size: 15px;">
									<tr>
										<td width="150px">Nama </td>
										<td>:</td>
										<td>${data.data_surat.nama}</td>
									</tr>
									<tr>
										<td>Tempat, tanggal lahir</td>
										<td>:</td>
										<td>${data.data_surat.tempat_tgl_lahir}</td>
									</tr>
									<tr>
										<td>Status perkawinan</td>
										<td>:</td>
										<td>${data.data_surat.status}</td>
									</tr>
									<tr>
										<td>Agama</td>
										<td>:</td>
										<td>${data.data_surat.agama}</td>
									</tr>
									<tr>
										<td>No Surat</td>
										<td>:</td>
										<td>${data.data_surat.no_surat}</td>
									</tr>
									<tr>
										<td>Tanggal Surat</td>
										<td>:</td>
										<td>${data.data_surat.tanggal}</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td>${data.data_surat.alamat}</td>
									</tr>
									<tr>
										<td>Nama Usaha</td>
										<td>:</td>
										<td>${data.data_surat.nama_usaha}</td>
									</tr>										
								</table>
							`
					
				}else if(jenis_surat == 'Surat Pindah Daerah'){
					var html = `
							<table cellpadding="2" cellspacing="4" style="font-size: 15px;">
									<tr>
										<td width="150px">Nama </td>
										<td>:</td>
										<td>${data.data_surat.nama}</td>
									</tr>
									<tr>
										<td>Tempat, tanggal lahir</td>
										<td>:</td>
										<td>${data.data_surat.tempat_tgl_lahir}</td>
									</tr>
									<tr>
										<td>Status perkawinan</td>
										<td>:</td>
										<td>${data.data_surat.status}</td>
									</tr>
									<tr>
										<td>Agama</td>
										<td>:</td>
										<td>${data.data_surat.agama}</td>
									</tr>
									<tr>
										<td>No Surat</td>
										<td>:</td>
										<td>${data.data_surat.no_surat}</td>
									</tr>
									<tr>
										<td>Tanggal Surat</td>
										<td>:</td>
										<td>${data.data_surat.tanggal}</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td>${data.data_surat.alamat}</td>
									</tr>
									<tr>
										<td>Alamat Pindah</td>
										<td>:</td>
										<td>${data.data_surat.alamat_pindah}</td>
									</tr>
									<tr>
										<td>Alasan Pindah</td>
										<td>:</td>
										<td>${data.data_surat.alasan_pindah}</td>
									</tr>
									<tr>
										<td>Pengikut</td>
										<td>:</td>
										<td>${data.data_surat.pengikut}</td>
									</tr>
								</table>
							`
					
				}else if(jenis_surat == 'Surat Kelahiran'){
					var html = `
							<table cellpadding="2" cellspacing="4" style="font-size: 15px;">
									<tr>
										<td width="150px">Nama </td>
										<td>:</td>
										<td>${data.data_surat.nama}</td>
									</tr>
									<tr>
										<td>Tempat, tanggal lahir</td>
										<td>:</td>
										<td>${data.data_surat.tempat_tgl_lahir}</td>
									</tr>
									<tr>
										<td>Status perkawinan</td>
										<td>:</td>
										<td>${data.data_surat.status}</td>
									</tr>
									<tr>
										<td>Agama</td>
										<td>:</td>
										<td>${data.data_surat.agama}</td>
									</tr>
									<tr>
										<td>No Surat</td>
										<td>:</td>
										<td>${data.data_surat.no_surat}</td>
									</tr>
									<tr>
										<td>Tanggal Surat</td>
										<td>:</td>
										<td>${data.data_surat.tanggal}</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td>${data.data_surat.alamat}</td>
									</tr>
									<tr>
										<td>Nama Ayah</td>
										<td>:</td>
										<td>${data.data_surat.nama_ayah}</td>
									</tr>
									<tr>
										<td>Nama Ibu</td>
										<td>:</td>
										<td>${data.data_surat.nama_ibu}</td>
									</tr>
									<tr>
										<td>Anak Ke </td>
										<td>:</td>
										<td>${data.data_surat.anak_ke}</td>
									</tr>
								</table>
							`
					
				}else if(jenis_surat == 'Surat Kematian'){
					var html = `
							<table cellpadding="2" cellspacing="4" style="font-size: 15px;">
									<tr>
										<td width="150px">Nama </td>
										<td>:</td>
										<td>${data.data_surat.nama}</td>
									</tr>
									<tr>
										<td>Tempat, tanggal lahir</td>
										<td>:</td>
										<td>${data.data_surat.tempat_tgl_lahir}</td>
									</tr>
									<tr>
										<td>Status perkawinan</td>
										<td>:</td>
										<td>${data.data_surat.status}</td>
									</tr>
									<tr>
										<td>Agama</td>
										<td>:</td>
										<td>${data.data_surat.agama}</td>
									</tr>
									<tr>
										<td>No Surat</td>
										<td>:</td>
										<td>${data.data_surat.no_surat}</td>
									</tr>
									<tr>
										<td>Tanggal Surat</td>
										<td>:</td>
										<td>${data.data_surat.tanggal}</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td>${data.data_surat.alamat}</td>
									</tr>
									<tr>
										<td>Hari Meninggal</td>
										<td>:</td>
										<td>${data.data_surat.hari_meninggal}</td>
									</tr>
									<tr>
										<td>Jam Meninggal</td>
										<td>:</td>
										<td>${data.data_surat.jam_meninggal}</td>
									</tr>									
								</table>
							`
				}else if(jenis_surat == 'Surat Tugas'){
					var html = `
							<table cellpadding="2" cellspacing="4" style="font-size: 15px;">
								<tr>
									<td width="150px">Nama </td>
									<td>:</td>
									<td>${data.data_surat.nama}</td>
								</tr>
								<tr>
									<td width="150px">NIK </td>
									<td>:</td>
									<td>${data.data_surat.nik}</td>
								</tr>
								<tr>
									<td width="150px">Jabatan </td>
									<td>:</td>
									<td>${data.data_surat.jabatan}</td>
								</tr>
								<tr>
									<td width="150px">Devisi </td>
									<td>:</td>
									<td>${data.data_surat.divisi}</td>
								</tr>
								<tr>
									<td width="150px">Jenis Surat</td>
									<td>:</td>
									<td>${data.data_surat.jenis_surat}</td>
								</tr>
								<tr>
									<td>No Surat</td>
									<td>:</td>
									<td>${data.data_surat.no_surat}</td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>:</td>
									<td>${data.data_surat.tanggal}</td>
								</tr>
																	
								</table>
							`
				}else if(jenis_surat == 'Surat Undangan'){
					var html = `
							<table cellpadding="2" cellspacing="4" style="font-size: 15px;">
								<tr>
									<td width="150px">Jenis Surat </td>
									<td>:</td>
									<td>${data.data_surat.jenis_surat}</td>
								</tr>
								<tr>
									<td>No Surat</td>
									<td>:</td>
									<td>${data.data_surat.no_surat}</td>
								</tr>
								<tr>
									<td>Tanggal Surat</td>
									<td>:</td>
									<td>${data.data_surat.tanggal}</td>
								</tr>
																	
							</table>
							`
					
				}
				$('#tabel_detail_data').html(html);
			}
		});
	}
	</script>





<script>
  function data_surat_keluar() {
    $('#card_surat_masuk').hide()
    $('#card_surat_keluar').hide()
    $('#data_surat_masuk').hide()
    $('#data_surat_keluar').show()

  }
</script>
<script>
  function data_surat_masuk() {
    $('#card_surat_masuk').hide()
    $('#card_surat_keluar').hide()
    $('#data_surat_keluar').hide()
    $('#data_surat_masuk').show()
  }
</script>
