

<?php
include "connection.php";

if(isset($_POST['aksi'])){
   if($_POST['aksi'] == "tambah"){

    $jenis_bencana = $_POST['jenis_bencana'];
    $kecamatan = $_POST['kecamatan'];
    $desa = $_POST['desa'];
    $dusun = $_POST['dusun'];
    $jml_kk = $_POST['jml_kk'];
    $usia = $_POST['usia'];
    $tanggal = $_POST['tanggal'];
    $bantuan = $_POST['bantuan'];
 
  
    $sql=" INSERT INTO `lap_bantuan` (`jenis_bencana`,`kecamatan`,`desa`,`dusun`,`jml_kk`,`usia`,`tanggal`,`bantuan`) VALUES ('$jenis_bencana','$kecamatan','$desa','$dusun','$jml_kk','$usia','$tanggal','$bantuan');";
    $a=$connection->query($sql);
    if($a === true){
        header('location: laporan_bantuan.php');
    }else{
        echo "erooooor";
    }

   
} else if($_POST['aksi'] == 'ubah'){
    $id_bantuan = $_POST['id_bantuan'];
    $jenis_bencana = $_POST['jenis_bencana'];
    $kecamatan = $_POST['kecamatan'];
    $desa = $_POST['desa'];
    $dusun = $_POST['dusun'];
    $jml_kk = $_POST['jml_kk'];
    $usia = $_POST['usia'];
    $tanggal = $_POST['tanggal'];
    $bantuan = $_POST['bantuan'];

    $queryShow = "SELECT * FROM lap_bantuan WHERE id_bantuan = '$id_bantuan';";
    $sqlShow = mysqli_query($connection , $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE lap_bantuan SET jenis_bencana = '$jenis_bencana', kecamatan = '$kecamatan', desa = '$desa', 
    dusun = '$dusun', jml_kk = '$jml_kk', usia = '$usia', tanggal = '$tanggal', bantuan = '$bantuan' WHERE id_bantuan = '$id_bantuan';";
    $sql = mysqli_query ($connection, $query);

    if($sql === true){
         header('location: laporan_bantuan.php');
    }else{
        echo "erooooor";
    }
}

}

if(isset($_GET['hapus'])){
    $id_bantuan = $_GET['hapus'];

    $queryShow = "SELECT * FROM lap_bantuan WHERE id_bantuan = '$id_bantuan';";
    $sqlShow = $connection->query($queryShow);
    $result = mysqli_fetch_assoc($sqlShow);


    $sql = "DELETE FROM lap_bantuan WHERE id_bantuan = '$id_bantuan';";
    $a = $connection->query($sql);
    if($a === true){
        // echo "Data berhasil dimasukkan ke dalam tabel input_laporan_bencana.";
        header('location: laporan_bantuan.php');
    }else{
        echo "erooooor";
    }
}

   
?>


