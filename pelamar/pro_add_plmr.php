<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID Admin yang dikirim
$id_pelamar = $_GET['id_pelamar'];
$posisi_pekerjaan = filter_input(INPUT_POST, 'posisi_pekerjaan', FILTER_SANITIZE_STRING);
$lokasi_seleksi = filter_input(INPUT_POST, 'lokasi_seleksi', FILTER_SANITIZE_STRING);

// Ambil Data yang Dikirim dari Form
$nama             = $_POST['nama'];
$jekel            = $_POST['jekel'];
$tempat_lhr       = $_POST['tempat_lhr'];
$tgl_lhr          = $_POST['tgl_lhr'];
$alamat           = $_POST['alamat'];
$kodepos          = $_POST['kodepos'];
$kota             = $_POST['kota'];
$no_tlp           = $_POST['no_tlp'];
$no_hp            = $_POST['no_hp'];
$ktp              = $_POST['ktp'];
$negara           = $_POST['negara'];
$agama            = $_POST['agama'];
$hobi             = $_POST['hobi'];
$alamat_ortu      = $_POST['alamat_ortu'];
$kodepos_ortu     = $_POST['kodepos_ortu'];
$kota_ortu        = $_POST['kota_ortu'];
$status           = $_POST['status'];
$jml_anak         = $_POST['jml_anak'];
$nm_kel           = $_POST['nm_kel'];
$hubungan         = $_POST['hubungan'];
$alamat_kel       = $_POST['alamat_kel'];
$no_kel           = $_POST['no_kel'];
$pendidikan       = $_POST['pendidikan'];
$nm_sekolah       = $_POST['nm_sekolah'];
$jurusan          = $_POST['jurusan'];
$tgl_mulai        = $_POST['tgl_mulai'];
$tgl_selesai      = $_POST['tgl_selesai'];
$nilai            = $_POST['nilai'];
$organisasi       = $_POST['organisasi'];
$jabatan          = $_POST['jabatan'];
$periode_org      = $_POST['periode_org'];
$nm_kursus        = $_POST['nm_kursus'];
$tahun            = $_POST['tahun'];
$penyelenggara    = $_POST['penyelenggara'];
$peringkat        = $_POST['peringkat'];
$bahasa           = $_POST['bahasa'];
$dengar           = $_POST['dengar'];
$baca             = $_POST['baca'];
$bicara           = $_POST['bicara'];
$tulis            = $_POST['tulis'];
$nm_pt            = $_POST['nm_pt'];
$tgl_awal = isset($_POST['tgl_awal']) ? $_POST['tgl_awal'] : null;
$tgl_akhir = isset($_POST['tgl_akhir']) ? $_POST['tgl_akhir'] : null;
$almt_pt          = $_POST['almt_pt'];
$tlp_pt           = $_POST['tlp_pt'];
$jabat_awal       = $_POST['jabat_awal'];
$jabat_akhir      = $_POST['jabat_akhir'];
$nm_atasan        = $_POST['nm_atasan'];
$alasan           = $_POST['alasan'];
$gaji             = $_POST['gaji'];

$update = "UPDATE pelamar SET posisi_pekerjaan = '$posisi_pekerjaan', lokasi_seleksi='$lokasi_seleksi' WHERE id_pelamar = '".$id_pelamar."'";
$result = mysqli_query($connect, $update);

if ($update) {
    // Proses upload
    // Query untuk menampilkan data econtract berdasarkan nik yang dikirim
    $query = "SELECT * FROM pelamar where id_pelamar='".$id_pelamar."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // If successful, proceed to update fisik table
    $query = "UPDATE pelamar SET 
    nama             ='".$nama."', 
    jekel            ='".$jekel."',
    tempat_lhr       ='".$tempat_lhr."', 
    tgl_lhr          ='".$tgl_lhr."', 
    alamat           ='".$alamat."', 
    kodepos          ='".$kodepos."', 
    kota             ='".$kota."', 
    no_tlp           ='".$no_tlp."', 
    no_hp            ='".$no_hp."', 
    ktp              ='".$ktp."',
    negara           ='".$negara."', 
    agama            ='".$agama."', 
    hobi             ='".$hobi."',  
    alamat_ortu      ='".$alamat_ortu."',
    kodepos_ortu     ='".$kodepos_ortu."', 
    kota_ortu        ='".$kota_ortu."', 
    status           ='".$status."', 
    jml_anak         ='".$jml_anak."', 
    nm_kel           ='".$nm_kel."', 
    hubungan         ='".$hubungan."', 
    alamat_kel       ='".$alamat_kel."',
    no_kel           ='".$no_kel."',  
    pendidikan       ='".$pendidikan."',  
    nm_sekolah       ='".$nm_sekolah."', 
    jurusan          ='".$jurusan."', 
    tgl_mulai        ='".$tgl_mulai."', 
    tgl_selesai      ='".$tgl_selesai."', 
    nilai            ='".$nilai."', 
    organisasi       ='".$organisasi."', 
    jabatan          ='".$jabatan."', 
    periode_org      ='".$periode_org."', 
    nm_kursus        ='".$nm_kursus."', 
    tahun            ='".$tahun."', 
    penyelenggara    ='".$penyelenggara."', 
    peringkat        ='".$peringkat."', 
    bahasa           ='".$bahasa."', 
    dengar           ='".$dengar."', 
    baca             ='".$baca."', 
    bicara           ='".$bicara."', 
    tulis            ='".$tulis."', 
    nm_pt            ='".$nm_pt."', 
    tgl_awal         ='".$tgl_awal."', 
    tgl_akhir        ='".$tgl_akhir."', 
    almt_pt          ='".$almt_pt."', 
    tlp_pt           ='".$tlp_pt."', 
    jabat_awal       ='".$jabat_awal."', 
    jabat_akhir      ='".$jabat_akhir."',
    nm_atasan        ='".$nm_atasan."', 
    alasan           ='".$alasan."', 
    gaji             ='".$gaji."'
    
    where
    id_pelamar       = '".$id_pelamar."'";
    $sql = mysqli_query($connect, $query);

    // Check if fisik table update was successful
    if ($sql) {
    // If both updates were successful, display success message
        echo "<script>alert('Data Berhasil Terupdate')</script>";
        header("location: add_berkas.php?id_pelamar=$id_pelamar");
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