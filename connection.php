<?php
// Konfigurasi database
$servername = "localhost"; // Ganti dengan nama server database Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$dbname = "sipelda"; // Ganti dengan nama database Anda

// Buat koneksi
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Periksa koneksi
if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
