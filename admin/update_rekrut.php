<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID Admin yang dikirim oleh form_ubah.php melalui URL
$id_pelamar = $_GET['id_pelamar'];

// Ambil Data yang Dikirim dari Form
$keterangan 			= $_POST['keterangan'];


// Proses upload
		// Query untuk menampilkan data master_pelamar berdasarkan id_pelamar yang dikirim
		$query = "SELECT * FROM tbl_nilai WHERE id_pelamar='".$id_pelamar."'";
		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql


		// Proses ubah data ke Database
     $query           = "UPDATE tbl_nilai SET 
     keterangan	='".$keterangan."'

     WHERE
     	 id_pelamar    ='".$id_pelamar."'";
		$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
		    echo "<script>alert('Data Berhasil Terupdate')</script>";
            echo "<script>window.location='plmr.php';</script>";
		}else{
			// Jika Gagal, Lakukan :
			echo "<script>alert('Gagal menyimpan ke database')</script>";
			echo "<script>window.history.back();</script>";
		}

?>

