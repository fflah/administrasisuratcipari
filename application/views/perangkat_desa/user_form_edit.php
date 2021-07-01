<body id="page-top">
    <div class="container-fluid">
    <div class="box">
       <div class="box-header">
        <h1 class="h4 mb-0 text-gray-800">Silahkan edit data</h1>
          <div align="right">
              <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back </a>
          </div>
     </div>
      <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">    
        </div>
              <form action="" method="post">
                 <div class="form-group <?=form_error('nama') ? 'has-error' : null ?>">
                   <label>Nama *</label>
                   <input type="hidden" name="id" value="<?=$row->id?>">
                   <input type="text" name="nama" value="<?=$this->input->post('nama') ?? $row->nama ?>" class="form-control">  
                   <?=form_error('nama')?>
                 </div>

                 <div class="form-group <?=form_error('nik') ? 'has-error' : null ?>">
                   <label>NIK *</label>
                   <input type="text" name="nik" value="<?=$this->input->post('nik') ?? $row->nik ?>" class="form-control">  
                   <?=form_error('nik')?>
                 </div>

                 <div class="form-group <?=form_error('jabatan') ? 'has-error' : null ?>">
                   <label>Jabatan</label> 
                   <input type="text" name="jabatan" value="<?=$this->input->post('jabatan') ?? $row->jabatan ?>" class="form-control">  
                   <?=form_error('jabatan')?> 
                 </div>

                 <div class="form-group <?=form_error('divisi') ? 'has-error' : null ?>">
                   <label>Devisi *</label>
                   <textarea name="divisi" class="form-control"> <?=$this->input->post('divisi') ?? $row->divisi ?></textarea> 
                   <?=form_error('divisi')?>
                 </div>

                 <div class="form-group <?=form_error('status') ? 'has-error' : null ?>">
                   <label>Status *</label>
                   <textarea name="status" class="form-control"> <?=$this->input->post('status') ?? $row->status ?></textarea> 
                   <?=form_error('status')?>
                 </div>
                 <div class="form-group">
                     <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
                     <button type="reset" class="btn btn-secondary">Reset</button>
                 </div>

              </form>
            </div>
        </div>
      

      
