<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPELBA - Lihat User</title>
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
                            <h6 class="mb-4">Kelola Account</h6>
                            
                    <div class="container">
    <div class="add-button">
            <!-- <a href="akun.php">Kembali</a> -->
        </div>
        <br>
        <h2>Lihat User</h2>
        <form method="POST">
            <div class="input-group mb-3">
                <input type="text" name="cari" placeholder="Cari user"  class="form-control" >
                <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
                <button class="btn btn-danger" name="bcari" type="submit">Reset</button>
            </div>
        </form>
        <!-- Search Bar -->
        
        <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Level</th>
                    <th scope="col">Email</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $nomor = 0;
                    include "connection.php";
                    if (isset($_POST['bcari'])){

                        $keyword = $_POST['cari'];
                        $a = "SELECT * FROM register WHERE username like '%$keyword%' or email like '%$keyword%'
                        order by id_user asc";
            
                        }else {
                            $a="SELECT * from register order by id_user asc";
                        }
                    
                    $b=$connection->query($a);
                    while($c=$b->fetch_array()){ $nomor++; ?> 
                     <tr>
                        <td><?php echo $nomor ?></td>
                        <td><?php echo $c['username']; ?></td>
                        <td><?php echo $c['password']; ?></td>
                        <td><?php echo $c['level']; ?></td>
                        <td><?php echo $c['email']; ?></td>
                        <td>
                            <img src="img/<?php echo $c['foto']; ?>" style="width: 50px" >
                        </td>
                       
                        <td>
                        
                        <a href="form_register.php?ubah=<?php echo $c['id_user'] ?>" type="button" class="btn btn-warning btn-sm" onClick="return confirm('Apakah anda yakin ingin mengubah data tersebut ???')">
                        <i class="bi bi-pencil"></i>
                        </a>

                        <a href="aksi_register.php?hapus=<?php echo $c['id_user'] ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut ???')">
                        <i class="fa fa-trash"></i>
                        </a>

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
    </div>

    
                            <!-- <button type="submit" class="btn btn-warning"><i class="bi bi-plus-circle"></i> Tambah Account</button> -->
                        </div>
                    </div>
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