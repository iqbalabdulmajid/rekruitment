<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID Admin yang dikirim oleh form_ubah.php melalui URL
$nik = $_GET['nik'];

// Ambil Data yang Dikirim dari Form
$soal1 			= $_POST['soal1'];
$soal2 			= $_POST['soal2'];
$soal3		    = $_POST['soal3'];
$soal4		    = $_POST['soal4'];
$soal5			= $_POST['soal5'];
$soal6			= $_POST['soal6'];
$masa_kerja		= $_POST['masa_kerja'];
$mulai_kontrak	= $_POST['mulai_kontrak'];
$akhir_kontrak	= $_POST['akhir_kontrak'];
$status_pegawai	= $_POST['status_pegawai'];

$update = "UPDATE pelamar SET status_pegawai = '$status_pegawai' WHERE nik = '".$nik."'";
$result = mysqli_query($connect, $update);

if ($update) {
// Proses upload
		// Query untuk menampilkan data econtract berdasarkan nik yang dikirim
		$query = "SELECT * FROM econtract WHERE nik='".$nik."'";
		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql


		// Proses ubah data ke Database
     $query           = "UPDATE econtract SET 
     soal1			    ='".$soal1."',
     soal2			    ='".$soal2."',
     soal3		        ='".$soal3."',
     soal4		        ='".$soal4."',
     soal5			    ='".$soal5."',
     soal6			    ='".$soal6."',
     masa_kerja		='".$masa_kerja."',
     mulai_kontrak	='".$mulai_kontrak."',
     akhir_kontrak	='".$akhir_kontrak."',
     status_pegawai	='".$status_pegawai."'

     WHERE
     	 nik    ='".$nik."'";
		$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
		    echo "<script>alert('Data Berhasil Terupdate')</script>";
			echo "<script>window.location='e-contract.php';</script>";
		}else{
			// Jika Gagal, Lakukan :
			echo "<script>alert('Gagal menyimpan ke database')</script>";
			echo "<script>window.history.back();</script>";
		}
} else {
	// If pelamar table update failed, display error message
	echo "<script>alert('Gagal Memperbarui Data Pelamar')</script>";
	echo "<script>window.history.back();</script>";
}
?>

