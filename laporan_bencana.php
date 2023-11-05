<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPELBA - Laporan Bencana</title>
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

            <!-- Table Start -->
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Data Laporan Bencana</h6>
                            
                        <form method="POST">
                            <div class="input-group mb-3">
                                <input type="text" name="cari" placeholder="Cari data"  class="form-control" >
                                <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
                                <button class="btn btn-danger" name="bcari" type="submit">Reset</button>
                            </div>
                        </form>

                            <div class="table-responsive">
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
                                            <th scope="col">Kerusakan</th>
                                            <th scope="col">jumlah korban</th>
                                            <th scope="col">laki-laki</th>
                                            <th scope="col">Perempuan</th>
                                            <th scope="col">Jumblah KK</th>
                                            <th scope="col">Kerusakan Fasilitas umum</th>
                                            <th scope="col">Kerusakan Infrastruktur</th>
                                            <th scope="col">Harta Benda</th>
                                            <th scope="col">Unit Usaha</th>
                                            <th scope="col">Kerugian</th>
                                            <th scope="col">Foto Kerusakan</th>
                                            <th scope="col">Nama-nama Korban</th>
                                            <th scope="col">Jumlah luka-luka</th>
                                            <th scope="col">Jumlah hilang</th>
                                            <th scope="col">Bantuan yang telah diberikan</th>
                                            <th scope="col">Foto Korban</th>
                                            <th scope="col">Petugas piket</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "connection.php";
                                        
                                        if (isset($_POST['bcari'])){

                                            $keyword = $_POST['cari'];
                                            $a = "SELECT * FROM lap_bencana WHERE tanggal like '%$keyword%' or alamat like '%$keyword%'
                                            order by id_bencana asc";
                                
                                        }else {
                                                $a="SELECT * from lap_bencana order by id_bencana asc";
                                        }

                                            $batas = 5;
                                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                            
                                            $data = mysqli_query($connection,"select * from lap_bencana");
                                            $jumlah_data = mysqli_num_rows($data);
                                            $total_halaman = ceil($jumlah_data / $batas);

                                            $previous = $halaman - 1;
                                            $next = $halaman + 1;
                                        
                                        
                                        
                                        $data_bencana = mysqli_query($connection,"select * from lap_bencana limit $halaman_awal, $batas");
                                        $nomor = $halaman_awal+1;
                                        
                                        // $b=$connection->query($a);
                                        while($c = mysqli_fetch_array($data_bencana)){  
                                        ?>
                                        <tr>
                                            <td><?php echo $nomor++ ?></td>
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
                                            <td>
                                                <img src="img/<?php echo $c['dok_kerusakan']; ?>" style="width: 50px">
                                            </td>
                                            <td><?php echo $c['nama_korban']; ?></td>
                                            <td><?php echo $c['jml_luka']; ?></td>
                                            <td><?php echo $c['jml_hilang']; ?></td>
                                            <td><?php echo $c['bantuan']; ?></td>
                                            <td>
                                            <img src="img/<?php echo $c['dok_korban']; ?>" style="width: 50px">
                                            </td>
                                            <td><?php echo $c['petugas']; ?></td>
                                            <td>
                                            
                                            <a href="form_bencana.php?ubah=<?php echo $c['id_bencana'] ?>" type="button" class="btn btn-warning" >
                                            <i class="bi bi-pencil"></i>
                                            </a>
                                            
                                            <?php 
                                                if($_SESSION['level']== 'Admin'){
                                                ?>
                                                    <a href="aksi_bencana.php?hapus=<?php echo $c['id_bencana'] ?>" type="button" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut ???')" >
                                                    <i class="bi bi-trash"></i>
                                                    </a>
                                                <?php
                                                }
                                            ?> 

                                            </td>
                                        </tr>
                                    
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>  
                            </div>
                        </div>
                    </div>

                                            <nav>
                                                <ul class="pagination justify-content-center">
                                                    <li class="page-item">
                                                        <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                                                    </li>
                                                    <?php 
                                                    for($x=1;$x<=$total_halaman;$x++){
                                                        ?> 
                                                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                                        <?php
                                                    }
                                                    ?>				
                                                    <li class="page-item">
                                                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                                    </li>
                                                </ul>
                                            </nav>

                    <?php
                        if ($_SESSION['level'] == 'Admin'){
                      ?>      
                        <a href="download_bencana.php" type="button" class="btn btn-warning"><i class="bi bi-cloud-arrow-down-fill"></i> Download Data</a>
                    <?php        
                        }else{
                            
                        }
                    ?>

                    
                </div>
            </div>
            <!-- Table End -->

          

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