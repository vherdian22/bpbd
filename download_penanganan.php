<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan penanganan-excel.xls"); 

?>

<p align="center" style="font-weight:bold;font-size:16pt">REKAP LAPORAN</p>

<table class="table">
                                    <thead>
                                    <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Jenis Kejadian</th>
                                            <th scope="col">Tanggal Kejadian</th>
                                            <th scope="col">Waktu Kejadian</th>
                                            <th scope="col">Longtitude</th>
                                            <th scope="col">Latitude</th>
                                            <th scope="col">RT</th>
                                            <th scope="col">RW</th>
                                            <th scope="col">Dusun</th>
                                            <th scope="col">Desa</th>
                                            <th scope="col">Kecamatan</th>
                                            <th scope="col">Kronologi</th>
                                            <th scope="col">Dampak</th>
                                            <th scope="col">Nama korban</th>
                                            <th scope="col">Jumblah Korban</th>
                                            <th scope="col">Korban Laki-laki</th>
                                            <th scope="col">Korban Perempuan</th>
                                            <th scope="col">Balita</th>
                                            <th scope="col">Lansia</th>
                                            <th scope="col">Hamil</th>
                                            <th scope="col">Disabil</th>
                                            <th scope="col">Kebutuhan</th>
                                            <th scope="col">Upaya</th>
                                            <th scope="col">Kendala</th>
                                            <th scope="col">Terlibat</th>
                                            <th scope="col">Dokumentasi Kejadian</th>
                                            <th scope="col">Foto KTP</th>
                                            <th scope="col">Foto KK</th>
                                            <th scope="col">Petugas</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       $nomor = 0;
                                        include "connection.php";
                                        $a="SELECT * from lap_penanganan";
                                        $b=$connection->query($a);
                                        while($c=$b->fetch_array()){ $nomor++; ?>
                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo $c['jenis_kejadian']; ?></td>
                                            <td><?php echo $c['tanggal']; ?></td>
                                            <td><?php echo $c['waktu']; ?></td>
                                            <td><?php echo $c['longtitude']; ?></td>
                                            <td><?php echo $c['latitude']; ?></td>
                                            <td><?php echo $c['rt']; ?></td>
                                            <td><?php echo $c['rw']; ?></td>
                                            <td><?php echo $c['dusun']; ?></td>
                                            <td><?php echo $c['desa']; ?></td>
                                            <td><?php echo $c['kecamatan']; ?></td>
                                            <td><?php echo $c['kronologi']; ?></td>
                                            <td><?php echo $c['dampak']; ?></td>
                                            <td><?php echo $c['nama_korban']; ?></td>
                                            <td><?php echo $c['jml_jiwa']; ?></td>
                                            <td><?php echo $c['korban_lk']; ?></td>
                                            <td><?php echo $c['korban_pr']; ?></td>
                                            <td><?php echo $c['balita']; ?></td>
                                            <td><?php echo $c['lansia']; ?></td>
                                            <td><?php echo $c['hamil']; ?></td>
                                            <td><?php echo $c['disabil']; ?></td>
                                            <td><?php echo $c['kebutuhan']; ?></td>
                                            <td><?php echo $c['upaya']; ?></td>
                                            <td><?php echo $c['kendala']; ?></td>
                                            <td><?php echo $c['terlibat']; ?></td>
                                            <td>
                                            <img src="img/<?php echo $c['dok_kejadian']; ?>" style="width: 50px" >
                                            </td>
                                            <td>
                                            <img src="img/<?php echo $c['dok_ktp']; ?>" style="width: 50px" >
                                            </td>
                                            <td>
                                            <img src="img/<?php echo $c['dok_kk']; ?>" style="width: 50px" >
                                            </td>
                                            
                                            <td><?php echo $c['pelapor']; ?></td>

                                        </tr>
                                    
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>






