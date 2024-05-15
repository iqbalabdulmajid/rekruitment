<style>
  .navbar {
  background-color: transparent;
  transition: background-color 0.3s ease-in-out;
  backdrop-filter: blur(5px);
  border-radius: 50px; /* Menambahkan border-radius */
}

.navbar.scrolled {
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 10px; /* Mengubah border-radius saat di-scroll */
}

.navbar-toggler-icon {
  filter: invert(1);
}

.navbar-brand {
  color: white;
}

.navbar-nav .nav-link {
  color: white;
}

.navbar-nav .nav-link:hover {
  color: rgba(255, 255, 255, 0.8);
}
</style>
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-transparent">
  <a class="navbar-brand" href="#"><a href="https://logowik.com/telkom-indonesia-logo-vector-svg-pdf-ai-eps-cdr-free-download-17650.html"><img src="telkom.png" style="max-width: 100px; background-color:transparent;"></a></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../hta.php">Bagaimana Cara Menerapkannya</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../career.php">Karir</a>
      </li>
    </ul>
    <span class="nav-item">
      <a href="logout.php" style="color:black;"> Logout</a>
    </span>
    <span class="nav-item">
     <p><? echo '$id_pelamar' ;?></p>
    </span>
  </div>
</nav>
<script>
  // Tambahkan class 'scrolled' pada navbar saat di-scroll
window.addEventListener('scroll', function() {
  var navbar = document.querySelector('.navbar');
  navbar.classList.toggle('scrolled', window.scrollY > 0);
});
  </script>