<?php
error_reporting(0);

session_start();
//cek level user
if(@$_SESSION['pelamar']){
	$id_pelamar = $_GET['id_pelamar'];

	include "koneksi.php";

	if(isset($_POST['submit'])){
		$pilihan = $_POST["pilihan"];
		$id_soal = $_POST["id"];
		$jumlah = $_POST['jumlah'];

		$score = 0;
		$benar = 0;
		$salah = 0;
		$kosong = 0;

		for ($i = 0; $i < $jumlah; $i++){
			//id nomor soal
			$nomor = $id_soal[$i];

			//jika user tidak memilih jawaban
			if (empty($pilihan[$nomor])){
				$kosong++;
			}else{
				//jawaban dari user
				$jawaban = $pilihan[$nomor];

				//cocokan jawaban user dengan jawaban di database
				$query = mysqli_query($connect, "SELECT * FROM tbl_soal WHERE id_soal='$nomor' AND knc_jawaban='$jawaban'");

				$cek = mysqli_num_rows($query);

				if($cek){
					//jika jawaban cocok (benar)
					$benar++;
				}else{
					//jika salah
					$salah++;
				}
			} 
		}

		/*RUMUS
		Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
		hasil= 100 / jumlah soal * jawaban yang benar
		*/
		$result = mysqli_query($connect, "SELECT * FROM tbl_soal WHERE aktif='Y'");
		$jumlah_soal = mysqli_num_rows($result);
		$score = 100 / $jumlah_soal * $benar;
		$hasil = number_format($score, 1);

		$db = mysqli_query($connect, "SELECT * FROM master_pelamar WHERE id_pelamar='$id_pelamar'");
		$data = mysqli_fetch_array($db);

		// Menampilkan hasil ujian
		echo "
			<!doctype html>
			<html lang='en'>
			  <head>
			    <title>Hello, world!</title>
			    <!-- Required meta tags -->
			    <meta charset='utf-8'>
			    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

			    <!-- Bootstrap CSS -->
			    <link rel='stylesheet' href='../bootstrap4/css/bootstrap.min.css'>
			  </head>
			  <body style='background:transparent;'>

			    <div class='container' style='margin-top: 5%;'>
			      <div class='row'>
			        <div class='col-md-6 offset-md-3'>
			                <h1>Hasil Ujian</h1>

			          <form action='' method='POST'>

			            <table border='0'>

			              <tr>
			                <td width='220'>ID Pelamar</td>
			                <td width='10'>:</td>
			                <td>$id_pelamar</td>
			              </tr>

			              <tr height='10'></tr>

			              <tr>
			                <td>Jawaban Benar</td>
			                <td width='10'>:</td>
			                <td>$benar</td>
			              </tr>

			              <tr height='10'></tr>

			              <tr>
			                <td>Jawaban Salah</td>
			                <td width='10'>:</td>
			                <td>$salah</td>
			              </tr>

			              <tr height='10'></tr>

			              <tr>
			                <td>Jawaban Kosong</td>
			                <td width='10'>:</td>
			                <td>$kosong</td>
			              </tr>

			              <tr height='10'></tr>

			              <tr>
			                <td>Total Score</td>
			                <td width='10'>:</td>
			                <td>$score</td>
			              </tr>

			              <tr height='10'></tr>

			              <tr>
			                <td>Status Ujian</td>
			                <td width='10'>:</td>
			                <td>$keterangan</td>
			              </tr>
			            </table><br>

			            <input type='hidden' name='id_pelamar' value='$id_pelamar' readonly>
			            <input type='hidden' name='benar' value='$benar' readonly>
			            <input type='hidden' name='salah' value='$salah' readonly>
			            <input type='hidden' name='kosong' value='$kosong' readonly>
			            <input type='hidden' name='score' value='$score' readonly>
			            <input type='hidden' name='keterangan' value='$keterangan' readonly>

						<button type='submit' name='simpan' class='btn btn-primary'>Selesai</button>
			            <a href='ujian.php' class='btn btn-primary'>Kembali</a>

			          </form>
			        </div>
			      </div>
			    </div>

			    <!-- Optional JavaScript -->
			    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
			    <script src='../bootstrap4/js/jquery.min.js'></script>
			    <script src='../bootstrap4/js/popper.min.js'></script>
			    <script src='../bootstrap4/js/bootstrap.min.js'></script>
			  </body>
			</html>
		";

		// Simpan hasil ujian ke dalam database
		mysqli_query($connect, "INSERT INTO tbl_nilai(id_pelamar, jawaban_benar, jawaban_salah, jawaban_kosong, score) VALUES('$id_pelamar', '$benar', '$salah', '$kosong', '$score')");
	}else{
		unset($_POST['submit']);
	}
}else{
	header("location:index.php");
}
?>