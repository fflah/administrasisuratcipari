<script type="text/javascript">
	function show_modal(id) {
		$.ajax({
            type  : 'GET',
            url   : '<?= base_url()?>surat/dashboard/show_dataw/'+id,
            dataType : 'json',
            success : function(data){
                console.log(data);
                $('#1').text(data.NIK);
                $('#2').text(data.nama);
                $('#3').text(data.alamat);
                $('#4').text(data.tempat_tgl_lahir);
                $('#5').text(data.agama);
                $('#6').text(data.status);
                $('#7').text(data.agama);
                $('#8').text(data.pekerjaan);
                $('#9').text(data.alamat);
            }

        });
	}
</script>