<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan harian-excel.xls"); 

?>

<p align="center" style="font-weight:bold;font-size:16pt">REKAP LAPORAN</p>

<table class="table">
                                    <thead>
                                    <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Jenis Bencana</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col">Korban</th>
                                            <th scope="col">Kerusakan</th>
                                            <th scope="col">Rugi</th>
                                            <th scope="col">Kronologi</th>
                                            <th scope="col">Penanganan</th>
                                            <th scope="col">Petugas Piket</th>
                                            <th scope="col">Dokumentasi</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $nomor = 0;
                                    include "connection.php";
                                    $a="SELECT * from lap_harian";
                                    $b=$connection->query($a);
                                    while($c=$b->fetch_array()){ $nomor++; ?> 
                                    <tr>
                                        <td><?php echo $nomor ?></td>
                                        <td><?php echo $c['jenis_bencana']; ?></td>
                                        <td><?php echo $c['tanggal']; ?></td>
                                        <td><?php echo $c['waktu']; ?></td>
                                        <td><?php echo $c['korban']; ?></td>
                                        <td><?php echo $c['kerusakan']; ?></td>
                                        <td><?php echo $c['rugi']; ?></td>
                                        <td><?php echo $c['kronologi']; ?></td>
                                        <td><?php echo $c['penanganan']; ?></td>
                                        <td><?php echo $c['petugas']; ?></td>
                                        <td>
                                        <img src="img/<?php echo $c['dokumentasi']; ?>" style="width: 50px">    
                                        </td>
                                        <td>
                                        

                                    </tr>
                                    
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>






