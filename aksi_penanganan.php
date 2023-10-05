
<?php
include "connection.php";

if(isset($_POST['aksi'])){
   if($_POST['aksi'] == "tambah"){

    $jenis_kejadian = $_POST['jenis_kejadian'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $longtitude = $_POST['longtitude'];
    $latitude = $_POST['latitude'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $dusun = $_POST['dusun'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kronologi = $_POST['kronologi'];
    $dampak = $_POST['dampak'];
    $nama_korban = $_POST['nama_korban'];
    $jml_jiwa = $_POST['jml_jiwa'];
    $korban_lk = $_POST['korban_lk'];
    $korban_pr = $_POST['korban_pr'];
    $balita = $_POST['balita'];
    $lansia = $_POST['lansia'];
    $hamil = $_POST['hamil'];
    $disabil = $_POST['disabil'];
    $rugi = $_POST['rugi'];
    $kebutuhan = $_POST['kebutuhan'];
    $upaya = $_POST['upaya'];
    $kendala = $_POST['kendala'];
    $terlibat = $_POST['terlibat'];
    $dok_kejadian = $_FILES['dok_kejadian']['name'];
    $dok_ktp = $_FILES['dok_ktp']['name'];
    $dok_kk = $_FILES['dok_kk']['name'];
    $pelapor = $_POST['pelapor'];

    $dir = "img/";

    $tmp1 = $_FILES['dok_kejadian']['tmp_name'];
    move_uploaded_file($tmp1, $dir.$dok_kejadian); 

    $tmp2 = $_FILES['dok_ktp']['tmp_name'];
    move_uploaded_file($tmp2, $dir.$dok_ktp); 

    $tmp3 = $_FILES['dok_kk']['tmp_name'];
    move_uploaded_file($tmp3, $dir.$dok_kk); 

    $sql=" INSERT INTO `lap_penanganan` (`jenis_kejadian`, `tanggal`, `waktu`,`longtitude`,`latitude`,`rt`,`rw`,`dusun`,`desa`,`kecamatan`,`kronologi`,`dampak`,`nama_korban`,`jml_jiwa`,`korban_lk`,`korban_pr`,`balita`,`lansia`,`hamil`,`disabil`,`rugi`,`kebutuhan`,`upaya`,`kendala`,`terlibat`,`dok_kejadian`,`dok_ktp`,`dok_kk`,`pelapor`) 
    VALUES ('$jenis_kejadian', '$tanggal', '$waktu', '$longtitude', '$latitude', '$rt', '$rw', '$dusun', '$desa', '$kecamatan', '$kronologi', '$dampak', '$nama_korban', '$jml_jiwa', '$korban_lk', '$korban_pr', '$balita','$lansia', '$hamil', '$disabil', '$rugi', '$kebutuhan', '$upaya', '$kendala', '$terlibat', '$dok_kejadian', '$dok_ktp', '$dok_kk', '$pelapor');";

    $a=$connection->query($sql);
    if($a === true){
        header('location: laporan_penanganan.php');
    }else{
        echo "erooooor";
    }

   
} else if($_POST['aksi'] == 'ubah'){

    $id_penanganan = $_POST['id_penanganan'];
    $jenis_kejadian = $_POST['jenis_kejadian'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $longtitude = $_POST['longtitude'];
    $latitude = $_POST['latitude'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $dusun = $_POST['dusun'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kronologi = $_POST['kronologi'];
    $dampak = $_POST['dampak'];
    $nama_korban = $_POST['nama_korban'];
    $jml_jiwa = $_POST['jml_jiwa'];
    $korban_lk = $_POST['korban_lk'];
    $korban_pr = $_POST['korban_pr'];
    $balita = $_POST['balita'];
    $lansia = $_POST['lansia'];
    $hamil = $_POST['hamil'];
    $disabil = $_POST['disabil'];
    $rugi = $_POST['rugi'];
    $kebutuhan = $_POST['kebutuhan'];
    $upaya = $_POST['upaya'];
    $kendala = $_POST['kendala'];
    $terlibat = $_POST['terlibat'];
    $pelapor = $_POST['pelapor'];

    $queryShow = "SELECT * FROM lap_penanganan WHERE id_penanganan  = '$id_penanganan ';";
    $sqlShow = mysqli_query($connection , $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if($_FILES['dok_kejadian']['name'] == ""){
        $dok_kejadian = $result['dok_kejadian'];
    }else{
        $dok_kejadian = $_FILES['dok_kejadian']['name'];
        unlink("img/kejadian".$result['dok_kejadian']);
        move_uploaded_file($_FILES['dok_kejadian']['tmp_name'], 'img/kejadian'.$_FILES['dok_kejadian']['name']); 
    }

    if($_FILES['dok_ktp']['name'] == ""){
        $dok_ktp = $result['dok_ktp'];
    }else{
        $dok_ktp = $_FILES['dok_ktp']['name'];
        unlink("img/ktp".$result['dok_ktp']);
        move_uploaded_file($_FILES['dok_ktp']['tmp_name'], 'img/ktp'.$_FILES['dok_ktp']['name']); 
    }

    if($_FILES['dok_kk']['name'] == ""){
        $dok_kk = $result['dok_kk'];
    }else{
        $dok_kk = $_FILES['dok_kk']['name'];
        unlink("img/kk".$result['dok_kk']);
        move_uploaded_file($_FILES['dok_kk']['tmp_name'], 'img/ktp'.$_FILES['dok_kk']['name']); 
    }

    $query = "UPDATE lap_penanganan SET jenis_kejadian = '$jenis_kejadian', tanggal = '$tanggal', waktu = '$waktu', longtitude = '$longtitude', latitude = '$latitude', 
    rt = '$rt', rw = '$rw', dusun = '$dusun', desa = '$desa', kecamatan = '$kecamatan', kronologi = '$kronologi', dampak = '$dampak', nama_korban = '$nama_korban', jml_jiwa = '$jml_jiwa', 
    korban_lk = '$korban_lk', korban_pr = '$korban_pr', balita = '$balita',lansia = '$lansia',hamil = '$hamil', disabil = '$disabil', rugi = '$rugi', kebutuhan = '$kebutuhan', 
    kebutuhan = '$kebutuhan', upaya = '$upaya', kendala = '$kendala',terlibat = '$terlibat',dok_kejadian = '$dok_kejadian',dok_ktp = '$dok_ktp',dok_kk = '$dok_kk',pelapor = '$pelapor' WHERE id_penanganan = '$id_penanganan';";
    $sql = mysqli_query ($connection, $query);

    if($sql === true){
         header('location: laporan_penanganan.php');
    }else{
        echo "erooooor";
    }
}

}

if(isset($_GET['hapus'])){
    $id_penanganan = $_GET['hapus'];

    $queryShow = "SELECT * FROM lap_penanganan WHERE id_penanganan  = '$id_penanganan ';";
    $sqlShow = $connection->query($queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/ktp".$result['dok_ktp']);
    unlink("img/kk".$result['dok_kk']);
    unlink("img/kejadian".$result['dok_kejadian']);

    $sql = "DELETE FROM lap_penanganan WHERE id_penanganan  = '$id_penanganan ';";
    $a = $connection->query($sql);
    if($a === true){
        // echo "Data berhasil dimasukkan ke dalam tabel input_laporan_bencana.";
        header('location: laporan_penanganan.php');
    }else{
        echo "erooooor";
    }
}

   
?>