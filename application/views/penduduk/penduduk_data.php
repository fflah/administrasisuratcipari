<style>
td.details-control {
    background: url('assets/icon/plus-square-solid.png') no-repeat center center;
    cursor: pointer;
    margin: 3px;
    padding: 5px;
    fill: Dodgerblue;
}

tr.shown td.details-control {
    background: url('assets/icon/minus-square-solid.png') no-repeat center center;
}
</style>

<body id="page-top">
    <div class="container-fluid">
       <div class="row">
            <div class="col">
                <h1 class="judul h3 text-gray-800">Daftar <?= $title ?></h1>
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                       <a href="<?= base_url('penduduk/add'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
                </div>
      
      <div class="card-body">
      <div class="table-responsive">
        <table id="datatable-penduduk" class="table table-striped display nowrap" style="width: 100%;" id="table1">
          <thead>
              <tr>
                    <th></th>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Action</th>
              </tr>
          </thead>
          <tbody>             
          </tbody>
        </table>
</div>
</div>



<script>
$(document).ready(function() {

    function format(d){
        result =  '<table cellpadding="5" cellspacing="0"  class="table table-striped "'+
            '<tr>'+
                '<td> Tempat, tanggal lahir</td>'+
                '<td>'+d.tempat_tgl_lahir+'</td>'+
            '<tr>'+
            '<tr>'+
                '<td> Agama</td>'+
                '<td>'+d.agama+'</td>'+
            '<tr>'+                                  
            '<tr>'+
                '<td> Alamat</td>'+
                '<td>'+d.alamat+'</td>'+
            '<tr>'+            
            '<table>';
        return result
    
    }
    
    var table =  $('#datatable-penduduk').DataTable( {
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        "ajax": {
            "url": "<?php echo site_url('/Penduduk/user_datatabel')?>",
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
            { "data": "status" },
            { "data": "jk" },
            { "data": "pekerjaan" },
            { "data": "aksi" },
        ]
    });

    //detail data
    $('#datatable-penduduk tbody').on('click', 'td.details-control', function(){
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
 function konfirmasi(){
        return confirm('Apakah Anda yakin?')
    }

</script>

