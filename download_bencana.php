<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan bencana-excel.xls"); 

?>

<p align="center" style="font-weight:bold;font-size:16pt">REKAP LAPORAN</p>

<table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal Kejadian</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col">Lokasi Kejadian</th>
                                            <th scope="col">RT</th>
                                            <th scope="col">RW</th>
                                            <th scope="col">Dusun</th>
                                            <th scope="col">Desa</th>
                                            <th scope="col">Kecamatan</th>
                                            <th scope="col">Longtitude</th>
                                            <th scope="col">Latitude</th>
                                            <th scope="col">Jenis Bencana</th>
                                            <th scope="col">Kronologi</th>
                                            <th scope="col">Dampak</th>
                                            <th scope="col">jumlah korban</th>
                                            <th scope="col">laki-laki</th>
                                            <th scope="col">Perempuan</th>
                                            <th scope="col">Jumblah KK</th>
                                            <th scope="col">Kerusakan Fasilitas umum</th>
                                            <th scope="col">Kerusakan Infrastruktur</th>
                                            <th scope="col">Harta Benda</th>
                                            <th scope="col">Unit Usaha</th>
                                            <th scope="col">Kerugian</th>
                                            <th scope="col">Kerusakan</th>
                                            <th scope="col">Nama-nama Korban</th>
                                            <th scope="col">Jumlah luka-luka</th>
                                            <th scope="col">Jumlah hilang</th>
                                            <th scope="col">Bantuan yang telah diberikan</th>
                                            <th scope="col">Korban</th>
                                            <th scope="col">Dokumentasi</th>
                                            <th scope="col">Petugas piket</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 0;
                                        include "connection.php";
                                        $a="SELECT * from lap_bencana";
                                        $b=$connection->query($a);
                                        while($c=$b->fetch_array()){ $nomor++; ?>
                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo $c['tanggal']; ?></td>
                                            <td><?php echo $c['waktu']; ?></td>
                                            <td><?php echo $c['alamat']; ?></td>
                                            <td><?php echo $c['rt']; ?></td>
                                            <td><?php echo $c['rw']; ?></td>
                                            <td><?php echo $c['dusun']; ?></td>
                                            <td><?php echo $c['desa']; ?></td>
                                            <td><?php echo $c['kecamatan']; ?></td>
                                            <td><?php echo $c['longtitude']; ?></td>
                                            <td><?php echo $c['latitude']; ?></td>
                                            <td><?php echo $c['jenis_bencana']; ?></td>
                                            <td><?php echo $c['kronologi']; ?></td>
                                            <td><?php echo $c['dampak']; ?></td>
                                            <td><?php echo $c['kerusakan']; ?></td>
                                            <td><?php echo $c['korban_jiwa']; ?></td>
                                            <td><?php echo $c['korban_lk']; ?></td>
                                            <td><?php echo $c['korban_pr']; ?></td>
                                            <td><?php echo $c['jml_kk']; ?></td>
                                            <td><?php echo $c['fasum']; ?></td>
                                            <td><?php echo $c['infra']; ?></td>
                                            <td><?php echo $c['harta']; ?></td>
                                            <td><?php echo $c['usaha']; ?></td>
                                            <td><?php echo $c['kerugian']; ?></td>
                                            <td><?php echo $c['dok_kerusakan']; ?></td>
                                            <td><?php echo $c['nama_korban']; ?></td>
                                            <td><?php echo $c['jml_luka']; ?></td>
                                            <td><?php echo $c['jml_hilang']; ?></td>
                                            <td><?php echo $c['bantuan']; ?></td>
                                            <td><?php echo $c['dok_korban']; ?></td>
                                            <td><?php echo $c['petugas']; ?></td>
                                            
                                        </tr>
                                    
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>






