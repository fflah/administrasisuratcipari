<!DOCTYPE html>
<!-- Created by pdf2htmlEX (https://github.com/coolwanglu/pdf2htmlex) -->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

        <link href="<?php echo base_url()?>/assets/print_assets/surat_kematian/base.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/print_assets/surat_kematian/fancy.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/print_assets/surat_kematian/main.css" rel="stylesheet">

        <script src="<?php echo base_url()?>/assets/print_assets/surat_kematian/compatibility.min.js"></script>
        <script src="<?php echo base_url()?>/assets/print_assets/surat_kematian/theViewer.min.js"></script>
        <script>
            try{
                theViewer.defaultViewer = new theViewer.Viewer({});
            }catch(e){}
            </script>
            
        <title>Surat Keterangan Kematian</title>
    </head>
    <body>
      <div id="sidebar">
         <div id="outline"></div>
      </div>
      <div id="page-container">
         <div id="pf1" class="pf w0 h0" data-page-no="1">
            <div class="pc pc1 w0 h0">
               <img class="bi x0 y0 w0 h0" alt="" src="<?php echo base_url()?>assets/print_assets/surat_kematian/bg1.png">
               <div class="c x1 y1 w1 h1">
                  <div class="t m0 x2 h2 y2 ff1 fs0 fc0 sc0 ls0 ws0">PEMERINTAH KABUPATEN CILACAP</div>
                  <div class="t m0 x3 h2 y3 ff1 fs0 fc0 sc0 ls0 ws0">KECAMATAN GANDRUNGMANGU</div>
                  <div class="t m0 x4 h2 y4 ff1 fs0 fc0 sc0 ls0 ws0">KELURAHAN GANDRUNGMANGU</div>
               </div>
               <div class="t m0 x5 h3 y5 ff2 fs1 fc0 sc0 ls0 ws0">Alamat: Jalan Infra 14/15 Bumi Dipasena Abadi  Kode Pos 34675</div>
               <div class="t m0 x6 h3 y6 ff2 fs1 fc0 sc0 ls0 ws0">Website<span class="fc1">: https://semarapurakaja.desa.id/</span>   Email: gandrungmangu@gmail.com</div>
               <div class="t m0 x7 h4 y7 ff1 fs2 fc0 sc0 ls0 ws0">SURAT KETERANGAN KEMATIAN</div>
               <div class="t m0 x8 h5 y8 ff2 fs2 fc0 sc0 ls0 ws0">Nomor<span class="_ _0"> </span>: <?=$data_surat['no_surat']?></div>
               <div class="t m0 x9 h5 y9 ff2 fs2 fc0 sc0 ls0 ws0">Yang <span class="_ _1"> </span>bertanda <span class="_ _1"> </span>tangan <span class="_ _1"> </span>di <span class="_ _1"> </span>bawah <span class="_ _1"> </span>ini <span class="_ _1"> </span>Kepala <span class="_ _1"> </span>Desa <span class="_ _1"> </span>Gandrungmangu <span class="_ _1"> </span>Kecamatan </div>
               <div class="t m0 x9 h5 ya ff2 fs2 fc0 sc0 ls0 ws0">Gandrungmangu menerangkan dengan sesungguhnya bahwa : </div>
               <div class="t m0 xa h5 yb ff2 fs2 fc0 sc0 ls0 ws0">N a m a<span class="_ _2"> </span>: <?=$data_surat['nama']?></div>
               <div class="t m0 xa h5 yc ff2 fs2 fc0 sc0 ls0 ws0">Tempat,  tanggal lahir<span class="_ _3"> </span>: <?=$data_surat['tempat_tgl_lahir']?></div>
               <div class="t m0 xa h5 yd ff2 fs2 fc0 sc0 ls0 ws0">A g a m a<span class="_ _4"> </span>: <?=$data_surat['agama']?></div>
               <div class="t m0 xa h5 ye ff2 fs2 fc0 sc0 ls0 ws0"> </div>
               <div class="t m0 xa h5 yf ff2 fs2 fc0 sc0 ls0 ws0">Jenis kelamin<span class="_ _5"> </span>: <?=$data_surat['jk']?></div>
               <div class="t m0 xa h5 y10 ff2 fs2 fc0 sc0 ls0 ws0">Pekerjaan<span class="_ _6"> </span>: <?=$data_surat['pekerjaan']?></div>
               <div class="t m0 xa h5 y11 ff2 fs2 fc0 sc0 ls0 ws0">Alamat<span class="_ _7"> </span>: <?=$data_surat['alamat']?></div>
               <div class="t m0 x9 h5 y12 ff2 fs2 fc0 sc0 ls0 ws0">Memang <span class="_ _8"> </span>benar <span class="_ _8"> </span>yang <span class="_ _8"> </span>bersangkutan <span class="_ _8"> </span>diatas <span class="_ _8"> </span>warga <span class="_ _8"> </span>desa <span class="_ _8"> </span>Gandrungmangu <span class="_ _8"> </span>Kecamatan </div>
               <div class="t m0 x9 h5 y13 ff2 fs2 fc0 sc0 ls0 ws0">Gandrungmangu telah meninggal dunia pada tanggal <?=$data_surat['hari_meninggal']?> jam <?=$data_surat['jam_meninggal']?>.</div>
               <div class="t m0 x9 h5 y14 ff2 fs2 fc0 sc0 ls0 ws0">Demikianlah <span class="_ _9"></span>surat <span class="_ _9"></span>keterangan <span class="_ _9"></span>ini <span class="_ _9"></span>dibuat <span class="_ _9"></span>untuk <span class="_ _9"></span>dapat <span class="_ _9"></span>dipergunakan <span class="_ _9"></span>sebagaimana <span class="_ _9"></span>mestinya.  </div>
               <div class="t m0 x9 h5 y15 ff2 fs2 fc0 sc0 ls0 ws0">Atas kerja samanya diucapkan terima kasih.</div>
               <div class="t m0 xb h5 y16 ff2 fs2 fc0 sc0 ls0 ws0">          <span class="_ _8"> </span>Gandrungmangu,  <?=$data_surat['tanggal']?></div>
               <div class="t m0 x9 h5 y17 ff2 fs2 fc0 sc0 ls0 ws0">             <span class="_ _a"> </span><span class="fs1">                                     </span></div>
               <div class="t m0 xc h5 y18 ff2 fs2 fc0 sc0 ls0 ws0">       <span class="_ _b"> </span>    <?=$jabatan_ttd?></div>
               <div class="t m0 xd h5 y19 ff2 fs2 fc0 sc0 ls0 ws0">   </div>
               <div class="t m0 xd h4 y1a ff1 fs2 fc0 sc0 ls0 ws0">         <span class="_ _c"> </span>   <?=$nama_ttd?></div>
            </div>
            <div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div>
         </div>
      </div>
      <div class="loading-indicator">
      </div>
   </body>
</html>

<script>
    window.onload = function () { 
        window.print();
        path = location.pathname.split("/")
        if (path[2] == 'suratkeluar') {
                window.onafterprint = function(){
                console.log("Printing completed...");
                location.replace("<?= base_url('suratkeluar')?>")
            } 
        }else{
            window.onafterprint = function(){
                console.log("Printing completed...");
                location.replace("<?= base_url('suratPengantar/permintaan')?>")
            } 
        }
    };
</script>