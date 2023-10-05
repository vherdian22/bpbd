<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPELBA - Form Bencana</title>
    <link rel="shortcut icon" href="logo_bpbd.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<?php
include 'connection.php';
session_start();
$id_user = $_SESSION['id_user'];
$query="SELECT * from register where id_user = '$id_user';";
$data = mysqli_query($connection , $query);
$tampil = mysqli_fetch_assoc($data);


?>
    <!-- Bagian body HTML -->
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-warning"><i class="fa fa-hashtag me-2"></i>SIPELBA</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/<?php echo $tampil['foto']; ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                     <div class="ms-3">
                        <h6 class="mb-0"><?php echo $tampil['username']; ?></h6>
                        <span><?php echo $tampil['level']; ?></span>
                     </div> 
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-bar-chart-line-fill"></i>Rekapan Laporan</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="laporan_bencana.php" class="dropdown-item">Laporan Bencana</a>
                            <a href="laporan_bantuan.php" class="dropdown-item">Laporan Bantuan</a>
                            <a href="laporan_penanganan.php" class="dropdown-item">Laporan Penanganan</a>
                            <a href="laporan_harian.php" class="dropdown-item">Laporan Harian</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Input Laporan</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="form_bencana.php" class="dropdown-item">Laporan Bencana</a>
                            <a href="form_bantuan.php" class="dropdown-item">Laporan Bantuan</a>
                            <a href="form_penanganan.php" class="dropdown-item">Laporan Penanganan</a>
                            <a href="form_lapharian.php" class="dropdown-item">Laporan Harian</a>
                        </div>
                    </div>
                    
                    <?php 
                        if($_SESSION['level']=='Admin'){
                            ?>
                        <div class="nav-item dropdown">
                            <a href="kelola_akun.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-lines-fill"></i>Kelola Account</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="form_register.php" class="dropdown-item">Tambahkan User</a>
                                <a href="lihat_user.php" class="dropdown-item">Lihat User</a>
                                <a href="ganti_password.php" class="dropdown-item">Ganti Password</a>
                                <a href="logout.php" class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
                            </div>
                        </div>

                         <?php
                        } else if ($_SESSION['level']=='Operator'){
                           ?>
                              <div class="nav-item dropdown">
                            <a href="kelola_akun.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-lines-fill"></i>Kelola Account</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="form_register.php" class="dropdown-item">Tambahkan User</a>
                                <a href="lihat_user.php" class="dropdown-item">Lihat User</a>
                                <a href="ganti_password.php" class="dropdown-item">Ganti Password</a>
                                <a href="logout.php" class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
                            </div>
                        </div>     
                                   
                         <?php   
                        } else {

                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-warning mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/<?php echo $tampil['foto']; ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"> <?php echo $tampil['username']; ?> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="ganti_password.php" class="dropdown-item">Ganti Password</a>
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div> 
            </nav>
            <!-- Navbar End -->


        <?php
        include 'connection.php';
        
        $id_penanganan = '';    
        $jenis_kejadian = '';
        $tanggal = '';
        $waktu = '';
        $longtitude = '';
        $latitude = '';
        $rt = '';
        $rw = '';
        $dusun = '';
        $desa = '';
        $kecamatan = '';
        $kronologi = '';
        $dampak = '';
        $nama_korban = '';
        $jml_jiwa ='';
        $korban_lk = '';
        $korban_pr = '';
        $balita = '';
        $lansia = '';
        $hamil = '';
        $disabil = '';
        $rugi = '';
        $kebutuhan = '';
        $upaya = '';
        $kendala ='';
        $terlibat = '';
        $pelapor = '';
       

    if(isset($_GET['ubah'])){
        $id_penanganan = $_GET['ubah'];

        $query = "SELECT * FROM lap_penanganan WHERE id_penanganan = '$id_penanganan';";
        $sql= mysqli_query($connection, $query);

        $result = mysqli_fetch_assoc($sql);

        $jenis_kejadian = $result['jenis_kejadian'];
        $tanggal = $result['tanggal'];
        $waktu = $result['waktu'];
        $longtitude = $result['longtitude'];
        $latitude = $result['latitude'];
        $rt = $result['rt'];
        $rw = $result['rw'];
        $dusun = $result['dusun'];
        $desa = $result['desa'];
        $kecamatan = $result['kecamatan'];
        $kronologi = $result['kronologi'];
        $dampak = $result['dampak'];
        $nama_korban = $result['nama_korban'];
        $jml_jiwa =$result['jml_jiwa'];
        $korban_lk = $result['korban_lk'];
        $korban_pr = $result['korban_pr'];
        $balita = $result['balita'];
        $lansia = $result['lansia'];
        $hamil = $result['hamil'];
        $disabil = $result['disabil'];
        $rugi = $result['rugi'];
        $kebutuhan = $result['kebutuhan'];
        $upaya = $result['upaya'];
        $kendala =$result['kendala'];
        $terlibat = $result['terlibat'];
        $pelapor = $result['pelapor'];

    }
?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-50">
                        <div class="bg-light rounded h-100 p-4">

                        <form method="POST" action="aksi_penanganan.php" enctype="multipart/form-data">

                            <h2 class="mb-4">Penanganan Bencana</h2>

                            <input type="hidden" value="<?php echo $id_penanganan;?>" id="id_penanganan" name="id_penanganan">

                            <label for="jenis_kejadian" class="form-label">Jenis Bencana/ Kejadian</label>
                            <select class="form-select form-select-sm mb-3" id="jenis_kejadian" name="jenis_kejadian" aria-label=".form-select-sm example">
                                <option <?php if($jenis_kejadian == 'Tanah Longsor'){ echo "selected";} ?> value="Tanah Longsor">Tanah Longsor</option>
                                <option <?php if($jenis_kejadian == 'Banjir Luapan'){ echo "selected";} ?> value="Banjir Luapan">Banjir Luapan</option>
                                <option <?php if($jenis_kejadian == 'Tanah Ambles'){ echo "selected";} ?> value="Tanah Ambles">Tanah Ambles</option>
                                <option <?php if($jenis_kejadian == 'Angin Kencang'){ echo "selected";} ?> value="Angin Kencang">Angin Kencang</option>
                                <option <?php if($jenis_kejadian == 'Kebakaran Hutan'){ echo "selected";} ?> value="Kebakaran Hutan">Kebakaran Hutan</option>
                                <option <?php if($jenis_kejadian == 'Banjir Bandang'){ echo "selected";} ?> value="Banjir Bandang">Banjir Bandang</option>
                                <option <?php if($jenis_kejadian == 'Tanah Gerak'){ echo "selected";} ?> value="Tanah Gerak">Tanah Gerak</option>
                                <option <?php if($jenis_kejadian == 'Pohon Tumbang'){ echo "selected";} ?> value="Pohon Tumbang">Pohon Tumbang</option>
                                <option <?php if($jenis_kejadian == 'Kebakaran'){ echo "selected";} ?> value="Kebakaran">Kebakaran</option>
                                <option <?php if($jenis_kejadian == 'Rumah Tersambar Petir'){ echo "selected";} ?> value="Rumah Tersambar Petir">Rumah Tersambar Petir</option>
                                <option <?php if($jenis_kejadian == 'Atap Rumah Ambruk'){ echo "selected";} ?> value="Atap Rumah Ambruk">Atap Rumah Ambruk</option>
                            </select>
                             

                            <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Kejadian</label>
                                    <input type="date" value = "<?php echo $tanggal; ?>" class="form-control" id="tanggal" name="tanggal">
                            </div>

                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu Kejadian</label>
                                <input type="time" value = "<?php echo $waktu; ?>" class="form-control" id="waktu" name="waktu">
                            </div>

                            <button type="submit" class="btn btn-secondary"><i class="bi bi-geo-alt-fill"></i></button>
                            
                            <div class="bg-light rounded h-100 mt-2">
                                <iframe class="position-relative rounded w-100 h-200"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                                frameborder="0" style="border:0; height: 300px;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                            </div>

                            <div class="mb-3 form-check-inline">
                                <label for="longtitude" class="form-label">Longtitude</label>
                                <input type="text" class="form-control" id="longtitude" name="longtitude" value = "<?php echo $longtitude; ?>"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3 form-check-inline">
                                <label for="latitude" class="form-label">latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude"  value = "<?php echo $latitude; ?>"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="rt" class="form-label">RT</label>
                                <input type="Number" class="form-control" id="rt" name="rt" value = "<?php echo $rt; ?>"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="rw" class="form-label">RW</label>
                                <input type="Number" class="form-control" id="rw" name="rw" value = "<?php echo $rw; ?>"
                                    aria-describedby="emailHelp">
                            </div>

                            </select>
                            <label for="dusun" class="form-label">Dusun</label>
                            <input type="text" class="form-control" id="dusun" name="dusun" value = "<?php echo $dusun; ?>"
                                    aria-describedby="emailHelp">

                            <label for="desa" class="form-label">Desa</label>
                            <input type="text" class="form-control" id="desa" name="desa" value = "<?php echo $desa; ?>"
                                    aria-describedby="emailHelp">

                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value = "<?php echo $kecamatan; ?>"
                                    aria-describedby="emailHelp">

                            <label for="kronologi" class="form-label">Kronologi Kejadian</label>
                            <div class="form-floating">
                                <textarea class="form-control" value = "<?php echo $kronologi; ?>" placeholder="Leave a comment here"
                                    id="kronologi" name="kronologi" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Jelaskan Kronologi Kejadian</label>
                            </div>

                            <br><h5 class="mb-3">Dampak</h5>
                            <hr>
                            <div class="col-sm-10 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dampak"
                                                id="dampak" value="Rusak Ringan" checked>
                                            <label for="dampak" class="form-check-label" for="dampak">
                                                Rusak Ringan
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dampak"
                                                id="dampak" value="Rusak Sedang">
                                            <label for="dampak" class="form-check-label" for="dampak">
                                                Rusak Sedang
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dampak"
                                                id="dampak" value="Rusak Berat">
                                            <label for="dampak" class="form-check-label" for="dampak">
                                                Rusak Berat
                                            </label>
                                        </div>
                               </div>

                               <label for="nama_korban" class="form-label">Nama Korban</label>
                                <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                value = "<?php echo $nama_korban; ?>" id="nama_korban" name="nama_korban" style="height: 150px;"></textarea>
                                <label for="nama_korban">Masukan nama sesuai dengan KTP</label>
                                </div>

                               <div class="mb-3">
                                    <label for="jml_jiwa" class="form-label">Jumlah Jiwa</label>
                                    <input type="Number" value = "<?php echo $jml_jiwa; ?>" class="form-control" id="jml_jiwa" name="jml_jiwa"
                                        >
                                </div>
                                <div class="mb-3">
                                    <label for="korban_lk" class="form-label">Laki-Laki</label>
                                    <input type="Number" value = "<?php echo $korban_lk; ?>" class="form-control" id="korban_lk" name="korban_lk"
                                        >
                                </div>
                                <div class="mb-3">
                                    <label for="korban_pr" class="form-label">Perempuan</label>
                                    <input type="Number" value = "<?php echo $korban_pr; ?>" class="form-control" id="korban_pr" name="korban_pr"
                                        >
                                </div>
                            
                                <br><h5 class="mb-3">Kelompok Rentan</h5>
                                <hr>
                                <div class="mb-3">
                                    <label for="balita" class="form-label">Balita</label>
                                    <input type="Number" value = "<?php echo $balita; ?>" class="form-control" id="balita" name="balita"
                                       >
                                </div>
                                <div class="mb-3">
                                    <label for="lansia" class="form-label">Lansia</label>
                                    <input type="Number" value = "<?php echo $lansia; ?>" class="form-control" id="lansia" name="lansia"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="hamil" class="form-label">Wanita Hamil</label>
                                    <input type="Number"  value = "<?php echo $hamil; ?>" class="form-control" id="hamil" name="hamil"
                                        >
                                </div>
                                <div class="mb-3">
                                    <label for="disabil" class="form-label">Disabilitas</label>
                                    <input type="Number" value = "<?php echo $disabil; ?>" class="form-control" id="disabil" name="disabil"
                                        >
                                </div>

                                <br><h5 class="mb-3">Tafsiran Kerusakan</h5>
                                <hr>

                                <div class="mb-3">
                                <label for="rugi" class="form-label">Kerugian (Rp)</label>
                                <input type="number" value = "<?php echo $rugi; ?>" class="form-control" id="rugi" name="rugi">
                                 </div>

                                <label for="kebutuhan" class="form-label">Kebutuhan Mendesak</label>
                                <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="kebutuhan" value = "<?php echo $kebutuhan; ?>" name="kebutuhan" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Kebutuhan apa saja yang dibutuhkan</label>
                                </div>

                                <label for="upaya" class="form-label">Upaya Yang Dilakukan</label>
                                <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="upaya" value = "<?php echo $upaya; ?>" name="upaya" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Upaya apa saja yang dilakukan</label>
                                </div>

                                <label for="kendala" class="form-label">Kendala</label>
                                <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="kendala" value = "<?php echo $kendala; ?>" name="kendala" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Kendala apa saja yang dialami</label>
                                </div>

                                <label for="terlibat" class="form-label">Instansi Yang Terlibat</label>
                                <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="terlibat" value = "<?php echo $terlibat; ?>" name="terlibat" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Instansi apa saja yang terlibat</label>
                                 </div>

                                 <div class="mb-3">
                                <label for="dok_kejadian" class="form-label">Dokumentasi Kejadian</label>
                                <input class="form-control" type="file" id="dok_kejadian" name="dok_kejadian" multiple>
                                </div>
                                <div class="mb-3">
                                <label for="dok_ktp" class="form-label">Dokumentasi KTP</label>
                                <input class="form-control" type="file" id="dok_ktp" name="dok_ktp" multiple>
                                </div>
                                <div class="mb-3">
                                <label for="dok_kk" class="form-label">Dokumentasi KK</label>
                                <input class="form-control" type="file" id="dok_kk" name="dok_kk" multiple>
                                </div>

                                <br><h6 >Nama Pelapor</h6>
                                <div class="mb-3">
                                <input type="text" value = "<?php echo $pelapor; ?>" class="form-control" id="pelapor" name="pelapor">
                                <div id="pelapor" class="form-text">
                                </div>
                                </div>

                            <hr>
                            <?php 
                                if(isset($_GET['ubah'])){
                                ?>
                                    <button type="submit" name="aksi" value="ubah" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"  aria-hidden="true"></i>
                                        Simpan Perubahan
                                    </button>
                                <?php
                                } else {
                                ?>
                                     <button type="submit" name="aksi" value="tambah" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"  aria-hidden="true"></i>
                                        Simpan Data
                                    </button>
                                <?php
                                }
                                ?>

                                <a href="laporan_penanganan.php" type="button" class="btn btn-danger">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    Batal
                                </a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>