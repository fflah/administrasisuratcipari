<style>
td.details-control {
    background: url('../assets/icon/plus-square-solid.png') no-repeat center center;
    cursor: pointer;
    margin: 3px;
    padding: 5px;
    fill: Dodgerblue;
}

tr.shown td.details-control {
    background: url('../assets/icon/minus-square-solid.png') no-repeat center center;
}
</style>

<body id="page-top">
    <div class="container-fluid">
       <div class="row">
            <div class="col">
                <h1 class="judul h3 text-gray-800">Daftar <?= $title ?></h1>
                <div class="card shadow mb-4">
            
      
      <div class="card-body">
      <div class="table-responsive">
        <table id="datatable-permintaan-surat" class="table table-striped display nowrap" style="width: 100%;" id="table1">
          <thead>
              <tr>
                    <th></th>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Surat</th>
                    <th>Status Surat</th>
                    <th>Action</th>
              </tr>
          </thead>
          <tbody>             
          </tbody>
        </table>
</div>
</>

<!-- Modal -->
<div class="modal fade" id="prosesData" tabindex="-1" aria-labelledby="prosesDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="prosesDataLabel">Proses surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="proses_surat_form">
            <input type="hidden" name="id" class="form-control" id="id_proses" aria-describedby="emailHelp">
            <input type="hidden" name="jenis_surat" class="form-control" id="jenis_surat" aria-describedby="emailHelp">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input readonly id="nama" type="text" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input readonly id="nik" type="text" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Proses surat</label>
                <select class="form-control" id="proses_surat_val">
                    <option selected disabled>Choose...</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>

            <div id="comp_alasan_rejected" class="form-group">
                <label for="exampleInputEmail1">Alasan</label>
                <textarea placeholder="alasan permintaan surat direject" id="alasan" type="text" class="form-control" aria-describedby="emailHelp"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->


<script>
$(document).ready(function() {

    function format(d){
        var result = null
        var no_surat_new = '-'
        if (d.no_surat != null ) {
            no_surat_new = d.no_surat
        }

        if(d.jenis_surat == 'Surat Kelahiran'){
            result =  '<table cellpadding="5" cellspacing="0"  class="table table-striped "'+
            '<tr>'+
                '<td> Keterangan</td>'+
                '<td>'+d.keterangan+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Alamat</td>'+
                '<td>'+d.alamat+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> No Surat</td>'+
                '<td>'+no_surat_new +'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Surat Pengantar RT/RW</td>'+
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.surat_rt_rw+'>'+d.surat_rt_rw+'</a></td>'+
            '<tr>'+            
            '<tr>'+
                '<td> E-KTP kedua Orang Tua</td>'+
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.ktp_ortu+'>'+d.ktp_ortu+'</a></td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Kartu Keluarga (KK)</td>'+
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.ktp_ortu+'>'+d.ktp_ortu+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> Surat Nikah Orang Tua</td>'+
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.surat_nikah+'>'+d.surat_nikah+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> Surat Keterangan Lahir dari RS</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.surat_keterangan_rs+'>'+d.surat_keterangan_rs+'</a></td>'+                
            '<tr>'+            
            '<table>';
        }else if(d.jenis_surat == 'Surat Kematian'){
            result =  '<table cellpadding="5" cellspacing="0"  class="table table-striped "'+
            '<tr>'+
                '<td> Keterangan</td>'+
                '<td>'+d.keterangan+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Alamat</td>'+
                '<td>'+d.alamat+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> No Surat</td>'+
                '<td>'+no_surat_new +'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Surat Pengantar RT/RW</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.surat_rt_rw+'>'+d.surat_rt_rw+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> E-KTP</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.ktp+'>'+d.ktp+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> Kartu Keluarga (KK)</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.kk+'>'+d.kk+'</a></td>'+                

            '<tr>'+            
            '<tr>'+
                '<td> Surat Nikah</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.surat_nikah+'>'+d.surat_nikah+'</a></td>'+                
            '<tr>'+                                  
            '<table>';
        }else if(d.jenis_surat == 'Surat Nikah'){
            result =  '<table cellpadding="5" cellspacing="0"  class="table table-striped "'+
            '<tr>'+
                '<td> Keterangan</td>'+
                '<td>'+d.keterangan+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Alamat</td>'+
                '<td>'+d.alamat+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> No Surat</td>'+
                '<td>'+no_surat_new +'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Surat Pengantar RT/RW</td>'+
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.surat_rt_rw+'>'+d.surat_rt_rw+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> Akta Kelahiran</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.akta_kelahiran+'>'+d.akta_kelahiran+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> Ijazah Terakhir</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.ijazah+'>'+d.ijazah+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> KTP</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.ktp+'>'+d.ktp+'</a></td>'+                

            '<tr>'+            
            '<tr>'+
                '<td> Kartu Keluarga (KK)</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.kk+'>'+d.kk+'</a></td>'+                

            '<tr>'+            
            '<tr>'+
                '<td> KTP Orang Tua</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.ktp_ortu+'>'+d.ktp_ortu+'</a></td>'+                

            '<tr>'+            
            '<table>';
        }else if(d.jenis_surat == 'Surat Pindah Daerah'){
            result =  '<table cellpadding="5" cellspacing="0"  class="table table-striped "'+
            '<tr>'+
                '<td> Keterangan</td>'+
                '<td>'+d.keterangan+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Alamat</td>'+
                '<td>'+d.alamat+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> No Surat</td>'+
                '<td>'+no_surat_new +'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Surat Pengantar RT/RW</td>'+
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.surat_rt_rw+'>'+d.surat_rt_rw+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> E-KTP </td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.ktp+'>'+d.ktp+'</a></td>'+                

            '<tr>'+            
            '<tr>'+
                '<td> Kartu Keluarga (KK)</td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.kk+'>'+d.kk+'</a></td>'+                

            '<tr>'+            
            '<table>';
        }else if(d.jenis_surat == 'Surat Keterangan Usaha'){
            result =  '<table cellpadding="5" cellspacing="0"  class="table table-striped "'+
            '<tr>'+
                '<td> Keterangan</td>'+
                '<td>'+d.keterangan+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Alamat</td>'+
                '<td>'+d.alamat+'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> No Surat</td>'+
                '<td>'+no_surat_new +'</td>'+
            '<tr>'+            
            '<tr>'+
                '<td> Surat Pengantar RT/RW</td>'+
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.surat_rt_rw+'>'+d.surat_rt_rw+'</a></td>'+                
            '<tr>'+            
            '<tr>'+
                '<td> E-KTP </td>'+                
                '<td><a target="_blank" href=<?= base_url('./media/surat/')?>'+d.ktp+'>'+d.ktp+'</a></td>'+                

            '<tr>'+            
            '<table>';
        }
        
        return result
    
    }
    
    var table =  $('#datatable-permintaan-surat').DataTable( {
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        "ajax": {
            "url": "<?php echo site_url('/suratPengantar/permintaan_surat_datatabel')?>",
            "type": "POST"
        },
        "columns": [
            {
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent":''
            },
            { "data": "no" },
            { "data": "NIK" },
            { "data": "nama" },
            { "data": "email" },
            { "data": "jenis_surat" },
            { "data": "proses_surat" },
            { "data": "aksi" },
        ]
    });

    //detail data
    $('#datatable-permintaan-surat tbody').on('click', 'td.details-control', function(){
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var col = tr.find('td:eq(6)').text();
        
        if (row.child.isShown()){
            row.child.hide();
            tr.removeClass('shown');
        }else{
            row.child(format(row.data()) ).show();
            tr.addClass('shown');

        } 

    
});


   
});
</script>

