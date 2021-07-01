<body id="page-top">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
              Filter Data Laporan Masuk
            </div>
            <div class="card-body">
            <form method="POST" class="form-inline" action="<?php echo base_url('laporanmasuk/print') ?>">
                <div class="form-group mb-2">
                  <label for="staticEmail2">Bulan:</label>
                  <select id="bulan" class="form-control ml-3" required name="bulan">
                       <option value="">--Pilih Bulan--</option> 
                       <option value="01">Januari</option> 
                       <option value="02">Februari</option>
                       <option value="03">Maret</option>
                       <option value="04">April</option>
                       <option value="05">Mei</option>
                       <option value="06">Juni</option>
                       <option value="07">Juli</option>
                       <option value="08">Agustus</option>
                       <option value="09">September</option>
                       <option value="10">Oktober</option>
                       <option value="11">November</option>     
                       <option value="12">Desember</option>      
                  </select>
                 
                </div>

                <div class="form-group mb-2 ml-5">
                  <label for="staticEmail2">Tahun:</label>
                  <select id="tahun" class="form-control ml-3" required name="tahun">
                       <option value="">--Pilih Tahun--</option> 
                       <?php $tahun = date('Y');
                           for($i=2020;$i<$tahun+5;$i++){ ?>
                               <option value="<?php echo $i ?>"> <?php echo $i ?></option>
                           <?php }  ?>
                  </select>
                 
                </div>
                <button id="tampil_data" type="button" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>Tampilkan Data</button>
                <button href="submit" class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i>Cetak Laporan</button>
            </form>
            <table id="datatable_surat_keluar" class="table table-striped display nowrap table-sm" style="width: 100%;" id="table1" align="center">
                <thead>
                    <tr>                            
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tanggal</th>						
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody id="records_table">                        
                </tbody>
            </table>
                      
          </div>
       </div>

</div>
</div>

<script>
$(document).ready(function() {
    $('#datatable_surat_keluar').hide();
    $('#tampil_data').on('click', function () {
        $('#records_table').html('');
        var bulan = $('#bulan').val()
        var tahun = $('#tahun').val()        

        $.ajax({
			type: "POST",
			url: "<?php echo site_url('LaporanMasuk/data_surat_masuk') ?>",
			dataType: "JSON",
			data: {
				bulan: bulan,
				tahun: tahun
			},
			success: function(data) {                
                var trHTML = '';
                $.each(data, function (i, item) {
                    console.log('no_surat')
                    trHTML += `
                        <tr>
                            <td>${item.no}</td>
                            <td>${item.no_surat}</td>
                            <td>${item.tanggal}</td>
                            <td>${(item.keterangan !='') ? item.keterangan : '-'}</td>
                        </tr>
                    `                    
                });
                $('#records_table').append(trHTML);
                $('#datatable_surat_keluar').show();
            }
        });
    })
});
    
</script>
