<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Keluar</title>
    <style>
        body{
            padding: 0;
            margin: 0;
        }

        .content {
            max-width: 793px;
            margin: auto;
        }

        th, td {
            padding: 0px;            
        }

        .logo{
            width: 70.79px; 
            height: 95.05px;
            display: block;
            margin-left: auto;
            margin-right: auto;            
            
        }
        
        .kop-judul{
            font-weight: bold;
            font-size: x-large;
            text-align: center;            
        }

        .kop-sub{
            font-size: x-small;
            text-align: center;
        }

        hr.solid {
            border-top: 4px solid rgb(17, 17, 17);
        }

        .tabel-surat{
            border-collapse: collapse;
        
        }

        .tabel-surat tr td {
            padding: 4px;
        }

        .tabel-surat tr th {
            padding: 6px;
        }

        
    </style>
</head>
<body>
    <center>
    <div class="content">
        <table border="0" width="593">
            <tr>
                <td rowspan="2"><img class="logo" alt="" src="<?=base_url('assets\img\image1.png')?>" title=""></td>
                <td class="kop-judul">PEMERINTAH KABUPATEN CILACAP <br>
                    KECAMATAN CIPARI <br>
                </td>
            </tr>
            <tr>
                <td class="kop-sub">Alamat: Kota Gandrungmangu Jl. Mangesti Luhur No. 10, Telp. (0271) 71543 <br>
                    Website: https://semarapurakaja.desa.id/   Email: gandrungmangu@gmail.com</td>
            </tr>
            <tr>
                <td style="padding: -3px;" colspan="2">
                    <hr class="solid">
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <b><u>LAPORAN SURAT MASUK</u></b>
                </td>
            </tr>
        </table>
        <table border="0" width="593">
            <tr>
                <td style="padding-bottom: 20px;" colspan="2">                    
                    <table class="tabel-surat" style=" margin-left: auto; margin-right: auto; margin-top: 30px;" border="1" width="95%">
                        <tr>
                            <th width="10%">No.</th>
                            <th width="33%">No. Surat</th>
                            <th width="33%">Tanggal Surat </th>
                            <th width="33%">Keterangan</th>
                        </tr>
                        <?php $i=1; ?>
                        <?php foreach ($datafilter as $data) :?>
                            
                        <tr>
                            <th scope="row"><?= $i;?></th>
                            <td><?= $data->no_surat?></td>
                            <td><?= $data_surat['tanggal'] = tanggal_indo(date('Y-n-d', strtotime($data->tgl_surat)));  ?></td>
                            <td><?= $data->keterangan?></td>
                        </tr> 
                        <?php $i++; ?>
                        <?php endforeach; ?>                                                
                    </table>
                </td>
            </tr>            
            <tr>
                <td colspan="2">
                   <table style="margin-left:350px; margin-top: 100px;">
                       <tr>
                           <td  align="center" style="padding-bottom: 10px;">Cipari, <?= Date('d F Y')?></td>
                        </tr>
                        <tr>
                            <td  align="center">Petugas</td>
                        </tr>
                        <tr>
                            <td><center><img width="100" height="100" src="..\<?=$ttd_img?>" alt=""></center></td>
                        </tr>
                        <tr>
                            <td  align="center" style="padding-bottom: 10px;" >Parsiman</td>
                        </tr>
                   </table>
                </td>
            </tr>
        </table>
    </div>
</center>
</body>
</html>

<script>
    window.onload = function () { 
        window.print();
        path = location.pathname.split("/")
        if (path[2] == 'laporanmasuk') {
                window.onafterprint = function(){
                console.log("Printing completed...");
                location.replace("<?= base_url('laporanMasuk')?>")
            } 
        }else{
            window.onafterprint = function(){
                console.log("Printing completed...");
                location.replace("<?= base_url('laporanMasuk')?>")
            } 
        }
    };
</script>

             			                                     
				       			    
						   
	
	

         	   




