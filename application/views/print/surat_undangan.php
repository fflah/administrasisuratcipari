<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Undangan</title>
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
        
    </style>
</head>
<body>
    <center>
    <div class="content">
        <table border="0" width="593">
            <tr>
                <td rowspan="2"><img class="logo" alt="" src="<?=base_url('assets\img\image1.png')?>" title=""></td>
                <td class="kop-judul">PEMERINTAH KABUPATEN CILACAP <br>
                    KECAMATAN CIPARI</td>
            </tr>
            <tr>
                <td class="kop-sub">Alamat: Jalan Jendral Ahmad Yani No 42, Kode Pos 53262, Telp. (0280) 523412</td>
            </tr>
            <tr>
                <td style="padding: -3px;" colspan="2">
                    <hr class="solid">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Cipari, <?=date("d F Y ") ?>
                </td>
            </tr>
        </table>
        <table border="0" width="593">
            <?=$kontent?>
            <tr>
                <td colspan="2">
                   <table style="margin-left:300px; margin-top: 100px;">
                       <tr>
                           <td  align="center" style="padding-bottom: 10px;">Cipari, <?=date("d F Y ")?></td>
                        </tr>
                        <tr>
                            <td  align="center" ><?=$jabatan_ttd?></td>
                        </tr>
                        <tr>
                            <td><center><img width="100" height="100" src="..\<?=$ttd_img?>" alt=""></center></td>
                        </tr>
                        <tr>
                            <td  align="center" style="padding-bottom: 10px;" ><?= $nama_ttd?></td>
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
       
        window.onafterprint = function(){
            console.log("Printing completed...");
            location.replace("<?= base_url('suratkeluar')?>")
        } 
    };
</script>