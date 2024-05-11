<!doctype html>
<html lang="en">
  <head>
    <title>Recruitment SiRekTa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body style="background: transparent;margin-top: 20px;">

    <?php
    // Load file koneksi.php
    include "koneksi.php";
    
    // Ambil data id_pelamar yang dikirim oleh index.php melalui URL
    $id_pelamar = $_GET['id_pelamar'];
    
    // Query untuk menampilkan data pelamar berdasarkan ID pelamar yang dikirim
    $query = "SELECT * FROM pelamar WHERE id_pelamar='".$id_pelamar."'";
    $sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    ?>

      <!-- judul -->
   <section class="atas" id="atas">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
          <br>
           <h2 class="text-center">Data Contract</h2>
           <hr>
         </div>
       </div>
     </div>
   </section>
   <!-- akhir judul -->

    <div class="container">
    <form action="e-contract.php" method="post">
            <table>
                <tr>
                    <th>Pernyataan</th>
                    <th>Ya</th>
                    <th>Tidak</th>
                </tr>
                <tr>
                    <td>Karyawan mengetahui tentang bisnis perusahaan</td>
                    <td><input type="radio" name="p1" value="1"></td>
                    <td><input type="radio" name="p1" value="0"></td>
                </tr>
                <tr>
                    <td>Karyawan mampu berpartisipasi dalam memberikan masukan demi perkembangan unit maupun perusahaan</td>
                    <td><input type="radio" name="p2" value="1"></td>
                    <td><input type="radio" name="p2" value="0"></td>
                </tr>
                <tr>
                    <td>Karyawan mampu menyelesaikan masalah dengan baik</td>
                    <td><input type="radio" name="p3" value="1"></td>
                    <td><input type="radio" name="p3" value="0"></td>
                </tr>
                <tr>
                    <td>Karyawan mampu menghadapi perbedaan</td>
                    <td><input type="radio" name="p4" value="1"></td>
                    <td><input type="radio" name="p4" value="0"></td>
                </tr>
                <tr>
                    <td>Karyawan memiliki keinginan untuk mengembangkan diri demi performansi unit/perusahaan</td>
                    <td><input type="radio" name="p5" value="1"></td>
                    <td><input type="radio" name="p5" value="0"></td>
                </tr>
                <tr>
                    <td>Direkomendasikan untuk perpanjangan kontrak</td>
                    <td><input type="radio" name="p5" value="1"></td>
                    <td><input type="radio" name="p5" value="0"></td>
                </tr>
            </table>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"> Masa Kerja</label>
              <div class="col-sm-7 col-sm-offsite-3">
                <input type="text" class="form-control" name="tempat_lhr" placeholder="durasi perpanjangan kontrak">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"> Awal Kontrak</label>
              <div class="col-sm-7 col-sm-offsite-3">
                <input type="date" class="form-control" name="tgl_lhr">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label"> Akhir Kontrak</label>
              <div class="col-sm-7 col-sm-offsite-3">
                <input type="date" class="form-control" name="tgl_lhr">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Alasan</label>
              <div class="col-sm-7 col-sm-offsite-3">
                  <select class="form-control" required="true" name="agama">
                      <option>-- Pilih --</option>
                      <option value="Islam">Mengundurkan Diri</option>
                      <option value="Kristen (Katolik">PHK</option>
                      <option value="Kristen (Protestan)">Kontrak Kerja Selesai </option>
                  </select>
              </div> 
            </div>

            <div class="form-group row">
               <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>              
            </div>
        </form>

  </div>


     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>