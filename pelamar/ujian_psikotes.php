<?php
session_start();

if (isset($_SESSION['pelamar'])) {
    include "koneksi.php";

    $query = "SELECT * FROM tbl_soal WHERE aktif='Y' ORDER BY RAND()";
    $hasil = mysqli_query($connect, $query);
    $jumlah = mysqli_num_rows($hasil);

    if ($jumlah > 0) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Ujian Online</title>
            <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
            <link rel="stylesheet" href="../bootstrap4/css/custom.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body>
            <div class="container" style="margin-top: 10px;">
                <h3>Selamat mengerjakan Ujian Online Pilihan Ganda</h3>
                <form name="form1" method="post" action="report.php">
                    <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                    <?php
                    while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                        <div class="question">
                            <p><?php echo $row['soal']; ?></p>
                            <input type="radio" name="pilihan[<?php echo $row['id_soal']; ?>]" value="A"> <?php echo $row['a']; ?><br>
                            <input type="radio" name="pilihan[<?php echo $row['id_soal']; ?>]" value="B"> <?php echo $row['b']; ?><br>
                            <input type="radio" name="pilihan[<?php echo $row['id_soal']; ?>]" value="C"> <?php echo $row['c']; ?><br>
                            <input type="radio" name="pilihan[<?php echo $row['id_soal']; ?>]" value="D"> <?php echo $row['d']; ?><br>
                        </div>
                        <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </form>
            </div>

            <script src="../bootstrap4/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
			</body>
        </html>
        <?php
    }
} else {
    echo "Anda harus login sebagai pelamar untuk mengakses halaman ini.";
}
?>