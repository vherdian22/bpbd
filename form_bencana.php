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
        
        $id_bencana = '';    
        $tanggal = '';
        $waktu = '';
        $alamat = '';
        $rt = '';
        $rw = '';
        $dusun = '';
        $desa = '';
        $kecamatan = '';
        $longtitude = '';
        $latitude = '';
        $jenis_bencana = '';
        $kronologi = '';
        $dampak = '';
        $kerusakan = '';
        $korban_jiwa = '';
        $korban_lk = '';
        $korban_pr = '';
        $jml_kk = '';
        $fasum = '';
        $infra = '';
        $harta = '';
        $usaha = '';
        $kerugian = '';
        $dok_kerusakan = '';
        $nama_korban = '';
        $jml_luka = '';
        $jml_hilang = '';
        $bantuan = '';
        $dok_korban ='';
        $petugas = '';
       

    if(isset($_GET['ubah'])){
        $id_bencana = $_GET['ubah'];

        $query = "SELECT * FROM lap_bencana WHERE id_bencana = '$id_bencana';";
        $sql= mysqli_query($connection, $query);

        $result = mysqli_fetch_assoc($sql);

        $tanggal = $result['tanggal'];
        $waktu = $result['waktu'];
        $alamat = $result['alamat'];
        $rt = $result['rt'];
        $rw = $result['rw'];
        $dusun = $result['dusun'];
        $desa = $result['desa'];
        $kecamatan = $result['kecamatan'];
        $longtitude = $result['longtitude'];
        $latitude = $result['latitude'];
        $jenis_bencana = $result['jenis_bencana'];
        $kronologi = $result['kronologi'];
        $dampak = $result['dampak'];
        $kerusakan = $result['kerusakan'];
        $korban_jiwa = $result['korban_jiwa'];
        $korban_lk = $result['korban_lk'];
        $korban_pr = $result['korban_pr'];
        $jml_kk = $result['jml_kk'];
        $fasum = $result['fasum'];
        $infra = $result['infra'];
        $harta = $result['harta'];
        $usaha = $result['usaha'];
        $kerugian = $result['kerugian'];
        $dok_kerusakan = $result['dok_kerusakan'];
        $nama_korban = $result['nama_korban'];
        $jml_luka = $result['jml_luka'];
        $jml_hilang = $result['jml_hilang'];
        $bantuan = $result['bantuan'];
        $dok_korban =$result['dok_korban'];
        $petugas = $result['petugas'];

    }
