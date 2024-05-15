<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data id_pelamar yang dikirim oleh index.php melalui URL
$id_pelamar = $_GET['id_pelamar'];

// Menghapus data dari tabel tbl_nilai terlebih dahulu
$query1 = "DELETE FROM tbl_nilai WHERE id_pelamar='".$id_pelamar."'";
$sql1 = mysqli_query($connect, $query1);

// Jika sukses menghapus dari tbl_nilai, lanjutkan menghapus dari pelamar
if($sql1){
    $query2 = "DELETE FROM pelamar WHERE id_pelamar='".$id_pelamar."'";
    $sql2 = mysqli_query($connect, $query2);

    if($sql2){
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<script>window.location='view_plmr.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus dari pelamar')</script>";
        echo "<script>window.history.back();</script>";
    }
} else {
    echo "<script>alert('Data Gagal Dihapus dari tbl_nilai')</script>";
    echo "<script>window.history.back();</script>";
}
?>
