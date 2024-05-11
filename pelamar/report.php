<?php
include 'koneksi.php';

if (isset($_GET['id_pelamar'])) {
    $id_pelamar = $_GET['id_pelamar'];
    $carihasil = mysqli_query($connect, "SELECT * FROM tbl_nilai WHERE id_pelamar='$id_pelamar'");
    $datahasil = mysqli_fetch_array($carihasil);

    if ($datahasil) {
        ?>

        <table border="0">
            <tr>
                <td>ID PELAMAR</td>
                <td width="20">:</td>
                <td><?php echo $datahasil['id_pelamar']; ?></td>
            </tr>

            <tr height="20">
                <td></td>
            </tr>

            <tr>
                <td>Jawaban Benar</td>
                <td>:</td>
                <td><?php echo $datahasil['jawaban_benar']; ?></td>
            </tr>

            <tr height="20">
                <td></td>
            </tr>

            <tr>
                <td>Jawaban Salah</td>
                <td>:</td>
                <td><?php echo $datahasil['jawaban_salah']; ?></td>
            </tr>

            <tr height="20">
                <td></td>
            </tr>

            <tr>
                <td>Jawaban Kosong</td>
                <td>:</td>
                <td><?php echo $datahasil['jawaban_kosong']; ?></td>
            </tr>

            <tr height="20">
                <td></td>
            </tr>

            <tr>
                <td>Nilai Akhir</td>
                <td>:</td>
                <td><?php echo $datahasil['score']; ?></td>
            </tr>

            <tr height="20">
                <td></td>
            </tr>

            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><?php echo $datahasil['keterangan']; ?></td>
            </tr>
        </table>

        <?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID Pelamar tidak ditemukan.";
}
?>