<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['pelamar'])) {
    $id_pelamar = $_SESSION['pelamar'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inisialisasi variabel jawaban benar, salah, dan kosong
        $jawaban_benar = 0;
        $jawaban_salah = 0;
        $jawaban_kosong = 0;

        foreach ($_POST['pilihan'] as $id_soal => $jawaban) {
            $query_soal = "SELECT * FROM tbl_soal WHERE id_soal = '$id_soal'";
            $hasil_soal = mysqli_query($connect, $query_soal);

            if (mysqli_num_rows($hasil_soal) > 0) {
                $data_soal = mysqli_fetch_assoc($hasil_soal);

                if ($jawaban == $data_soal['knc_jawaban']) {
                    $jawaban_benar++;
                } else if ($jawaban != '') {
                    $jawaban_salah++;
                } else {
                    $jawaban_kosong++;
                }
            } else {
                echo "Terjadi kesalahan dalam mendapatkan data soal.";
                exit();
            }
        }

        $total_score = $jawaban_benar * 10; // Anggap setiap jawaban benar bernilai 10

        $update_query = "UPDATE tbl_nilai SET jawaban_benar = '$jawaban_benar', jawaban_salah = '$jawaban_salah', jawaban_kosong = '$jawaban_kosong', score = '$total_score' WHERE id_pelamar = '$id_pelamar'";
        $result_update = mysqli_query($connect, $update_query);

        if ($result_update) {
            $status = '';
            if ($total_score >= 70) {
                $status = 'Lulus'; // Ubah sesuai dengan kriteria kelulusan yang diinginkan
            } else {
                $status = 'Tidak Lulus';
            }

            $update_status_query = "UPDATE tbl_nilai SET keterangan = '$status' WHERE id_pelamar = '$id_pelamar'";
            $result_status_update = mysqli_query($connect, $update_status_query);

            if ($result_status_update) {
                // $keterangan_soal = $data_soal['keterangan']; // Menambahkan variabel keterangan_soal
                echo "Status Anda telah diubah menjadi $status.<br>";
                echo "Jawaban Benar: $jawaban_benar<br>";
                echo "Jawaban Salah: $jawaban_salah<br>";
                echo "Jawaban Kosong: $jawaban_kosong<br>";
                echo "Status: $status<br>";
            } else {
                echo "Terjadi kesalahan dalam mengubah status: " . mysqli_error($connect);
            }
        } else {
            echo "Terjadi kesalahan dalam mengupdate hasil ujian: " . mysqli_error($connect);
        }
    }
} else {
    echo "Anda harus login sebagai pelamar untuk mengakses halaman ini.";
}
?>
