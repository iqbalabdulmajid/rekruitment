<?php
$host = "localhost"; // Nama hostnya
$username = "phpmyadmin"; // Username
$password = "root"; // Password (Isi jika menggunakan password)
$database = "db_SiRekTa_alia"; // Nama databasenya

$connect = mysqli_connect($host, $username, $password, $database); // Koneksi ke MySQL

if($connect){
    
}else{
    echo "koneksi gagal";
}
?>
