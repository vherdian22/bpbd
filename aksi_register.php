<?php
include "connection.php";

if(isset($_POST['aksi'])){
   if($_POST['aksi'] == "tambah"){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $foto = $_FILES['foto']['name'];

    $dir = "img/";
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, $dir.$foto); 
  
    $sql="INSERT INTO `register` (`username`, `password`, `level`, `email`,`foto`) VALUES ('$username','$password','$level','$email','$foto');";
    $a=$connection->query($sql);
    if($a === true){
        header('location: lihat_user.php');
    }else{
        echo "erooooor";
    }

   
} else if($_POST['aksi'] == 'ubah'){
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $email = $_POST['email'];

    $queryShow = "SELECT * FROM register WHERE id_user = '$id_user';";
    $sqlShow = mysqli_query($connection , $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if($_FILES['foto']['name'] == ""){
        $foto = $result['foto'];
    }else{
        $foto = $_FILES['foto']['name'];
        unlink("img/".$result['foto']);
        move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$_FILES['foto']['name']); 
    }

    $query = "UPDATE register SET username = '$username', password = '$password', level = '$level', 
    email = '$email', foto = '$foto' WHERE id_user = '$id_user';";
    $sql = mysqli_query ($connection, $query);

    if($sql === true){
         header('location: lihat_user.php');
    }else{
        echo "erooooor";
    }
}

}

if(isset($_GET['hapus'])){
    $id_user = $_GET['hapus'];

    $queryShow = "SELECT * FROM register WHERE id_user = '$id_user';";
    $sqlShow = $connection->query($queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/".$result['foto']);

    $sql = "DELETE FROM register WHERE id_user = '$id_user';";
    $a = $connection->query($sql);
    if($a === true){
        // echo "Data berhasil dimasukkan ke dalam tabel input_laporan_bencana.";
        header('location: lihat_user.php');
    }else{
        echo "erooooor";
    }
}

   
?>

