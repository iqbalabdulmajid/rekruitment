<?php
session_start();

// Check user level
if(@$_SESSION['head_office']){
    // Database connection details
    include "koneksi.php";
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $posisi = $_POST['posisi'];
        $tanggal_awal_kontrak = $_POST['tanggal_awal_kontrak'];
        $tanggal_akhir_kontrak = $_POST['tanggal_akhir_kontrak'];
        $status_karyawan = $_POST['status_karyawan'];

        // Prepare and execute SQL query to insert data
        $sql = "INSERT INTO karyawan (nik, nama, alamat, posisi, tanggal_awal_kontrak, tanggal_akhir_kontrak, status_karyawan) 
                VALUES ('$nik', '$nama', '$alamat', '$posisi', '$tanggal_awal_kontrak', '$tanggal_akhir_kontrak', '$status_karyawan')";

        if ($connect->query($sql) === TRUE) {
            echo "New employee added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Karyawan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Tambah Karyawan</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="posisi">Posisi</label>
                <input type="text" class="form-control" id="posisi" name="posisi" required>
            </div>
            <div class="form-group">
                <label for="tanggal_awal_kontrak">Tanggal Awal Kontrak</label>
                <input type="datetime-local" class="form-control" id="tanggal_awal_kontrak" name="tanggal_awal_kontrak" required>
            </div>
            <div class="form-group">
                <label for="tanggal_akhir_kontrak">Tanggal Akhir Kontrak</label>
                <input type="date" class="form-control" id="tanggal_akhir_kontrak" name="tanggal_akhir_kontrak" required>
            </div>
            <div class="form-group">
                <label for="status_karyawan">Status Karyawan</label>
                <input type="text" class="form-control" id="status_karyawan" name="status_karyawan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="../bootstrap4/js/bootstrap.min.js"></script>
</body>
</html>

<?php
} else {
    include "illegal.php";
}
?>