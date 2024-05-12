<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
  <a class="navbar-brand" href="#"><a href=""><img src="images/telkomlogo.png" style="max-width: 150px; background-color:transparent;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#karir">Karir</a>
      </li>
    </ul>
    <span class="nav-item">
        <a class="nav-link" style="color:black;" href="login2.php">Masuk</a>
    </span>
  </div>
</nav>

<div class="pembatas" style="margin-bottom: 30px;"></div>

<style>
  .navbar {
    background-color: transparent;
    backdrop-filter: blur(10px);
    transition: background-color 0.3s, backdrop-filter 0.3s;
  }

  .navbar.scrolled {
    background-color: #ffffff;
    backdrop-filter: blur(10px);
  }

  body {
    padding-top: 50px;
  }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
      $('.navbar').addClass('scrolled');
    } else {
      $('.navbar').removeClass('scrolled');
    }
  });
</script>