<?php
session_start();
// Check user level
if (@$_SESSION['head_office']) {
    // Load file koneksi.php
    include "koneksi.php";

    // Query to fetch data from the database
    $sql = "SELECT * FROM karyawan";
    $result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karyawan Data</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap4/css/custom.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="../bootstrap4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../bootstrap4/css/dataTables.bootstrap4.min.css">

    <!-- jQuery and Datatables scripts -->
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>

<body style="background-color: transparent;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary float-right mb-3" onclick="window.location.href='add_karyawan.php'">
                    <i class="fa fa-plus"></i> Tambah Karyawan
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="employeeTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Karyawan</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Posisi</th>
                            <th>Tanggal Awal Kontrak</th>
                            <th>Tanggal Akhir Kontrak</th>
                            <th>Status Karyawan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_karyawan"] . "</td>";
                            echo "<td>" . $row["nik"] . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["alamat"] . "</td>";
                            echo "<td>" . $row["posisi"] . "</td>";
                            echo "<td>" . $row["tanggal_awal_kontrak"] . "</td>";
                            echo "<td>" . $row["tanggal_akhir_kontrak"] . "</td>";
                            echo "<td>" . $row["status_karyawan"] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Employee Modal -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add employee form goes here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery scripts -->
    <script src="../bootstrap4/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable();
        });
    </script>
</body>
</html>

<?php
} else {
    include "illegal.php";
}
?>