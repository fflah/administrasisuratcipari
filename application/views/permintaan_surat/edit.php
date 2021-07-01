<body id="page-top">
    <div class="container-fluid">
      <div class="box">
       <div class="box-header">
        <h1 class="h4 mb-0 text-gray-800"></h1>
          <div align="right">
              <a href="<?=site_url('suratpengantar/permintaan')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back </a>
          </div>
     </div>
      <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">    
        </div>
                <form action="<?= base_url('multiple/proses'); ?>" method="post">
                 <div class="form-group">
                  

                 <div class="form-group">
                   <label>Proses Surat</label>
                   <select id="form_need" name="proses_surat" class="form-control" required="required" data-error="Pilih jenis surat yang anda perlukan">
                                        <option value=""></option>
                                        <option value="a">Process</option>
                                        <option value="b">Finish</option>
                    </select>
                   
                 </div>

                
                 <div class="form-group">
                    <button type="submit" name="" class="btn btn-success btn-flat" >
                      <i class="fa fa-paper-plane"></i> Save</button>
                    <!---<button type="reset" class="btn btn-flat">Reset</button>!--->
                 </div>
               </div>

                    </form>
                </div>

          