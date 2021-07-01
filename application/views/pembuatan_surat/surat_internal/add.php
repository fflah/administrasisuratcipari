 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Surat Undangan</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                Default Card Example
            </div>
            <div class="card-body">
                <form action="" method="post">
                        <textarea name="content" id="ckeditor" required></textarea>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
    $(function () {
            CKEDITOR.replace('ckeditor',{
                filebrowserImageBrowseUrl : '<?php echo base_url('assets/kcfinder/browse.php');?>',
                height: '400px'             
            });
        });

       
</script>