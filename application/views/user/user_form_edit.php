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
                 <div class="form-group <?=form_error('name') ? 'has-error' : null ?>">
                   <label>Nama *</label>
                   <input type="hidden" name="id" value="<?=$row->id?>">
                   <input type="text" name="name" value="<?=$this->input->post('name') ?? $row->name ?>" class="form-control">  
                   <?=form_error('name')?>
                 </div>

                 <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                   <label>Username *</label>
                   <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username ?>" class="form-control">  
                   <?=form_error('username')?>
                 </div>

                 <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                   <label>Password</label> <SMALL>(Biarkan kosong jika tidak diganti)</SMALL>
                   <input type="password" name="password" value="<?=$this->input->post('password') ?>" class="form-control"> 
                   <?=form_error('password')?> 
                 </div>

                 <div class="form-group <?=form_error('address') ? 'has-error' : null ?>">
                   <label>Address *</label>
                   <textarea name="address" class="form-control"> <?=$this->input->post('address') ?? $row->address ?></textarea> 
                   <?=form_error('address')?>
                 </div>

                 <div class="form-group <?=form_error('address') ? 'has-error' : null ?>">
                   <label>Level *</label>
                   <textarea name="level" class="form-control"> <?=$this->input->post('level') ?? $row->level ?></textarea> 
                   <?=form_error('level')?>
                 </div>
                 <div class="form-group">
                     <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
                     <button type="reset" class="btn btn-secondary">Reset</button>
                 </div>

              </form>
            </div>
        </div>
      

      
