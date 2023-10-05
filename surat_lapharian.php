<?php
include 'connection.php';

$id_laporan = $_GET['id_laporan'];
$query="SELECT * from lap_harian where id_laporan = '$id_laporan';";
$data = mysqli_query($connection , $query);
$tampil = mysqli_fetch_assoc($data);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SIPELBA - opo yo</title>
    <link rel="shortcut icon" href="logo_bpbd.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Template Stylesheet -->
    <link href="css/surat.css" rel="stylesheet">

</head>

<body>
    <div class="surat">

        <div class="header">
            <div class="imagel">
                <img src="image/malang.png">
            </div>

            <div class="htext">
                <h1>PEMERINTAH KABUPATEN MALANG</h1>
                <h1>BADAN PENANGGULANGAN BENCANA DAERAH</h1>
                <p>Jl. Trunojoyo  Kv. 8 Kepanjen Telp. (0341) 392121 HP. +62 822-4409-4886
                    Website: http://bpbd.malangkab.go.id/pd/  Email    : pusdalopsmalangkab@gmail.com
                </p>
                <p>
                    KEPANJEN
                </p>
            </div>
            
            <div class="imager">
                <img src="image/bpbd.png">
            </div>

        </div>

        <hr>

        <div class="isi">
            <h2>Laporan Harian</h2>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th >Dari</th> <th>:</th> <th >Petugas Piket Pusdalops</th>
                        </tr>
                        <tr>
                            <th >Kepada</th> <th>:</th> <th >Yth. Bapak Kepala Pelaksana BPBD Kabupaten Malang</th>
                        </tr>
                        <tr>
                            <th >Nomor</th> <th>:</th> <th >300.2/......... /35. 07.206/2023</th>
                        </tr>
                        <tr>
                            <th >Sifat</th> <th>:</th> <th >Segera Penting</th>
                        </tr>
                        <tr>
                            <th >Hal</th> <th>:</th> <th >Laporan Harian</th>
                        </tr>
                     </tbody>
                </table>
                         
                <table class="table-jeda">
                        <tr>
                            <th > Di Laporkan dengan hormat, Sebagai Berikut :</th> 
                        </tr>
                   
                </table>

                <table class="table-isi">
                    <tbody>
                        <tr>
                        <th >A.</th><th class="th2" >Kejadian :</th> 
                        </tr>
                        <tr>
                            <th ></th> <th class="th2" >Hari</th> <th>:</th> <th >Kamis</th>
                        </tr>
                        <tr>
                            <th ></th><th >Tanggal</th> <th>:</th> <th ><?php echo date("d F Y", strtotime($tampil['tanggal'])); ?></th>
                        </tr>
                        <tr>
                            <th ></th><th >Pukul</th> <th>:</th> <th ><?php echo date("h.i", strtotime($tampil['waktu'])); ?> Wib</th>
                        </tr>

                        <tr>
                            <th >B.</th> <th >Jenis Bencana</th> <th>:</th> <th><?php echo $tampil['jenis_bencana']; ?></th> 
                        </tr>

                        <tr>
                         <th >C.</th><th >Korban Jiwa</th> <th>:</th> <th><?php echo $tampil['korban']; ?></th> 
                        </tr>

                        <tr>
                            <th >D.</th>   <th >Kerusakan</th> <th>:</th> <th><?php echo $tampil['kerusakan']; ?></th> 
                        </tr>

                        <tr>
                            <th >E.</th>   <th >Perkiraan Kerugian</th> <th>:</th> <th>Rp.<?php echo number_format($tampil['rugi'],2,',','.'); ?></th> 
                        </tr>
                </table> 

                <table class="kronologi">
                    <tbody>                             
                        <tr>
                            <th >F.</th> <th >Kronologi/Sebab-sebab Kejadian Bencana :</th> 
                        </tr>
                        
                        <tr>
                            <th ></th> <th><?php echo $tampil['kronologi']; ?></th>  
                        </tr>

                        <tr>
                            <th >G.</th> <th>Langkah-langkah yang telah diambil antara lain :</th> 
                        </tr>
                        
                        <tr>
                            <th ></th> <th><?php echo $tampil['penanganan']; ?></th>  
                        </tr>

                     </tbody>
                </table>

                <table class="table-jeda">
                    <tbody>
                        <tr>
                            <th >Petugas Piket Pusdalops</th> <th>:</th> 
                        </tr>
                     </tbody>
                </table>

                <table class="table-isi">
                     <tbody>
                        <tr>
                            <th ></th> <th><?php echo $tampil['petugas']; ?> </th> 
                        </tr>
                     </tbody>
                </table>
               
                <table class="table-jeda">
                    <tbody>
                        <tr>
                            <th>Demikian Laporan ini kami buat untuk menjadikan periksa.</th> <th>:</th> 
                        </tr>
                     </tbody>
                </table>

                <table class="tanggal">
                    <tbody>
                        <tr>
                            <th >Kepanjen,</th> <th><?php echo date("d F Y", strtotime($tampil['tanggal'])); ?></th>
                        </tr>
                     </tbody>
                </table>

                <table class="ttd1">
                    <tbody>
                        <tr>
                            <th >Mengetahui,<br>Kepala Bidang Pencegahan dan<br> Kesiapsiagaan</th> 
                        </tr>   
                     </tbody>
                </table>

                <table class="ttd2">
                    <tbody>
                        <tr>
                            <th>Petugas Piket Pusdalops</th> 
                        </tr>
                     </tbody>
                </table>

                <table class="nama1">
                    <tbody>
                    <tr>
                            <th >ZAINUDDIN, S.H. <br> Penata Tingkat I (III/d) <br>NIP. 198006231999011001</th> 
                        </tr>
                     </tbody>
                </table>

                <table class="nama2">
                    <tbody>
                    <tr>
                            <th>ANANG SANTOSO</th> 
                        </tr>
                     </tbody>
                </table>

             </div>
        </div>

    </div>




</body>

</html>