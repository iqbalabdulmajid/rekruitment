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
    $query = "SELECT m.keterangan, p.nama, p.posisi_pekerjaan, p.lokasi_seleksi, p.tgl_wwcr
                FROM master_pelamar m
                LEFT JOIN pelamar p ON m.id_pelamar=p.id_pelamar WHERE m.id_pelamar='".$id_pelamar."'";
    $sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    ?>

        <h1 align="center">Data Tes Wawancara</h1>
        <hr>
         <!--tabel-->
            <div class="row">
                <div class="col-md-12">
        <form action="pro_wwcr.php?id_pelamar=<?php echo $id_pelamar; ?>" method="post">
        <table id="example" class="table table-responsive table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Penempatan</th>
                    <th>Jadwal Wawancara</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['posisi_pekerjaan']; ?></td>
                    <td><?= $data['lokasi_seleksi']; ?></td>
                    <td><input type="date" name="tgl_wwcr" style="width: 130px;" value="<?php echo $data['tgl_wwcr']; ?>"></td>
                    <td>
                        <select class="form-control" required="true" name="keterangan" style="padding: 0px 10px">
                            <option value="<?php echo $data['keterangan']; ?>" selected ><?php echo $data['keterangan']; ?></option>
                            <option value="Hasil Belum Diinput">Hasil Belum Diinput</option>
                            <option value="Lolos Wawancara">Lolos Wawancara</option>
                            <option value="Tidak Lolos Wawancara">Tidak Lolos Wawancara</option>
                        </select>
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

        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Foto Hasil Tes</label>
            <div class="col-sm-7 col-sm-offsite-3">
                <input type="file" class="form-control" name="wawancara" id="exampleFormControlFile1" style="padding: 0px; width: 300px" value="<?php echo $data['wawancara']; ?>">
                <div class="form-group row">
                    <div class="col-sm-10 text-left" style="margin-top: 10px;">
                        <button type="sumbit" name="btn-upload_foto" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <?php include"up_foto.php"; ?>
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
