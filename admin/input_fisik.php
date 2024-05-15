<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap4/css/custom.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- datatables -->
    <link rel="stylesheet" href="../bootstrap4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../bootstrap4/css/dataTables.bootstrap4.min.css">




<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.0/css/responsive.bootstrap4.min.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap4.min.js"></script> -->

  </head>

<div class="container">

  <body style="background-color: transparent;">

  <?php
    // Load file koneksi.php
    include "koneksi.php";
    
    // Ambil data id_pelamar yang dikirim oleh index.php melalui URL
    $id_pelamar = $_GET['id_pelamar'];
    
    // Query untuk menampilkan data pelamar berdasarkan ID pelamar yang dikirim
    $query = "SELECT p.id_pelamar, p.nama, p.posisi_pekerjaan, p.keterangan, f.jarak_lari, f.jumlah_push_up, f.jumlah_sit_up
                FROM master_pelamar p
                LEFT JOIN fisik f ON p.id_pelamar = f.id_pelamar WHERE p.id_pelamar='".$id_pelamar."'";
    $sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    ?>

        <h1 align="center">Data Tes Fisik</h1>
        <hr>
         <!--tabel-->
            <div class="row">
                <div class="col-md-12">
        <form action="pro_fisik.php?id_pelamar=<?php echo $id_pelamar; ?>" method="post">
        <table id="example" class="table table-responsive table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Jarak Lari (KM)</th>
                    <th>Jumlah Push Up</th>
                    <th>Jumlah Set Up</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['posisi_pekerjaan']; ?></td>
                    <td><input type="text" name="jarak_lari" style="width: 50px;" value="<?php echo $data['jarak_lari']; ?>"></td>
                    <td><input type="text" name="jumlah_push_up" style="width: 50px;" value="<?php echo $data['jumlah_push_up']; ?>"></td>
                    <td><input type="text" name="jumlah_sit_up" style="width: 50px;" value="<?php echo $data['jumlah_sit_up']; ?>"></td>
                    <td>
                        <input type="radio" name="keterangan" value="lolos tes fisik" <?php if($data['keterangan'] == 'lolos tes fisik') echo 'checked="checked"'; ?>>Lolos Tes Fisik<br>
                        <input type="radio" name="keterangan" value="gagal tes fisik" <?php if($data['keterangan'] == 'gagal tes fisik') echo 'checked="checked"'; ?>>Gagal Tes Fisik<br>
                        <input type="radio" name="keterangan" value="tidak hadir" <?php if($data['keterangan'] == 'tidak hadir') echo 'checked="checked"'; ?>>Tidak Hadir
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="form-group row">
            <div class="col-sm-10 text-right ml-auto" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>              
        </div>
        </form>
    </div>
    
<!-- jquery package -->
    
<script src="../bootstrap4/js/bootstrap.min.js"></script>
    <script src="../bootstrap4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../bootstrap4/js/dataTables.bootstrap4.js"></script>


<!--     <script src="bootstrap4/datatables/jquery.dataTables.min.js"></script>
    <script src="bootstrap4/datatables/jquery-1.12.4.js"></script>
    <script src="bootstrap4/datatables/dataTables.bootstrap4.min.js"></script>
 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            searching: false,   // Nonaktifkan fitur pencarian
            lengthChange: false, // Nonaktifkan dropdown untuk mengatur jumlah entri
            info: false,
            dom: 't' // Hanya menampilkan tabel
        });       
    });
    </script>

  </body>
</html>
