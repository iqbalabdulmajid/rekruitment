<?php
include 'koneksi.php';

if (isset($_GET['id_pelamar'])) {
    $id_pelamar = $_GET['id_pelamar'];
    $carihasil = mysqli_query($connect, "SELECT * FROM tbl_nilai WHERE id_pelamar='$id_pelamar'");
    $datahasil = mysqli_fetch_array($carihasil);

    if ($datahasil) {
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hasil Ujian</title>
            <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container" style="margin-top: 5%;">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h1>Hasil Ujian</h1>
                        <table class="table table-bordered">
                            <tr>
                                <td>ID PELAMAR</td>
                                <td>:</td>
                                <td><?php echo $datahasil['id_pelamar']; ?></td>
                            </tr>
                            <tr>
                                <td>Jawaban Benar</td>
                                <td>:</td>
                                <td><?php echo $datahasil['jawaban_benar']; ?></td>
                            </tr>
                            <tr>
                                <td>Jawaban Salah</td>
                                <td>:</td>
                                <td><?php echo $datahasil['jawaban_salah']; ?></td>
                            </tr>
                            <tr>
                                <td>Jawaban Kosong</td>
                                <td>:</td>
                                <td><?php echo $datahasil['jawaban_kosong']; ?></td>
                            </tr>
                            <tr>
                                <td>Nilai Akhir</td>
                                <td>:</td>
                                <td><?php echo $datahasil['score']; ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td><?php echo $datahasil['keterangan']; ?></td>
                            </tr>
                        </table>
                        <a href="ujian.php" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        </body>
        </html>

        <?php
    } else {
        echo "ID Pelamar tidak ditemukan.";
    }
} else {
    echo "ID Pelamar tidak disertakan dalam permintaan.";
}
?>
