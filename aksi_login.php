<?php
session_start();
include "connection.php";

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE username='$username' AND password='$password'";
    $login = mysqli_query($connection, $sql);

    if(mysqli_num_rows($login) == 1){
        
        $data = mysqli_fetch_assoc($login);

        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['id_user'] = $data['id_user'];

        if($data['level'] == "Admin"){
            header("Location: dashboard.php?level=Admin");
        } elseif($data['level'] == "Operator"){
            header("Location: dashboard.php?level=Operator");
        } elseif($data['level'] == "Lapangan"){
            header("Location: dashboard.php?level=Lapangan");
        } else {
            die("Level tidak valid");
        }
    } else {
        die("Username atau password salah <a href=\"javascript:history.back()\">Kembali</a>");
    }
} else {
    die("Username atau password kosong <a href=\"javascript:history.back()\">Kembali</a>");
}
?>
