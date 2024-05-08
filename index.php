<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recruitment SiRekTa</title>

	<link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap4/css/custom.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body style="background-image: url(bootstrap4/img/bg.png");">


<?php 
	include "navbarb4.php";
 ?>

<div class="container">
<!-- jumbotron -->
<style>
.jumbotron{
  margin: 50px 50px 50px 50px !important;
  box-shadow: 10px 10px 5px #888888;
}

h1{
  font-family: tahoma;
  text-align: center;
}

.img-circle{
  border: 4px solid #2980b9;
  border-radius:100%;
  margin-top: -260px;
}
</style>
<div class="col-xs-12 jumbotron" style="background-color: transparent; backdrop-filter: blur(10px);">
    <h1 style="color:#2980b9">Telkom Indonesia</h1>
   <hr style="width: 5%; border: 1px solid black; margin-bottom:60px;">
   <div class="row">
     <div class="col-md-6 text-center">
         <img src="images/kantor.png" width=100% alt="img1"/>
     </div>
      <div class="col-md-6 text-center">
         <p style="font-size: 19.5px; text-align: justify;">PT Telkom Indonesia (Persero) Tbk (Telkom) adalah perusahaan telekomunikasi milik negara di Indonesia, yang sedang bertransformasi menjadi perusahaan telekomunikasi digital dengan strategi berorientasi pada pelanggan. TelkomGroup mengembangkan lini bisnis baru untuk meningkatkan efisiensi dan pengalaman pelanggan, sejalan dengan perkembangan teknologi dan digitalisasi. <a href="login2.php" target="_blank" class="btn btn-primary btn-block" role="button">Mulai Melamar</a></p>
     </div>
   </div>
</div>
<!-- end of jumbotron -->

<!-- karir -->
<h1 id="karir">Karir</h1>
<hr style="width: 5%; border: 1px solid black; margin-bottom:60px;">
  <?php
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  include"koneksi.php";
  $post = $_GET["post"];
  if (!$post) {
  $ambil_berita = mysqli_query($connect,"SELECT * from lowongan order by id_lowongan desc"); 
  while($hasil = mysqli_fetch_array($ambil_berita)){ 
  ?> 
   <div class="row-fluid"> 
  
     <div class="span8 text-center"> 
       <h2><a href="career.php?post=<?=$hasil['id_lowongan'];?>"><?=$hasil['posisi_pekerjaan'];?></a></h2>
		<h4> <?=$hasil['tgl_mulai'];?> s/d <?=$hasil['tgl_selesai'];?> </h4>
        <br> 
        <p> 
          <a href="login2.php" class="btn magictime openDownLeftReturn btn-primary	">Apply</a>

     <!--      <a href="#" class="btn magictime openDownLeftReturn btn-inverse"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Diposkan pada <?=$hasil['tgl_berita'];?></a>  -->
        </p> 

      </div>   
    </div> 
    <hr style="height: 10px; border: 0; box-shadow: 0 10px 10px -10px #1e88e5 inset;"> 


 <?php 
  }  }

  else
  {

 
  $ambil_berita = mysqli_query($connect, "SELECT * from lowongan where id_lowongan ='$post'"); 
 $hasil = mysqli_fetch_array($ambil_berita); 
 ?> 
  <div class="paragraphs"> 
   <div class="row"> 
    <div class="panel-body">
      <div class="tambahan"> 
          <div class="content-heading">
             <h3 class="text-center" style="color: black; font-weight: bold;"><?=$hasil['posisi_pekerjaan'];?></h3>
             <h6 class="text-center"><?=$hasil['tgl_mulai']; ?> s/d <?=$hasil['tgl_selesai']; ?></h6>
          </div> 
          <hr>
          <p class="text-center"><b><?=$hasil['tgl_mulai'];?> s/d <?=$hasil['tgl_selesai'];?></b></p>
          <p><?=$hasil['deskripsi_pekerjaan'];?></p>
          <br>
          <p><b>Jurusan Akademik : </b><?=$hasil['jurusan_akademik'];?></p>
          <p><b>Lokasi Pekerjaan : </b><?=$hasil['lokasi_pekerjaan'];?></p>
          <p><b>Lokasi Seleksi :</b><?=$hasil['lokasi_seleksi'];?></p>
          <br>

      



          <hr style="height: 10px; border: 0; box-shadow: 0 10px 10px -10px #1e88e5 inset;"> 

        

        <div style="clear: both;"></div>

          

    </div> 
    </div>
   </div> 
  </div> 


    <?php
  $ambil_recent = mysqli_query($connect,"SELECT * from lowongan "); 
 ?> 
  <div class="panel-berita"> 
    
     <div class="panel-heading">Baca Juga</div> 
      <ul type="square"> 
       <?php 
    while($hasil_recent= mysqli_fetch_array($ambil_recent)){ 
       echo "<li><a href='career.php?link=lihatDetailtnt.php&id=$hasil_recent[id_lowongan]'>Lowongan ".$hasil_recent['posisi_pekerjaan']."</a></li>"; 
    } 
    ?> 
      </ul> 
  
  </div>

<?php 
  }
 ?>
<!-- end of karir -->

</div>

<?php 
	include "footerb4.php";
 ?>


	<script src="bootstrap4/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>