<?php
session_start();

// Cek level user dan validasi jika sudah mengikuti tes sebelumnya
if (isset($_SESSION['pelamar'])) {
    $id_pelamar = $_SESSION['pelamar'];

    include "koneksi.php";

    // Cek apakah pengguna sudah pernah mengerjakan tes sebelumnya
    $query = "SELECT * FROM tbl_nilai WHERE id_pelamar='$id_pelamar'";
    $result = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($result);

    // Jika sudah pernah mengerjakan tes, arahkan ke halaman hasil ujian
    if ($num_rows > 0) {
        
        echo "<script>alert('Anda sudah pernah mengerjakan tes'); window.location='report.php?id_pelamar=$id_pelamar';</script>";
        exit; // Menghentikan eksekusi kode selanjutnya
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap4/css/custom.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background: transparent;">
    <div class="container" style="margin-top: 10px;">
        <h3>Selamat mengerjakan</h3>
        <b>Ujian Online Pilihan Ganda</b>
        <div>
            <table width="100%" border="0">
                <?php
                $query = "SELECT * FROM tbl_soal WHERE aktif='Y' ORDER BY RAND()";
                $hasil = mysqli_query($connect, $query);
                $jumlah = mysqli_num_rows($hasil);
                $urut = 0;
                while ($row = mysqli_fetch_array($hasil)) {
                    $id = $row["id_soal"];
                    $pertanyaan = $row["soal"];
                    $pilihan_a = $row["a"];
                    $pilihan_b = $row["b"];
                    $pilihan_c = $row["c"];
                    $pilihan_d = $row["d"];
                    echo "<form name='form1' method='post' action='hasil_ujian.php?id_pelamar=$id_pelamar'>";
                ?>
                    <input type="hidden" name="id[]" value="<?php echo $id; ?>">
                    <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                    <tr>
                        <td width="17"><font color="#000000"><strong><?php echo $urut = $urut + 1; ?></strong></font></td>
                        <td width="430"><font color="#000000"><strong><?php echo "$pertanyaan"; ?></strong></font></td>
                    </tr>
                    <tr>
                        <td height="21"><font color="#000000">&nbsp;</font></td>
                        <td><font color="#000000">
                                A. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A">
                                <?php echo "$pilihan_a"; ?></font> </td>
                    </tr>
                    <tr>
                        <td><font color="#000000">&nbsp;</font></td>
                        <td><font color="#000000">
                                B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B">
                                <?php echo "$pilihan_b"; ?></font> </td>
                    </tr>
                    <tr>
                        <td><font color="#000000">&nbsp;</font></td>
                        <td><font color="#000000">
                                C. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C">
                                <?php echo "$pilihan_c"; ?></font> </td>
                    </tr>
                    <tr>
                        <td><font color="#000000">&nbsp;</font></td>
                        <td><font color="#000000">
                                D. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D">
                                <?php echo "$pilihan_d"; ?></font> </td>
                    </tr>
                    <tr>
                        <td height="15"></td>
                    </tr>
                <?php
                }
               ?>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="btn btn-primary" name="submit" value="Selesai"></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>

<?php
} else {
    echo "<script>alert('Silahkan login terlebih dahulu');window.location='index.php'</script>";
}
?>