?>

                

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-50">
                        <div class="bg-light rounded h-100 p-4">
                        <br><h2 class="mb-4">Laporan Bencana</h2>

                            <form method="POST" action="aksi_bencana.php" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo $id_bencana;?>" name="id_bencana" id="id_bencana">

                            <h6 class="mb-4">Waktu Terjadi Bencana</h6>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Kejadian</label>
                                <input type="date" value="<?php echo $tanggal; ?>" class="form-control" id="tanggal" name="tanggal"
                                    aria-describedby="emailHelp"> 
                            </div>
                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu Kejadian</label>
                                <input type="time" value="<?php echo $waktu; ?>" class="form-control" id="waktu" name="waktu"
                                    aria-describedby="emailHelp">
                            </div>
                            <h6 class="mb-4">Lokasi Kejadian</h6>
                            <label for="alamat" class="form-label">Alamat Lokasi Bencana</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="alamat" name="alamat" style="height: 150px;"><?php echo $alamat; ?></textarea>
                                <label for="floatingTextarea">exp: jl.moh.syafe'i no.1</label>
                            </div>
                            <div class="mb-3">
                                <label for="rt" class="form-label">RT</label>
                                <input type="number" value="<?php echo $rt; ?>" class="form-control" id="rt" name="rt"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="rw" class="form-label">RW</label>
                                <input type="number" value="<?php echo $rw; ?>" class="form-control" id="rw" name="rw"
                                    aria-describedby="emailHelp">
                            </div>
                            <label for="dusun" class="form-label">Dusun</label>
                            <input type="text" value="<?php echo $dusun; ?>" class="form-control" id="dusun" name="dusun"
                                    aria-describedby="emailHelp">

                            <label for="desa" class="form-label">Desa</label>
                            <input type="text" value="<?php echo $desa; ?>" class="form-control" id="desa" name="desa"
                                    aria-describedby="emailHelp">

                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" value="<?php echo $kecamatan; ?>" class="form-control" id="kecamatan" name="kecamatan"
                                    aria-describedby="emailHelp">
                            
                            

                            <div class="bg-light rounded h-100 mt-2">
                                <iframe class="position-relative rounded w-100 h-200"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                                frameborder="0" style="border:0; height: 300px;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                            </div>

                            <div class="mb-3 form-check-inline" id="lokasi">
                            <button class="btn btn-secondary" onclick ="GetLocation()"><i class="bi bi-geo-alt-fill"></i></button>                     
                            </div>

                            <div class="mb-3 form-check-inline">
                                <label for="longtitude" class="form-label">Longtitude</label>
                                <input type="text" value="<?php echo $longtitude; ?>" class="form-control" id="longtitude" name="longtitude"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3 form-check-inline">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" value="<?php echo $latitude; ?>" class="form-control" id="latitude" name="latitude"
                                    aria-describedby="emailHelp">
                            </div>

                            <br><h6 class="mb-4">Kejadian Musibah/ Bencana</h6>
                            <label for="jenis_bencana" class="form-label">Jenis Bencana/ Kejadian</label>
                            <select class="form-select form-select-sm mb-3" id="jenis_bencana" name="jenis_bencana" aria-label=".form-select-sm example">
                                <option selected>Pilih Jenis Bencana</option>
                                <option value="Tanah Longsor">Tanah Longsor</option>
                                <option value="Banjir Luapan">Banjir Luapan</option>
                                <option value="Tanah Ambles">Tanah Ambles</option>
                                <option value="Angin Kencang">Angin Kencang</option>
                                <option value="Karhutlah">Karhutlah</option>
                                <option value="Banjir Bandang">Banjir Bandang</option>
                                <option value="Tanah Gerak">Tanah Gerak</option>
                                <option value="Pohon Tumbang">Pohon Tumbang</option>
                                <option value="Kebakaran">Kebakaran</option>
                                <option value="Rumah Tersambar Petir">Rumah Tersambar Petir</option>
                                <option value="Atap Rumah Ambruk">Atap Rumah Ambruk</option>
                            </select>
                             
      
                            <label for="kronologi" class="form-label">Kronologi Kejadian</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="kronologi" name="kronologi" style="height: 150px;"><?php echo $kronologi; ?></textarea>
                                <label for="floatingTextarea">Jelaskan Kronologi Kejadian</label>
                            </div>
                            <br><h6 class="mb-4">Dampak</h6>
                                <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dampak"
                                                id="dampak" value="Rusak Ringan" checked>
                                            <label class="form-check-label" for="dampak">
                                                Rusak Ringan
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dampak"
                                                id="dampak" value="Rusak Sedang">
                                            <label class="form-check-label" for="dampak">
                                                Rusak Sedang
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dampak"
                                                id="dampak" value="Rusak Berat">
                                            <label class="form-check-label" for="dampak">
                                                Rusak Berat
                                            </label>
                                        </div>
                               </div>
                            <hr>
                            <label for="kerusakan" class="form-label">Kerusakan :</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="kerusakan" name="kerusakan" style="height: 150px;"><?php echo $kerusakan; ?></textarea>
                                <label for="floatingTextarea"></label>
                            </div>
                            <div class="mb-3">
                                <label for="korban_jiwa" class="form-label">Jumlah Korban Jiwa</label>
                                <input type="Number" value="<?php echo $korban_jiwa; ?>" class="form-control" id="korban_jiwa" name="korban_jiwa"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="korban_lk" class="form-label">Jumlah Korban Laki-laki</label>
                                <input type="Number" value="<?php echo $korban_lk; ?>" class="form-control" id="korban_lk" name="korban_lk"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="korban_pr" class="form-label">Jumlah Korban Perempuan</label>
                                <input type="Number" value="<?php echo $korban_pr; ?>" class="form-control" id="korban_pr" name="korban_pr"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="jml_kk" class="form-label">Jumlah KK terdampak</label>
                                <input type="Number" value="<?php echo $jml_kk; ?>" class="form-control" id="jml_kk" name="jml_kk"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="fasum" class="form-label">Kerusakan Fasilitas Umum</label>
                                <input type="text" value="<?php echo $fasum; ?>" class="form-control" id="fasum" name="fasum"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="infra" class="form-label">Kerusakan Infrastruktur</label>
                                <input type="text" value="<?php echo $infra; ?>" class="form-control" id="infra" name="infra"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="harta" class="form-label">Harta Benda</label>
                                <input type="text" value="<?php echo $harta; ?>" class="form-control" id="harta" name="harta"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="usaha" class="form-label">Unit Usaha</label>
                                <input type="text" value="<?php echo $usaha; ?>" class="form-control" id="usaha" name="usaha"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="kerugian" class="form-label">Kerugian (Rp)</label>
                                <input type="number" value="<?php echo $kerugian; ?>" class="form-control" id="kerugian" name="kerugian"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="dok_kerusakan" class="form-label">Dokumentasi Kerusakan Foto/Gambar</label>
                                <input class="form-control" value="<?php echo $dok_kerusakan; ?>" type="file" id="dok_kerusakan" name="dok_kerusakan" multiple>
                            </div>
                            <br><h6 class="mb-4">Korban</h6>
                            <label for="nama_korban" class="form-label">Nama-nama Korban terkena dampak</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="nama_korban" name="nama_korban" style="height: 150px;"><?php echo $nama_korban; ?></textarea>
                                <label for="floatingTextarea">Tuliskan nama-nama korban</label>
                            </div>
                            <div class="mb-3">
                                <label for="jml_luka" class="form-label">Jumlah Luka-luka</label>
                                <input type="number" value="<?php echo $jml_luka; ?>" class="form-control" id="jml_luka" name="jml_luka"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jml_hilang" class="form-label">Jumlah Hilang</label>
                                <input type="number" value="<?php echo $jml_hilang; ?>" class="form-control" id="jml_hilang" name="jml_hilang"
                                    aria-describedby="emailHelp">
                            </div>
                            <label for="bantuan" class="form-label">Keterangan Bantuan yang telah diberikan</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="bantuan" name="bantuan" style="height: 150px;"><?php echo $bantuan; ?></textarea>
                                <label for="floatingTextarea">Tuliskan bantuan yang diberikan</label>
                            </div>
                            <div class="mb-3">
                                <label for="dok_korban" class="form-label">Dokumentasi korban Foto/Gambar</label>
                                <input class="form-control" value="<?php echo $dok_korban; ?>" type="file" id="dok_korban" name="dok_korban" multiple>
                            </div>
                            <br><h6 class="mb-4">Petugas Piket</h6>
                            <div class="mb-3">
                                <label for="petugas" class="form-label">Nama Petugas Piket</label>
                                <input type="text" value="<?php echo $petugas; ?>" class="form-control" id="petugas" name="petugas"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                </div>
                            </div>

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
                                        Tambah Data
                                    </button>
                                <?php
                                }
                                ?>

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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Javascript location -->
                     

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>