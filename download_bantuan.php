<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan bantuan-excel.xls"); 

?>

<p align="center" style="font-weight:bold;font-size:16pt">REKAP LAPORAN</p>

<table class="table">
                                    <thead>
                                    <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Jenis Bencana</th>
                                            <th scope="col">Kecamatan</th>
                                            <th scope="col">Desa</th>
                                            <th scope="col">Dusun</th>
                                            <th scope="col">Jumlah KK</th>
                                            <th scope="col">Usia terdampak</th>
                                            <th scope="col">Bantuan yang diberikan</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 0;
                                        include "connection.php";
                                        $a="SELECT * from lap_bantuan";
                                        $b=$connection->query($a);
                                        while($c=$b->fetch_array()){ $nomor++; ?>                          
                                        <tr> 
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $c['jenis_bencana']; ?></td>
                                            <td><?php echo $c['kecamatan']; ?></td>
                                            <td><?php echo $c['desa']; ?></td>
                                            <td><?php echo $c['dusun']; ?></td>
                                            <td><?php echo $c['jml_kk']; ?></td>
                                            <td><?php echo $c['usia']; ?></td>
                                            <td><?php echo $c['bantuan']; ?></td>
                                    
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>






