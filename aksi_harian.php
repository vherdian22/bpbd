
<?php
include "connection.php";

if(isset($_POST['aksi'])){
   if($_POST['aksi'] == "tambah"){

    $jenis_bencana = $_POST['jenis_bencana'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $korban = $_POST['korban'];
    $kerusakan = $_POST['kerusakan'];
    $rugi = $_POST['rugi'];
    $kronologi = $_POST['kronologi'];
    $penanganan = $_POST['penanganan'];
    $petugas = $_POST['petugas'];
    $dokumentasi = $_FILES['dokumentasi']['name'];


    $dir = "img/";
    $tmp = $_FILES['dokumentasi']['tmp_name'];
    move_uploaded_file($tmp, $dir.$dokumentasi); 
  
    $sql=" INSERT INTO `lap_harian` (`jenis_bencana`,`tanggal`,`waktu`,`korban`,`kerusakan`,`rugi`,`kronologi`,`penanganan`,`petugas`,`dokumentasi`) 
    VALUES ('$jenis_bencana', '$tanggal', '$waktu', '$korban', '$kerusakan', '$rugi', '$kronologi', '$penanganan', '$petugas', '$dokumentasi');";
    
    $a=$connection->query($sql);
    if($a === true){
        header('location: laporan_harian.php');
    }else{
        echo "erooooor";
    }


} else if($_POST['aksi'] == 'ubah'){

    $id_laporan = $_POST['id_laporan'];
    $jenis_bencana = $_POST['jenis_bencana'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $korban = $_POST['korban'];
    $kerusakan = $_POST['kerusakan'];
    $rugi = $_POST['rugi'];
    $kronologi = $_POST['kronologi'];
    $penanganan = $_POST['penanganan'];
    $petugas = $_POST['petugas'];

    $queryShow = "SELECT * FROM lap_harian WHERE id_laporan = '$id_laporan';";
    $sqlShow = mysqli_query($connection , $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if($_FILES['dokumentasi']['name'] == ""){
        $dokumentasi = $result['dokumentasi'];
    }else{
        $dokumentasi = $_FILES['dokumentasi']['name'];
        unlink("img/".$result['dokumentasi']);
        move_uploaded_file($_FILES['dokumentasi']['tmp_name'], 'img/'.$_FILES['dokumentasi']['name']); 
    }

    $query = "UPDATE `sipelda`.`lap_harian` SET `jenis_bencana`='$jenis_bencana', `tanggal`='$tanggal', `waktu`='$waktu', `korban`='$korban', 
    `kerusakan`='$kerusakan', `rugi`='$rugi', `kronologi`='$kronologi', `penanganan`='$penanganan', `petugas`='$petugas',dokumentasi = '$dokumentasi' WHERE  `id_laporan`= '$id_laporan';";
    $sql = mysqli_query ($connection, $query);

    if($sql === true){
        // echo "kuattt";
        header('location: laporan_harian.php');
    }else{
        echo "erooooor";
    }
}

}

if(isset($_GET['hapus'])){ 
    $id_laporan = $_GET['hapus'];

    $queryShow = "SELECT * FROM lap_harian WHERE id_laporan = '$id_laporan';";
    $sqlShow = $connection->query($queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/".$result['dokumentasi']);

    $sql = "DELETE FROM lap_harian WHERE id_laporan = '$id_laporan';";
    $a = $connection->query($sql);
    if($a === true){
        // echo "Data berhasil dimasukkan ke dalam tabel input_laporan_bencana.";
        header('location: laporan_harian.php');
    }else{
        echo "erooooor";
    }
}

   
?>

