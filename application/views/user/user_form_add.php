<body id="page-top">
    <div class="container-fluid">
      <div class="box">
        <div class="box-header">
          <h1 class="h4 mb-0 text-gray-800">Add User</h1>
          <div align="right">
            <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back </a>
          </div>
     </div>
      <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">    
        </div>
             <?php // echo validation_errors() ; ?>
              <form action="" method="post">
                 <div class="form-group <?=form_error('name') ? 'has-error' : null ?>">
                   <label>Nama *</label>
                   <input type="text" name="name" value="<?= set_value('name')?>" class="form-control">  
                   <?=form_error('name')?>
                 </div>

                 <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                   <label>Username *</label>
                   <input type="text" name="username" value="<?= set_value('username')?>" class="form-control">  
                   <?=form_error('username')?>
                 </div>

                 <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                   <label>Password *</label>
                   <input type="password" name="password" value="<?= set_value('password')?>" class="form-control"> 
                   <?=form_error('password')?> 
                 </div>

                 <div class="form-group <?=form_error('address') ? 'has-error' : null ?>">
                   <label>Address *</label>
                   <textarea name="address" value="<?= set_value('address')?>" class="form-control"> </textarea> 
                   <?=form_error('address')?>
                 </div>

                 <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                   <label>Level</label>
                   <input type="text" name="level" value="<?= set_value('Level')?>" class="form-control"> 
                   <?=form_error('level')?> 
                 </div>
                 <div class="form-group">
                     <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
                     <button type="reset" class="btn btn-secondary">Reset</button>
                 </div>

              </form>
            </div>
        </div>
      

          
      