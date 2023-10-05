<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPELBA - Form Bantuan</title>
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


    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
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
        
        $id_bantuan = '';    
        $jenis_bencana = '';
        $kecamatan = '';
        $desa = '';
        $dusun ='';
        $jml_kk = '';
        $usia = '';
        $tanggal = '';
        $bantuan = '';
       

    if(isset($_GET['ubah'])){
        $id_bantuan = $_GET['ubah'];

        $query = "SELECT * FROM lap_bantuan WHERE id_bantuan = '$id_bantuan';";
        $sql= mysqli_query($connection, $query);

        $result = mysqli_fetch_assoc($sql);

        $jenis_bencana = $result['jenis_bencana'];
        $kecamatan = $result['kecamatan'];
        $desa = $result['desa'];
        $dusun = $result['dusun'];
        $jml_kk = $result['jml_kk'];
        $usia = $result['usia'];
        $tanggal = $result['tanggal'];
        $bantuan = $result['bantuan'];



    }
?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-50">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Form Pelaporan Bantuan</h6>

                            <form action="aksi_bantuan.php" method="POST" enctype="multipart/form-data">
                            
                            <input type="hidden" value="<?php echo $id_bantuan;?>" name="id_bantuan" id="id_bantuan">

                                <div class="mb-3">
                                    <label for="jenis_bencana" class="form-label">Jenis Bencana</label>
                                    <select class="form-select form-select-sm mb-3" id="jenis_bencana" name="jenis_bencana" aria-label=".form-select-sm example">
                                        <option selected>Pilih Jenis Bencana</option>
                                        <option <?php if($jenis_bencana == 'Tanah Longsor'){ echo "selected";} ?> value="Tanah Longsor">Tanah Longsor</option>
                                        <option <?php if($jenis_bencana == 'Banjir Luapan'){ echo "selected";} ?> value="Banjir Luapan">Banjir Luapan</option>
                                        <option <?php if($jenis_bencana == 'Tanah Ambles'){ echo "selected";} ?> value="Tanah Ambles">Tanah Ambles</option>
                                        <option <?php if($jenis_bencana == 'Angin Kencang'){ echo "selected";} ?> value="Angin Kencang">Angin Kencang</option>
                                        <option <?php if($jenis_bencana == 'Kebakaran Hutan'){ echo "selected";} ?> value="Kebakaran Hutan">Kebakaran Hutan</option>
                                        <option <?php if($jenis_bencana == 'Banjir Bandang'){ echo "selected";} ?> value="Banjir Bandang">Banjir Bandang</option>
                                        <option <?php if($jenis_bencana == 'Tanah Gerak'){ echo "selected";} ?> value="Tanah Gerak">Tanah Gerak</option>
                                        <option <?php if($jenis_bencana == 'Pohon Tumbang'){ echo "selected";} ?> value="Pohon Tumbang">Pohon Tumbang</option>
                                        <option <?php if($jenis_bencana == 'Kebakaran'){ echo "selected";} ?> value="Kebakaran">Kebakaran</option>
                                        <option <?php if($jenis_bencana == 'Rumah Tersambar Petir'){ echo "selected";} ?> value="Rumah Tersambar Petir">Rumah Tersambar Petir</option>
                                        <option <?php if($jenis_bencana == 'Atap Rumah Ambruk'){ echo "selected";} ?> value="Atap Rumah Ambruk">Atap Rumah Ambruk</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" value="<?php echo $kecamatan; ?>" class="form-control" id="kecamatan" name="kecamatan">
                                </div>
                                <div class="mb-3">
                                    <label for="desa" class="form-label">Desa</label>
                                    <input type="text" value="<?php echo $desa; ?>" class="form-control" id="desa" name="desa">
                                </div>
                                <div class="mb-3">
                                    <label for="desa" class="form-label">Dusun</label>
                                    <input type="text" value="<?php echo $dusun; ?>" class="form-control" id="dusun" name="dusun">
                                </div>
                                <div class="mb-3">
                                    <label for="jml_kk" class="form-label">Jumlah KK terdampak</label>
                                    <input type="text" value="<?php echo $jml_kk; ?>" class="form-control" id="jml_kk" name="jml_kk">
                                </div>
                                <div class="mb-3">
                                    <label for="jml_korban" class="form-label">Usia Terdampak</label>
                                    <input type="text" value="<?php echo $usia; ?>" class="form-control" id="usia" name="usia">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Diberikan pada tanggal</label>
                                    <input type="date" value="<?php echo $tanggal; ?>" class="form-control" id="tanggal" name="tanggal">
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" 
                                        id="bantuan" name="bantuan" style="height: 150px;"><?php echo $bantuan; ?></textarea>
                                    <label for="bantuan">Bantuan apa yang diberikan</label>
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
                                        Tambah Data
                                    </button>
                                <?php
                                }
                                ?>

                                <a href="laporan_bantuan.php" type="button" class="btn btn-danger">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    Batal
                                </a>
                            </form>
                        </div>
                    </div>
                    
            <!-- Form End -->


            
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
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