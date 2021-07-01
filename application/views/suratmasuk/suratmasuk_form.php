<body id="page-top">
    <div class="container-fluid">
      <div class="box">
       <div class="box-header">
        <h1 class="h4 mb-0 text-gray-800">Tambah Data</h1>
          <div align="right">
              <a href="<?=site_url('suratmasuk')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back </a>
          </div>
     </div>
      <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">    
        </div>
                <form action="<?= base_url('suratmasuk/proses2'); ?>" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                   <label>No. Surat</label>
                   <input type="hidden" name="no" value="<?=$row->no?>"> 
                   <input type="text" name="no_surat" value="<?= $row->no_surat?>" class="form-control" required>  
                 </div>

                 <div class="form-group">
                   <label>Pengirim</label>
                   <input type="text" name="pengirim" value="<?= $row->pengirim?>" class="form-control" required>  
                 </div>

                <div class="form-group">
                   <label>Tanggal Surat</label>
                   <input type="date" name="tgl_surat" value="<?= $row->tgl_surat?>" class="form-control" required>  
                 </div>

             

                 <div class="form-group">
                   <label>Tanggal Terima</label>
                   <input type="date" name="tgl_terima" value="<?= $row->tgl_terima?>" class="form-control" required> 
                   
                 </div>

                 <div class="form-group">
                   <label>Keterangan</label>
                   <textarea name="keterangan" class="form-control"><?php echo $row->keterangan;?></textarea> 
                 </div>
               
                 <div class="form-group">
                   <label>File Surat</label>
                   <input type="file" name="file_surat" class="form-control"><?php echo $row->file_surat;?> 
                    <small class="text-sm text-info">Format file yang diizinkan .jpg, .png, .pdf, .doc dan ukuran maks 1 MB!</small>  
                 </div>
                 <div class="form-group">
                    <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                      <i class="fa fa-paper-plane"></i> Save</button>
                    <!---<button type="reset" class="btn btn-flat">Reset</button>!--->
                 </div>
               </div>

                    </form>
                </div>
          