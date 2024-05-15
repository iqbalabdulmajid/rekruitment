<?php
session_start();
//cek level user
if(@$_SESSION['admin']){
?>

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
        <h1 align="center">Employee Management</h1>
        <hr>
         <!--tabel-->
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-responsive table-hover" cellspacing="0" width="100%" >
                         <thead>
                             <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>NIK</th>
                                <th>Posisi Pekerjaan</th>
                                <th>Penempatan</th>
                                <th>Nama Lengkap</th>
                                <th>Status Pegawai</th>                              
                                <th>Aksi</th>
                            </tr>
                           </thead>
                        <tbody>
                            
                        <?php
                        include "koneksi.php";

                        $query = "SELECT p.id_pelamar, p.nik, p.posisi_pekerjaan, p.lokasi_seleksi, p.nama, e.status_pegawai
                                    FROM pelamar p
                                    LEFT JOIN econtract e ON p.nik = e.nik WHERE (e.status_pegawai='karyawan tetap' OR e.status_pegawai='karyawan kontrak') ";

                        $sql = mysqli_query($connect, $query);

                        $no = 1;
                        while($data = mysqli_fetch_array($sql)){
                            echo "<tr scope='row'>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$data ['id_pelamar']."</td>";
                            echo "<td>".$data ['nik']."</td>";
                            echo "<td>".$data ['posisi_pekerjaan']."</td>";
                            echo "<td>".$data ['lokasi_seleksi']."</td>";
                            echo "<td>".$data ['nama']."</td>";
                            echo "<td>".$data ['status_pegawai']."</td>";
                            echo "<td>
                                    <a href='lihat_plmr.php?id_pelamar=".$data['id_pelamar']."'>Lihat</a>
                                  </td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
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

    <script> type="text/javascript"
      $(document).ready(function() {
        $('#example').DataTable({
            searching: true // Aktifkan fitur pencarian
        });       
      });
</script>

  </body>
</html>

<?php
}else {
    include "illegal.php";
}
?>



