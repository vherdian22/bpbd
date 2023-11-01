


<?php
include "connection.php";

if(isset($_POST['aksi'])){
   if($_POST['aksi'] == "tambah"){

    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $dusun = $_POST['dusun'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $longtitude = $_POST['longtitude'];
    $latitude = $_POST['latitude'];
    $jenis_bencana = $_POST['jenis_bencana'];
    $kronologi = $_POST['kronologi'];
    $dampak = $_POST['dampak'];
    $kerusakan = $_POST['kerusakan'];
    $korban_jiwa = $_POST['korban_jiwa'];
    $korban_lk = $_POST['korban_lk'];
    $korban_pr = $_POST['korban_pr'];
    $jml_kk = $_POST['jml_kk'];
    $fasum = $_POST['fasum'];
    $infra = $_POST['infra'];
    $harta = $_POST['harta'];
    $usaha = $_POST['usaha'];
    $kerugian = $_POST['kerugian'];
    $dok_kerusakan = $_FILES['dok_kerusakan'];
    $nama_korban = $_POST['nama_korban'];
    $jml_luka = $_POST['jml_luka'];
    $jml_hilang = $_POST['jml_hilang'];
    $bantuan = $_POST['bantuan'];
    $dok_korban = $_FILES['dok_korban'];
    $petugas = $_POST['petugas'];

    $dir = "img/";

    $tmp1 = $_FILES['dok_kerusakan']['tmp_name'];
    move_uploaded_file($tmp1, $dir.$dok_kerusakan);

    $tmp2 = $_FILES['dok_korban']['tmp_name'];
    move_uploaded_file($tmp2, $dir.$dok_korban); 
  
    $sql=" INSERT INTO `lap_bencana` (`tanggal`, `waktu`, `alamat`,`rt`,`rw`,`dusun`,`desa`,`kecamatan`,`longtitude`,`latitude`,`jenis_bencana`,`kronologi`,`dampak`,`kerusakan`,`korban_jiwa`,`korban_lk`,`korban_pr`,`jml_kk`,`fasum`,`infra`,`harta`,`usaha`,`kerugian`,`dok_kerusakan`,`nama_korban`,`jml_luka`,`jml_hilang`,`bantuan`,`dok_korban`,`petugas`) 
    VALUES ('$tanggal', '$waktu', '$alamat', '$rt', '$rw', '$dusun', '$desa', '$kecamatan', '$longtitude', '$latitude', '$jenis_bencana', '$kronologi', '$dampak', '$kerusakan', '$korban_jiwa', '$korban_lk', '$korban_pr', '$jml_kk', '$fasum', '$infra', '$harta', '$usaha', '$kerugian', '$dok_kerusakan', '$nama_korban', '$jml_luka', '$jml_hilang', '$bantuan', '$dok_korban', '$petugas');";

    $a=$connection->query($sql);
    if($a === true){
        header('location: laporan_bencana.php');
    }else{
        echo "erooooor";
    }

   
} else if($_POST['aksi'] == 'ubah'){
    $id_bencana = $_POST['id_bencana'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $dusun = $_POST['dusun'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $longtitude = $_POST['longtitude'];
    $latitude = $_POST['latitude'];
    $jenis_bencana = $_POST['jenis_bencana'];
    $kronologi = $_POST['kronologi'];
    $dampak = $_POST['dampak'];
    $kerusakan = $_POST['kerusakan'];
    $korban_jiwa = $_POST['korban_jiwa'];
    $korban_lk = $_POST['korban_lk'];
    $korban_pr = $_POST['korban_pr'];
    $jml_kk = $_POST['jml_kk'];
    $fasum = $_POST['fasum'];
    $infra = $_POST['infra'];
    $harta = $_POST['harta'];
    $usaha = $_POST['usaha'];
    $kerugian = $_POST['kerugian'];
    $nama_korban = $_POST['nama_korban'];
    $jml_luka = $_POST['jml_luka'];
    $jml_hilang = $_POST['jml_hilang'];
    $bantuan = $_POST['bantuan'];
    $petugas = $_POST['petugas'];

    $queryShow = "SELECT * FROM lap_bencana WHERE id_bencana = '$id_bencana';";
    $sqlShow = mysqli_query($connection , $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if($_FILES['dok_kerusakan']['name'] == ""){
        $dok_kerusakan = $result['dok_kerusakan'];
    }else{
        $dok_kerusakan = $_FILES['dok_kerusakan']['name'];
        unlink("img/".$result['dok_kerusakan']);
        move_uploaded_file($_FILES['dok_kerusakan']['tmp_name'], 'img/'.$_FILES['dok_kerusakan']['name']); 
    }

    if($_FILES['dok_korban']['name'] == ""){
        $dok_korban = $result['dok_korban'];
    }else{
        $dok_korban = $_FILES['dok_korban']['name'];
        unlink("img/".$result['dok_korban']);
        move_uploaded_file($_FILES['dok_korban']['tmp_name'], 'img/'.$_FILES['dok_korban']['name']); 
    }


    $query = "UPDATE lap_bencana SET tanggal = '$tanggal', waktu = '$waktu', alamat = '$alamat', rt = '$rt', rw = '$rw', dusun = '$dusun', desa = '$desa', kecamatan = '$kecamatan', longtitude = '$longtitude', latitude = '$latitude', jenis_bencana = '$jenis_bencana', kronologi = '$kronologi',
    dampak = '$dampak', kerusakan = '$kerusakan', korban_jiwa = '$korban_jiwa', korban_lk = '$korban_lk', korban_pr = '$korban_pr', jml_kk = '$jml_kk', fasum = '$fasum', infra = '$infra', harta = '$harta', usaha = '$usaha', kerugian = '$kerugian', dok_kerusakan = '$dok_kerusakan', 
    nama_korban = '$nama_korban', jml_luka = '$jml_luka', jml_hilang = '$jml_hilang', bantuan = '$bantuan', dok_korban = '$dok_korban', petugas = '$petugas' WHERE id_bencana = '$id_bencana';";
    $sql = mysqli_query ($connection, $query);

    if($sql === true){
         header('location: laporan_bencana.php');
    }else{
        echo "erooooor";
    }
}

}

if(isset($_GET['hapus'])){
    $id_bencana = $_GET['hapus'];

    $queryShow = "SELECT * FROM lap_bencana WHERE id_bencana = '$id_bencana';";
    $sqlShow = $connection->query($queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/".$result['dok_kerusakan']);
    unlink("img/".$result['dok_korban']);

    $sql = "DELETE FROM lap_bencana WHERE id_bencana = '$id_bencana';";
    $a = $connection->query($sql);
    if($a === true){
        // echo "Data berhasil dimasukkan ke dalam tabel input_laporan_bencana.";
        header('location: laporan_bencana.php');
    }else{
        echo "erooooor";
    }
}

   
?>