<script>
$(document).ready(function(){
    $('#comp_alasan_rejected').hide();
    $("#proses_surat_val").change(function(){
        var selectedReject = $(this).children("option:selected").val();
        console.log(selectedReject)
        if (selectedReject == 'Rejected') {
            $('#comp_alasan_rejected').show();
            
        }else{
            $('#comp_alasan_rejected').hide();
        }

    });

});
</script>

<script>
 function konfirmasi(){
        return confirm('Apakah Anda yakin?')
    }

</script>

<script>
function proses_button(id, jenis_surat, nama, nik, proses_surat) {
    if (proses_surat == 'Finish' || proses_surat == 'Accepted') {
        $('#id_proses').val(id)
        $('#jenis_surat').val(jenis_surat)
        $('#nama').val(nama)
        $('#nik').val(nik)
        $('#proses_surat_val').find('option')
        .remove()
        .end()
        .append(`<option value="" selected disabled>${proses_surat}</option>`)
        .val("");
        $('#prosesData').modal('show')
    }else if(proses_surat == ''){
        $('#id_proses').val(id)
        $('#jenis_surat').val(jenis_surat)
        $('#nama').val(nama)
        $('#nik').val(nik)
        $('#proses_surat_val').find('option')
        .remove()
        .end()
        .append(` <option selected disabled>Choose...</option>`)
        .append(`<option value="Accepted">Accepted</option>`)
        .append(`<option value="Rejected">Rejected</option>`)
        $('#prosesData').modal('show')
        
    }else{

    }


}

$('#proses_surat_form').on("submit", function(e){
    e.preventDefault(); 
    console.log(1)
    var id = $('#id_proses').val();    
    var jenis_surat = $('#jenis_surat').val(); 
    var jenis_surat = $('#jenis_surat').val(); 
    var proses_surat = $('#proses_surat_val').val(); 
    var alasan = $('#alasan').val(); 
    
    console.log(proses_surat)
    if (id && jenis_surat) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('/suratPengantar/proses_permintaan_surat')?>",
            data: {                    
                'id' : id,
                'jenis_surat' : jenis_surat,  
                'proses_surat' : proses_surat,  
                'alasan' : alasan  
            },                
            dataType: 'JSON',
            success: function(data){     
                $('#proses_surat_val').val("Choose..."); 
                $('#prosesData').modal('hide');  
                $('#datatable-permintaan-surat').DataTable().ajax.reload()
                // location.reload()
                $('.alert').addClass( "alert-success" );
                $('.alert').append( '<span id="text-alert"><i class="fa fa-check"></i> <strong>Success!</strong> Data berhasil ditambahkan !!</span>' );
                $('.alert').slideDown("slow").show();
                            
                setTimeout(function(){    
                    $('.alert').slideUp(700, function(){ $(this).hide() });
                    $('#text-alert').remove()
                }, 3000);
                
            }
        });
    }
});

</script>

