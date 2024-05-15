<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID Admin yang dikirim oleh form_ubah.php melalui URL
$id_pelamar = $_GET['id_pelamar'];

// Ambil Data yang Dikirim dari Form
$tgl_wwcr	= $_POST['tgl_wwcr'];
$keterangan	= $_POST['keterangan'];

$update = "UPDATE master_pelamar SET keterangan = '$keterangan' WHERE id_pelamar = '".$id_pelamar."'";
$result = mysqli_query($connect, $update);

if ($update) {
    // Proses upload
    // Query untuk menampilkan data econtract berdasarkan nik yang dikirim
    $query = "SELECT * FROM pelamar WHERE id_pelamar='".$id_pelamar."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // If successful, proceed to update fisik table
    $query = "UPDATE pelamar SET 
    tgl_wwcr		='".$tgl_wwcr."'

    WHERE
    id_pelamar    ='".$id_pelamar."'";
    $sql = mysqli_query($connect, $query);

    // Check if fisik table update was successful
    if ($sql) {
    // If both updates were successful, display success message
        echo "<script>alert('Data Berhasil Terupdate')</script>";
        echo "<script>window.location='wwcr.php';</script>";
    } else {
    // If fisik table update failed, display error message
        echo "<script>alert('Gagal menyimpan ke database')</script>";
        echo "<script>window.history.back();</script>";
    }
} else {
    // If pelamar table update failed, display error message
    echo "<script>alert('Gagal Memperbarui Data Master Pelamar')</script>";
    echo "<script>window.history.back();</script>";
  }
?>

