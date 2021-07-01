<!DOCTYPE html>
<html><style type="text/css">
            body{
                padding: 5px 50px 70px 30px;
                font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif;
                font-size: 12;
            }
            header { position: fixed; top: 30px; left: 40px; right: 40px; height: auto;}
            footer { position: fixed; bottom: -60px; left: 0px; right: 0px;height: 120px; padding: 0px 40px 0px 50px;}
            
        </style>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Surat Keterangan</title>
  <center>
                <table width="100%">
                    <tr>
                        <td align="center" ><img src="<?php echo base_url()?>assets/img/logo.png" width="45%" ></td>
                        <td align="right" width="60%">
                            <table style="margin-top:0%">
                                <tr>
                                    <td><center>PEMERINTAH JAWA TENGAH</center></td>
                                </tr>
                                <tr>
                                    <td><center>KECAMATAN GANDRUNGMANGU</center></td>
                                </tr>
                                <tr style="font-size: 14; font-weight: bold">
                                    <td><center>KANTOR KEPALA DESA GANDRUNG</center></td>
                                </tr>
                                <tr style="font-size: 10">
                                    <td><center>Jln. Wilis No.5 Desa Gandrung, Kec. Gandrung Kode Pos 63263</center></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><u>--------------------------------------------------------------------------------------------------------</u></tr>
                </table>
            </center>
</head>
<body>
<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
                <center>
                    <u><strong style="font-size:12; line-height: 10px;"><?php echo strtoupper ($tampil['jenis_surat']) ?></strong></u><br>
                    <u><p style="font-size:10;">No : <?php echo $tampil['no_surat'] ?></p></u>
                </center>
                <br/><br/>
                <p class="justify"> Yang bertanda tangan dibawah ini saya Kepala Desa Gandrung Kecamatan Gandrung Kabupaten Gandrung.</p>

                <br>
                Dengan ini menerangkan  :
                <!-- text input -->
                    <table cellpadding="3" width="600px">
                        <tr >
                            <td width="150px">NIK</td>
                            <td width="10px">:</td>
                            <td width="440px"><?php echo $tampil['NIK'] ?></td>
                        </tr>
                        <tr >
                            <td>Nama</td>
                            <td>:</td>
                            <td><?php echo $tampil['nama'] ?></td>
                        </tr>
                        <tr >
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?php echo $tampil['jk']?></td>
                        </tr>
                        <tr >
                            <td>Tempat/Tgl. Lahir</td>
                            <td>:</td>
                            <td><?php echo $tampil['tempat_tgl_lahir'] ?></td>
                        </tr>
                        <tr >
                            <td>Agama</td>
                            <td>:</td>
                            <td><?php echo $tampil['agama']?></td>
                        </tr>
                        
                        <tr >
                            <td>Status Perkawinan</td>
                            <td>:</td>
                            <td><?php echo $tampil['status']?></td>
                        </tr>
                        
                        <tr >
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><?php echo $tampil['pekerjaan']?></td>
                        </tr>
                        <tr >
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo $tampil['alamat']?></td>
                        </tr>
                        <tr >
                            <td>Keterangan</td>
                            <td>:</td>
                        </tr>
                    </table>
                    <p class="justify"><?php echo $tampil['keterangan']?></p>
                     
                     <br/><br/>
                <br/>

                <p class="justify">Demikian Surat Keterangan ini dibuat dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.</p>
                <br/><br/><br/>
        
                <table width="100%">
                    <tr>
                        <td width="30%">
                            
                        </td>
                        <td></td>
                        <td width="40%">
                            Mendiro, <?php echo tgl($tampil['tanggal']) ?>
                             <br/>
                            <?php 
                            if($tampil['ttd'] == 'Antoni Budiarso'){
                                echo "Kepala Desa Mendiro";
                            }else{
                                echo "Sekretaris Desa Mendiro";
                            }
                            ?>
                            <br/><br/><br/><br/>
                            <strong><?php echo $tampil['ttd'] ?></strong>

                        </td>
                    </tr>
                </table>
        <footer>
            <table width="100%">
                <tr>
                    <td></td>
                </tr>
            </table>
        </footer>
    </body></html>
