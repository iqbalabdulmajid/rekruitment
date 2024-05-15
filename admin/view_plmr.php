<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['admin'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap4/css/custom.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

</head>

<body>
<div class="container">
    <h1 align="center">Data Pelamar</h1>
    <hr>

    <!-- Filter Form -->
<form method="GET" action="">
    <div class="form-group">
        <label for="ket">Filter Keterangan:</label>
        <select class="form-control" id="ket" name="ket">
            <option value="1" <?php if (!isset($_GET['ket']) || (isset($_GET['ket']) && $_GET['ket'] == '1')) echo 'selected'; ?>>Tampilkan Semua</option>
            <option value="2" <?php if (isset($_GET['ket']) && $_GET['ket'] == '2') echo 'selected'; ?>>Lulus</option>
            <option value="3" <?php if (isset($_GET['ket']) && $_GET['ket'] == '3') echo 'selected'; ?>>Tidak Lulus</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-bottom:20px;">Filter</button>
</form>

    <!-- Data Table -->
    <table id="example" class="table table-responsive table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>No</th>
            <th>No. Pendaftaran</th>
            <th>Posisi Pekerjaan</th>
            <th>Lokasi Seleksi</th>
            <th>Nama Lengkap</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Set default filter
        $filter_keterangan = "";

        // Check if filter is applied
        if (isset($_GET['ket'])) {
            $filter_keterangan = $_GET['ket'];
        }

        $query = "SELECT * FROM master_pelamar WHERE 1";

        // Apply filter if any
        if ($filter_keterangan != "") {
            if ($filter_keterangan == "1") {
                // Tampilkan semua
                $query .= " AND keterangan != ''";
            } elseif ($filter_keterangan == "2") {
                // Tampilkan yang lulus
                $query .= " AND keterangan = 'Lulus'";
            } elseif ($filter_keterangan == "3") {
                // Tampilkan yang tidak lulus
                $query .= " AND keterangan = 'Tidak Lulus'";
            }
        }

        $sql = mysqli_query($connect, $query);

        $no = 1;
        while ($data = mysqli_fetch_array($sql)) {
            echo "<tr scope='row'>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $data['id_pelamar'] . "</td>";
            echo "<td>" . $data['posisi_pekerjaan'] . "</td>";
            echo "<td>" . $data['lokasi_seleksi'] . "</td>";
            echo "<td>" . $data['nama'] . "</td>";
            echo "<td>" . $data['keterangan'] . "</td>";
            echo "<td>
                <a href='edit.php?id=" . $data['id_pelamar'] . "' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i> Edit</a>
                <a href='hapus.php?id=" . $data['id_pelamar'] . "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Hapus</a>
            </td>";
            echo "</tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>

    <!-- Bootstrap and DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</div>
</body>
</html>

<?php
} else {
    include "illegal.php";
}
?>